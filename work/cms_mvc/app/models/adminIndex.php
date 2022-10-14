<?php
class adminIndex extends Model
{
    
//    public function checkStatus($table,$column,$status) {
   
//    $query = "SELECT * FROM ? WHERE ? = ?";
   
//    $escaped = [$table, $column, $status];
//    $result = $this->prepare($query, $escaped);

//    //print_r($result['boolan']);


//    if($result['boolan'])
//    {
//        $count =  count($result['stmt']->fetchAll(PDO::FETCH_OBJ));
//        return $count;
//    }
   
//}
    
    public function tableCount($table, $sql = '')
    {
        $countSql = 'SELECT * FROM ' . $table . $sql;
        $countquery = $this->db->query($countSql);
        
        if($countquery)
        {
            $count = count($countquery->fetchAll(PDO::FETCH_OBJ));
            return $count;
        }
        
    }
    
    public function allPosts()
    {
        $allPostsStmt = 'SELECT * FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY posts.post_id DESC ';
        $postsQuery = $this->db->query($allPostsStmt);
        return $postsQuery->fetchAll(PDO::FETCH_OBJ);
        
    }
    
    
    public function getPost($postId)
    {
        $postSql = "SELECT * FROM posts WHERE post_id = ?";
        
        $postPreped = $this->prepare($postSql, [$postId]);
        
        if($postPreped['boolean'])
        {
            return $postPreped['stmt']->fetch(PDO::FETCH_OBJ);
        }
        
    }

    
    public function deletePost($post_id)
    {
        $deletePostSql = "DELETE FROM posts WHERE post_id = ?";
        $deleteCommentsSql = "DELETE FROM comments WHERE comment_post_id = ?";
        
        $deletePostPreped = $this->prepare($deletePostSql, [$post_id]);
        $deleteCommentsPreped = $this->prepare($deleteCommentsSql, [$post_id]);
        
        if(!$deletePostPreped['boolean'] | !$deleteCommentsPreped['boolean'])
        {
            echo 'failed to delete post';
        }
        
    }
    
    public function postStatus($post_id, $post_status)
    {
        $postStatusSql = "UPDATE posts SET post_status = ? WHERE post_id = ?";
        
        $postStatusPreped = $this->prepare($postStatusSql, [$post_status, $post_id]);
    }
    
    public function createPost($data = [])
    {
        $createSql = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        
        $createPreped = $this->prepare($createSql, $data);
                
        if($createPreped['boolean'])
        {
            $newPost_id = $this->db->lastInsertId();
            return ['boolean' => $createPreped['boolean'], 'post_id' => $newPost_id];
        }
        
    }
    
    public function clonePost($post_id)
    {
        $post = $this->getPost($post_id);
        
        $post_id = $post->post_id; 
        $post_author = $post->post_author; 
        $post_user = $post->post_user; 
        $post_title = $post->post_title; 
        $post_category = $post->post_category_id; 
        $post_status = $post->post_status; 
        $post_image = $post->post_image; 
        $post_tags = $post->post_tags; 
        $post_comment = $post->post_comment_count;
        $post_date = $post->post_date; 
        $post_views_count = $post->post_views_count; 
        $category_id = $post->post_category_id; 
        $post_content = $post->post_content;
        
        $this->createPost([$category_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags, $post_status]);
    }
    
    public function editPost($the_p_id)
    {
        
        $post_author = $_POST['author'];
        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

        $post_content = $_POST['post_content'];
        $post_tags = $_POST['post_tags'];
        $post_date = date('y-m-d');
        $post_view_count = $_POST['post_view_count'];

        // keeps image if one isn't selected
        if(empty($post_image)) {
            $selectImageSql = "SELECT * FROM posts WHERE post_id = ?";
            $selectImagePreped = $this->prepare($selectImageSql, [$the_p_id]);

            $select_image = $selectImagePreped['stmt']->fetch(PDO::FETCH_OBJ);

            $post_image = $select_image->post_image;

        }
        
        $escape = [$post_title, $post_category_id, $post_author, $post_status, $post_tags, $post_content, $post_image, $the_p_id];

        $query = "UPDATE posts SET ";
        
        if(isset($_POST['viewCount'])) {
            $post_view_count = 0;
            $query .= "post_views_count = ?, ";
            array_unshift($escape, $post_view_count);
        }
        
        $query .= "post_title = ?, ";
        $query .= "post_category_id = ?, ";
        $query .= "post_date = now(), ";
        $query .= "post_author = ?, ";
        $query .= "post_status = ?, ";
        $query .= "post_tags = ?, ";
        $query .= "post_content = ?, ";
        $query .= "post_image = ?";

        $query .= " WHERE post_id = ?";

        $queryPreped = $this->prepare($query, $escape);

       if($queryPreped['boolean']){

            $target_dir = ".." . DOCUMENT_ROOT . "/app/views/images/";
            $target_file = $target_dir . basename($post_image);
            move_uploaded_file($post_image_temp, $target_file);

            return $queryPreped['boolean'];
       }

    }
    
