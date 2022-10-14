<?php
class Controller
{
    protected $db;

    protected function getDb()
    {
        //return new PDO('mysql:host=savvyschemecom.ipagemysql.com ;dbname=cms', 'savvy', '591548');
        
        $username = 'savvyscheme';
        $password = '$kittles2424';
        
        try {
            $dbh = new PDO('mysql:host=mysql.savvyscheme.tech;dbname=savvy_mysql', $username, $password);

            return $dbh;
            
        } catch (PDOException $e) {
            print "Error!: Failed to Connect to database, " . $e->getMessage() . "<br/>";
            die();
        }
    }

    protected function model($model)
    {
        require_once './app/models/' . $model . '.php';

        return new $model($this->getDb());
    }

    //loads public Template
    protected function view($view, $data = [])
    {
        //Gets categories for the nav
        $cat_model = $this->model('Index');
        $categories = $cat_model->getAll('categories');
        $data['categories'] = $categories;
        
        require_once './app/views/templates/header.php';
        require_once './app/views/templates/navigation.php';
        require_once './app/views/' . $view . '.php';
        require_once './app/views/templates/sidebar.php';
        require_once './app/views/templates/footer.php';

    }
    
    // Loads admin templates
    protected function viewAdmin($view, $data = [])
    {
        require_once './app/views/admin/templates/admin_header.php';
        require_once './app/views/admin/templates/admin_navigation.php';
        require_once './app/views/admin/' . $view . '.php';
        require_once './app/views/admin/templates/admin_footer.php';
        
    }
  
}