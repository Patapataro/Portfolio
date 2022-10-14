    <?php session_start();?>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="./index.php">CMS Front</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           
           <?php 
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection,$query);
              
    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        
        $category_class = '';
        
        $registration_class = '';
        
        $pageName = basename($_SERVER['PHP_SELF']);
        
        $registration = 'registration.php';

        
        if(isset($_GET['cat_id']) && $_GET['cat_id'] == $cat_id){
            
            $category_class = 'active'; 

        } else if ($pageName == $registration) {
            
            $registration_class = 'active';
   
            
        }
        
        echo "<li class='$category_class nav-item'>
              <a class='nav-link' href='category.php?cat_id={$cat_id}'>{$cat_title}</a>
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
            </li>
-->

            
    <?php 

      if(isset($_SESSION['user_role']) == 'admin'){
          if(isset($_GET['p_id'])){
            $p_id = $_GET['p_id'];
            echo "<li class='nav-item'><a class='nav-link' href='admin/posts.php?source=edit_post&p_id=$p_id'>Edit Post</a></li>";
                
          }
          
        echo "<li class='nav-item'>
                <a class='nav-link' href='admin'>Admin</a>
              </li>";
      } else {
            echo "<li class='$registration_class nav-item'>
                    <a class='nav-link' href='register.php'>Register</a>
                  </li>";
      }

      ?>

          </ul>
        </div>
      </div>
    </nav>