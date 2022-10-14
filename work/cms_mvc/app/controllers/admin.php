<?php
class Admin extends Controller
{
    public function index()
    {
        $modelAdmin = $this->model('adminIndex');

         //print_r( $modelAdmin->checkStatus('posts','post_status','draft'));
        
        //  $post_published_count = $modelAdmin->checkStatus('posts','post_status','published');
        
        //  $unapproved_comment_count = $modelAdmin->checkStatus('comments','comment_status','unapproved');
        
        //  $subscriber_count = $modelAdmin->checkStatus('users','user_role','subscriber');
        
        $postCount = $modelAdmin->tableCount('posts');
        $commentsCount = $modelAdmin->tableCount('comments');
        $usersCount = $modelAdmin->tableCount('users');
        $categoriesCount = $modelAdmin->tableCount('categories');
        
        $this->viewAdmin('index', ['posts_count' => $postCount, 'comments_count' => $commentsCount, 'users_count' => $usersCount, 'categories_count' => $categoriesCount]);//, 'post_draft_count' => $post_draft_count, 'post_published_count' => $post_published_count, 'unapproved_comment_count' => $unapproved_comment_count, 'subscriber_count' => $subscriber_count ]);
    }
    
    public function viewPosts()
    {
        $modelAdmin = $this->model('adminIndex');
        $posts = $modelAdmin->allPosts();
        
        foreach($posts as $post)
        {
            $post_id = $post->post_id;
            $count = $modelAdmin->tableCount('comments', ' WHERE comment_post_id = ' . $post_id);
            $post->comment_count = $count;
        }
    
        $this->viewAdmin('posts/view_all_posts', ['posts' => $posts]);
        
    }
    
    public function deletePost()
    {
        if(isset($_POST['post_id']))
        {
            $post_id = $_POST['post_id'];
         
            $modelAdmin = $this->model('adminIndex');
            $modelAdmin->deletePost($post_id);
        }

        $this->viewPosts();
    }
    
    
    public function addPost()
    {
        $modelAdmin = $this->model('adminIndex');
        $modelIndex = $this->model('Index');
        
        $categories = $modelIndex->getAll('categories');
        $users = $modelIndex->getAll('users');

        if(isset($_POST['creat_post'])){
            $post_title = $_POST['title'];
            $post_user = $_POST['author_user'];
            $post_category_id = $_POST['post_category_id'];
            $post_status = $_POST['post_status'];

            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_date = date('y-m-d');
            $post_comment_count = 4;

            $result = $modelAdmin->createPost([$post_category_id, $post_title, $post_user, $post_date, $post_image, $post_content, $post_tags, $post_status]);

            $boolean = $result['boolean'];

            if($boolean)
            {                        
                $target_dir = DOCUMENT_ROOT . "/app/views/images/";
                $target_file = $target_dir . basename($post_image);
                move_uploaded_file($post_image_temp, $target_file);

            }
            
        } else{
            
            $boolean = null; 
            $post_image = null;
            $post_image_temp = null;
            $result['post_id'] = null;
        }
        
        $this->viewAdmin('posts/add_post', ['users' => $users, 'categories' => $categories, 'boolean' => $boolean, 'post_image' => $post_image, 'post_image_temp' => $post_image_temp, 'post_id' => $result['post_id']]);
        
    }
    
        public function editPost($post_id)
    {
        $modelAdmin = $this->model('adminIndex');
        $modelIndex = $this->model('Index');


        $post = $modelAdmin->getPost($post_id);
        $categories = $modelIndex->getAll('categories');
        $users = $modelIndex->getAll('users');
            
            if(isset($_POST['update_post']))
            {
                $boolean  = $modelAdmin->editPost($post_id);
            } else
            {
                $boolean = null; 
            }
            
        $this->viewAdmin('posts/edit_post', ['post' => $post, 'users' => $users, 'categories' => $categories,'boolean' => $boolean]);
    }
    

    public function bulkOptions()
    {
        $modelAdmin = $this->model('adminIndex');
        
        if(isset($_POST['checkBoxArray'])){

            foreach($_POST['checkBoxArray'] as $postValueId){

                $bulk_options = $_POST['bulk_options'];

                if($bulk_options == "delete"){

                        $modelAdmin->deletePost($postValueId);

                } else if($bulk_options == "published" || $bulk_options == "draft"){
                        $modelAdmin->postStatus($postValueId, $bulk_options);

                } else if($bulk_options == 'clone') {
    
                        echo $modelAdmin->clonePost($postValueId);
                }
            }
        }
        $this->viewPosts();
    }
    
