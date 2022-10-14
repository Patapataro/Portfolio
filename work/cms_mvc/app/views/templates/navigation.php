     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo ASSET_ROOT?>/home/index.php">CMS Front</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

           <?php

foreach($data['categories'] as $cat) {
    $cat_title = $cat->cat_title;
    $cat_id = $cat->cat_id;

    $category_class = '';

    $registration_class = '';

    $pageName = basename($_SERVER['PHP_SELF']);

    $registration = 'registration.php';


    if(isset($_GET['cat_id']) && $_GET['cat_id'] == $cat_id){
        
        $category_class = 'active'; 

    } else if ($pageName == $registration) {
        
        $registration_class = 'active';

        
    }
    
    echo "<li class='$category_class nav-item nav-cat'>
          <a class='nav-link' href='" . ASSET_ROOT . "/home/category/{$cat_id}'>{$cat_title}</a>
        </li>";
}
          
          ?>
<!--        
        <li class="nav-item active">
          <a class="nav-link" href="#">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li> -->

        
<?php 

  if(isset($_SESSION['user_role']) == 'admin'){
      if(isset($post_id)){
        echo "<li class='nav-item'><a class='nav-link' href='" . ASSET_ROOT . "/admin/editPost/$post_id'>Edit Post</a></li>";
            
      }
      
    echo "<li class='nav-item'>
            <a class='nav-link' href='" . ASSET_ROOT . "/admin/index'>Admin</a>
          </li>";
?>
        
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">
            <?php 
            if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                
                echo $firstname . " " . $lastname;
            }
                ?>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown" style="right:0; left:-10em;">

            <a class="dropdown-item " href="<?php echo ASSET_ROOT . '/admin/profile/' . $_SESSION['user_id'];?>">
            <i class="fa fa-fw fa-cog"></i>Settings
            </a>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo ASSET_ROOT;?>/home/logout">
             <i class="fa fa-fw fa-sign-out"></i>Logout
            </a>
          </div>
        </li>
        
<?php
  } else {
    echo "<li class='$registration_class nav-item'>
            <a class='nav-link' href='" . ASSET_ROOT . "/home/register'>Register</a>
          </li>";
  }

  ?>
  </ul>
</div>
</div>
</nav>