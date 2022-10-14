        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            
            <form action="search.php" method="post">
            <div class="card-body">
              <div class="input-group">
               
                <input name="search" type="text" class="form-control" placeholder="Search for...">
                
                <span class="input-group-btn">
                  <button class="btn btn-secondary" name="submit" type="submit">Go!</button>
                  
                </span>
              </div>
            </div>
            </form><!-- search form --> 
          </div>
          
            <!-- login -->
            
          <div class="card my-4">
           
           <?php if(isset($_SESSION['user_role'])): ?>
           
              <h4 class="text-center">Logged in as <?php echo $_SESSION['username'] ?></h4>
              
              <a href="includes/logout.php  " class="btn  btn-primary">Logout</a>
           
           <?php else: ?>
           
            <h5 class="card-header">login to see the back end.</h5>
            
            <form action="includes/login.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Username: Pat">

                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Password: 123">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Submit</button>

                        </span>
                    </div>
                </div>
            </form><!-- search form -->
           
           <?php endif;?>

          </div>
          
          

          <!-- Categories Widget -->
          <div class="card my-4">
        <?php 
        $query = "SELECT * FROM categories";
        $select_all_categories_sidebar = mysqli_query($connection,$query);
        confirmQuery($select_all_categories_sidebar);
              

        ?>
           
           
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
             <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">
                   <?php 
            while($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
            $cat_id = $row['cat_id']; 
            $cat_title = $row['cat_title']; 

            echo "<li>
                <a href='category.php?cat_id={$cat_id}'>{$cat_title}</a>
            </li>";

            }
                      ?>
                  </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

        </div>