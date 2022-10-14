<?php 

class Home extends Controller
{
  public function index()
  {
    $blogIndex = $this->model('Index');

 	$data = $blogIndex->getBlogs();

    $this->view('public/index', $data);
  }

  public function category($cat_id = null)
  {
  	$categoryModel = $this->model('Index');
    if(isset($cat_id)) {
        $data = $categoryModel->getBlogs(" WHERE post_category_id = ?", [$cat_id]);

        $this->view('public/index', $data);
        
    } else{
        $this->index();
    }
  }
    
  public function search()
  {
    $searchModel = $this->model('Index');
    if(isset($_POST['submit'])) {
        $search = $_POST['search'];
      
        $data = $searchModel->getBlogs(" WHERE post_tags LIKE ?", ['%' . $search . '%']);

        $this->view('public/index', $data); 
        
    } else{
        $this->index();
    }
  }
    
    public function authorPosts($post_author)
    {
        $authorModel = $this->model('Index');
        if(isset($post_author)) {
            $post_author = str_replace("_", " ", $post_author);
            $data = $authorModel->getBlogs(" WHERE post_author = ?", [$post_author]);

            $this->view('public/index', $data);

        } else{
            $this->index();
        }
    }
    
    public function post($post_id)
    {
        $authorModel = $this->model('Index');
        if(isset($post_id)) {
            
            // ADDS ONE TO VIEW COUNT 
            $authorModel->viewCount($post_id);
            
            $posts = $authorModel->getBlogs(" WHERE post_id = ?", [$post_id]);

            $comments = $authorModel->comments($post_id);
            
            $posts['comments'] = $comments;
            $posts['post_id'] = $post_id;
            $posts['count'] = null;
            
            $this->view('public/post', $posts);

        } else{
            $this->index();
        }   
    }
    
    public function register()
    {
        $register = $this->model('Index');
        
        $result = false;

        
        if(isset($_POST['registerUser'])){
    
            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Checks for the quality of username, email, and password.
            $error = [
                'username'=> '', 
                'email'=>'',
                'password'=>''
            ];

            if(strlen($username) < 4){

                $error['username'] = 'Username is too short!';

            }    

            if(strlen($username) == ''){

                $error['username'] = "Username can't be empty!";

            }    

            if($register->exists('username', $username)){

                $error['username'] = "Username is taken, try another.";

            }

            if(strlen($email) == ''){

                $error['email'] = "Email can't be empty!";

            }    

            if($register->exists('user_email', $email)){

                $error['email'] = "Email is taken,<a href='index.php'> Please login</a>";

            }

            if($password == ""){

               $error['password'] = "Password can't be empty";

            }
            
            if(strlen($password) <= 5){

               $error['password'] = "Password must be six characters or longer";

            }

        //  registers and logs users in
            foreach ($error as $key => $value) {

                if(empty($value)) {

                    unset($error[$key]);

                }

            }
            
                    
        if(empty($error)) {
            $passwordHash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12) );

            $result = $register->registerUser([$username, $passwordHash, $firstname, $lastname, $email]);
            if($result){
                $message = null;
                $this->loginUser($username, $password);
            } else{
                $message = 'Failed to register user!';
            }

        }

        } 
                
        if(!$result)
        {
            //Gets categories for the nav
            $categories = $register->getAll('categories');
            $data['categories'] = $categories;

            require_once './app/views/templates/header.php';
            require_once './app/views/templates/navigation.php';
            require_once './app/views/public/register.php';
            require_once './app/views/templates/footer.php';
        }
        
    }
    
    public function loginUser($username = null, $password = null)
    {   
        if (isset($_POST['password']) && isset($_POST['username'])){
            $password = $_POST['password'];
            $username = $_POST['username'];
        }
        
        if (isset($password) && isset($username)){
            $userLogin = $this->model('Index');
            $userLogin->login($username, $password);
            $this->index();
        } else {
            $this->index();
        }
        
    }
    
    public function logout()
    {
        $logoutModel = $this->model('Index');
        $logoutModel->logout();
        $this->index();
    }
    
    
}