    public function addCategory($catName) 
    {
        $addCatSql = "INSERT INTO categories(cat_title) VALUE(?)";
        $addCatPreped = $this->prepare($addCatSql, [$catName]);
    }
    
    public function deleteCategory($the_cat_id)
    {
        $deleteCatSql = "DELETE FROM categories WHERE cat_id = ?";
        $deleteCatPreped = $this->prepare($deleteCatSql, [$the_cat_id]);
        var_dump($deleteCatPreped['boolean']);
        
    }
    
    public function getCat($cat_id)
    {
        $categorSql = "SELECT * FROM categories WHERE cat_id = ?";
        
        $categoryPreped = $this->prepare($categorSql, [$cat_id]);
        
        if($categoryPreped['boolean'])
        {
            return $categoryPreped['stmt']->fetch(PDO::FETCH_OBJ);
        }
    }
    
    public function updateCat($cat_title, $cat_id)
    {
        $catUpdateSql = "UPDATE categories SET cat_title = ? WHERE cat_id = ?";
        
        $result = $this->prepare($catUpdateSql, [$cat_title, $cat_id]);
    }
    
    public function commentStatus($post_id, $post_status)
    {
        $statusSql = "UPDATE comments SET comment_status = ? WHERE comment_id = ? ";
        
        $result = $this->prepare($statusSql, [$post_status, $post_id]);
        
    }
    
    public function deleteComment($comment_id)
    {
        $deleteCommentSql = "Delete FROM comments WHERE comment_id = ?";
        
        $this->prepare($deleteCommentSql, [$comment_id]);

    }
    
    public function userAdmin($user_id)
    {
        $userAdminSql = "UPDATE users SET user_role = 'admin' WHERE user_id = ? ";
        
        $userAdminPreped = $this->prepare($userAdminSql, [$user_id]);
    }
    
    public function userSubscriber($user_id)
    {
        $userSubscriberSql = "UPDATE users SET user_role = 'subscriber' WHERE user_id = ? ";
        
        $userSubscriberPrepare = $this->prepare($userSubscriberSql, [$user_id]);
        
    }
    
    public function deleteUser($user_id)
    {
        $deleteUserSql = "Delete FROM users WHERE user_id = ?";
        
        $this->prepare($deleteUserSql, [$user_id]);
    }
    
    public function getUser($user_id)
    {
        $editUserSql = "SELECT * FROM users WHERE user_id = ?";
        
        $editUserPreped = $this->prepare($editUserSql, [$user_id]);
        
        if($editUserPreped['boolean'])
        {
            return $editUserPreped['stmt']->fetch(PDO::FETCH_OBJ);
        }
    }
    
    public function editUser($user_id)
    {
        

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];


        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "username = '{$username}'";

        if(empty($user_password))
        {
            $message = "Password can't be empty!";
                
        } else if(strlen($user_password) <= 5)
        {

            $message = "Password must be longer than six characters long";

        } else 
        {
            
            $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
            $query .= ", user_password = '{$hashed_password}' ";

            $query .= "WHERE user_id = $user_id";

            $this->prepare($query, [$user_firstname, $user_lastname, $user_role, $user_email, $username, $hashed_password]);

            $message = null;
        }

        return $message;
        
    }
    
    public function addUser()
    {
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];

    //    $post_image = $_FILES['image']['name'];
    //    $post_image_temp = $_FILES['image']['tmp_name'];
    //    
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
    //    $post_date = date('y-m-d');

        $password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));


        $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";

        $query .= "VALUES( ?, ?, ?, ?, ?, ?)";

        
        
        if(empty($user_password))
        {
            $message = "Password can't be empty!";
                
        } else if(strlen($user_password) <= 5)
        {
            $message = "Password must be longer than six characters long";

        } else
        {
            
            $this->prepare($query, [$user_firstname, $user_lastname, $user_role, $username, $user_email, $password]);

            $message = null;
        }
        
       // echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";

    //    if(confirmQuery($creat_user_query) == true){
    //        move_uploaded_file($post_image_temp, "../images/$post_image");
    //    }
        
        return $message;


    }
    
}


?>