    public function categories()
    {
        $modelIndex = $this->model('Index');
        $modelAdmin = $this->model('adminIndex');

        
        //category to be added
        if(isset($_POST['submit']))
        {
            $cat_title = $_POST['cat_title'];
            $modelAdmin->addCategory($cat_title);
        }
        
        //Category to be deleted
        if(isset($_POST['DeleteCategory']))
        {
            $cat_id = $_POST['DeleteCategory'];
            var_dump($cat_id);
            $modelAdmin->deleteCategory($cat_id);
        }
        
        $categories = $modelIndex->getAll('categories');

        $this->viewAdmin('categories/categories', ['categories' => $categories]);
    }
    
    public function catUpdate($cat_id)
    {
        $modelAdmin = $this->model('adminIndex');
        
        if(isset($_POST['update']))
        {
            $cat_title = $_POST['new_cat_title'];

            if($cat_title == "" || empty($cat_title)){
                
                $message =  "Update Cant Be Empty";
                
            } else{
                
                $modelAdmin->updateCat($cat_title, $cat_id);
                $message =  null;
                
            }
            
        } else {
            $message =  null;
        }
        
        $category = $modelAdmin->getCat($cat_id); 
                
        $this->viewAdmin('categories/cat_update', ['category' => $category, 'message' => $message]);

    }
    
    public function viewAllComments($post_id = null)
    {
        $modelAdmin = $this->model('adminIndex');
        $modelIndex = $this->model('Index');
                        
        if(isset($_POST['checkBoxArray'])){

            foreach($_POST['checkBoxArray'] as $commentValueId){

                $bulk_options = $_POST['bulk_options'];

                if($bulk_options == "delete"){
                    
                    $modelAdmin->deleteComment($commentValueId);

                } else if($bulk_options === "approved" || $bulk_options === "unapproved"){
    
                        $modelAdmin->commentStatus($commentValueId, $bulk_options); 

                }
            }
        }
        
        if(isset($_POST['approved']))
        {
            echo "hello";
            $comment_id = $_POST['approved'];
            $modelAdmin->commentStatus($comment_id, 'approved'); 
            
        }
        if(isset($_POST['unapproved']))
        {
            $comment_id = $_POST['unapproved'];
            $modelAdmin->commentStatus($comment_id, 'unapproved'); 
            echo "hello";

        }
        if(isset($_POST['delete']))
        {
            $comment_id = $_POST['delete'];
            $modelAdmin->deleteComment($comment_id);
            echo "hello";
        } 

        $comments = $modelIndex->getComments($post_id);
    
        $this->viewAdmin('comments/view_all_comments', ['comments' => $comments, 'post_id' => $post_id]);
        
    }
    
    public function users()
    {
        $modelAdmin = $this->model('adminIndex');
        $modelIndex = $this->model('Index');
        
            //makes user admin
        if(isset($_POST['admin'])){
            $the_user_id = $_POST['admin'];

            $modelAdmin->userAdmin($the_user_id);
        }

            //Makes user subscriber
        if(isset($_POST['subscriber'])){
            $the_user_id = $_POST['subscriber'];

            $modelAdmin->userSubscriber($the_user_id);
        }

        // deletes user
        if(isset($_POST['delete_user'])) 
        {
            $the_user_id = $_POST['delete_user'];

            $modelAdmin->deleteUser($the_user_id);
        }
        
        if(isset($_POST['edit_user']))
        {
            $the_user_id = $_POST['edit_user'];
            $this->editUser($the_user_id);
        } else 
        {
            $users = $modelIndex->getAll('users');

            $this->viewAdmin('users/view_all_users', ['users' => $users]);  
        }
    }
    
    public function editUser($user_id)
    {
        $modelAdmin = $this->model('adminIndex');
                    
        if(isset($_POST['edituser']))
        {
            $message = $modelAdmin->editUser($user_id);

        }
        
        $user = $modelAdmin->getUser($user_id);
        
        $data  = ['user' => $user];
            
        if(isset($message))
       {
           $data['message'] = $message;
       }

        
        $this->viewAdmin('users/edit_user', $data);
    }
    
    public function addUser()
    {
        $modelAdmin = $this->model('adminIndex');
        
        $message = null;

        if(isset($_POST['creat_user'])) 
        {
            $message = $modelAdmin->addUser();
        }
        //var_dump($message);

        $this->viewAdmin('users/add_user', ['message' => $message]);

    }

    public function profile($user_id)
    {
        $this->editUser($user_id);
    }
}
