<?php

class Index extends Model
{ 

    public function getBlogs($queryAppend = '', $escape = [])
    {
    	if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ){
    		$admin = '';
    	} else {
    		$admin = " post_status = 'published'";
            if(!$queryAppend == ''){
                $admin = ' AND' . $admin;
            } else {
                $admin = ' WHERE' . $admin;
            }
    	}

        $blogSQL = "SELECT post_id, post_title, post_author, post_user, post_date, post_image, post_content, post_status FROM posts" . $queryAppend . $admin;
        
        $preped = $this->prepare($blogSQL, $escape);
    
        if($preped['boolean']){
        	$per_page = 10;

           	if(isset($_GET['page'])){
        
        		$page = $_GET['page'];
        
		    }else{

		        $page = 1;

		    }
		            
		    if($page == "" || $page == 1){
		        
		        $page_1 = 0;

		    } else {

		        $page_1 = ($page * $per_page) - $per_page;  

		    }

		    $count = $preped['stmt']->fetchAll(PDO::FETCH_OBJ);
		    $count =  count($count);

		    $count = ceil($count / $per_page);

		    $blogSQL = $blogSQL . " ORDER BY post_id DESC LIMIT $page_1, $per_page";
            
            $preped = $this->prepare($blogSQL, $escape);

		   	if($preped['boolean']){
		   		return ['posts' => $preped['stmt']->fetchAll(PDO::FETCH_OBJ), 'count' => $count];
		   	}else{
                echo 'failed prepare';
            }

		}
    }
    
    public function getAll($table)
    {
        $tableSql = "SELECT * FROM " . $table;
        $tableQuery = $this->db->query($tableSql);

        return $tableQuery->fetchAll(PDO::FETCH_OBJ);
        
    }
            
    public function getComments($post_id = null)
    {
        $commentsSql = 'SELECT * FROM comments LEFT JOIN posts ON comments.comment_post_id = posts.post_id';

        if(isset($post_id))
        {
            $commentsSql .= " WHERE comment_post_id = ?";
        
            $tableQuery = $this->prepare($commentsSql, [$post_id]);
            
        } else {
            
            $commentsSql .= " ORDER BY posts.post_id DESC";
            $tableQuery = $this->prepare($commentsSql);
        }
        
        return $tableQuery['stmt']->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function viewCount($post_id)
    {
        $countStmt = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = ?";
        
        $preped = $this->prepare($countStmt, [$post_id]);
        
        if($preped['boolean'])
        {
            $preped['stmt']->execute();
        }
        
    }
    
    public function comments($the_post_id)
    {
        if(isset($_POST['create_comment']))
        {
            $this->createComments($the_post_id);
        }
        
        $commentStmt = "SELECT * FROM comments WHERE comment_post_id = ? AND comment_status = 'approved' ORDER BY comment_id DESC";
        
        $commentsPreped = $this->prepare($commentStmt, [$the_post_id]);
        
        if($commentsPreped['boolean'])
        {
            return $commentsPreped['stmt']->fetchAll(PDO::FETCH_OBJ);
        }
    }
    
    private function createComments($the_post_id)
    {

        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ) {

            $commentSql = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES (?, ?, ?, ?, 'approved', now())";
            
            $prepedComment = $this->prepare($commentSql, [$the_post_id, $comment_author, $comment_email, $comment_content]);

        } else {
            
            echo "<script> alert('Feilds cannot be empty!'); </script>";

        }
    }
    
    public function registerUser($data = [])
    {
        $registerSql = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES(?, ?, ?, ?, ?, 'subscriber')";
        
        $registerPreped = $this->prepare($registerSql, $data);
        return $registerPreped['boolean'];
    }
    
    public function exists($file, $data)
    {
        $existsSql = "SELECT " . $file . " FROM users WHERE " . $file . " = ?";
        
        $existsPreped = $this->prepare($existsSql, [$data]);
        
        if($existsPreped['boolean'])
        {
            $count = $existsPreped['stmt']->fetchAll(PDO::FETCH_OBJ);

            if(count($count) > 0) {
        
                return true;

            } else {

                return false;

            }
            
        }
        
    }
    
    public function login($username, $password){
        $loginSql = "SELECT * FROM users WHERE username = ? ";
        $loginPreped = $this->prepare($loginSql, [$username]);
        
        if($loginPreped['boolean'])
        {
            $user = $loginPreped['stmt']->fetch(PDO::FETCH_OBJ);

            $db_user_id = $user->user_id;
            $db_username = $user->username;
            $db_user_password = $user->user_password;
            $db_user_firstname = $user->user_firstname;
            $db_user_lastname = $user->user_lastname;
            $db_user_role = $user->user_role;

            if(password_verify($password, $db_user_password)){
                $_SESSION['username'] = $db_username;
                $_SESSION['firstname'] = $db_user_firstname;
                $_SESSION['lastname'] = $db_user_lastname;
                $_SESSION['user_role'] = $db_user_role;
                $_SESSION['user_id'] = $db_user_id;
            }
        }
    }
    
    public function logout()
    {
        $_SESSION['username'] = null;
        $_SESSION['firstname'] = null;
        $_SESSION['lastname'] = null;
        $_SESSION['user_role'] = null;
        $_SESSION['user_id'] = null;

        
    }
    

}
