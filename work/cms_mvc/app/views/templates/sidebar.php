        <div class="col-md-4 order-first" id="sidebar">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search </h5>
            
            <form action="<?php echo ASSET_ROOT?>/home/search" method="post">
                <div class="card-body">
                  <div class="input-group">

                    <input name="search" type="text" class="form-control" placeholder="Search for...">

                    <span class="input-group-btn">
                      <button class="btn btn-secondary" name="submit" type="submit">Go!</button>

                    </span>
                  </div>
                </div>
            </form><!-- search form. -->
          </div>
          
            <!-- login -->        
           <?php if(!isset($_SESSION['user_role'])): ?>
           
            <div class="card my-4">

            <h5 class="card-header">login</h5>
            
            <form action="<?php echo ASSET_ROOT?>/home/loginUser" method="post">
                <div class="card-body">
                    <div class="form-group">
                      <input name="username" type="text" class="form-control" placeholder="Enter Username">

                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        <span class="input-group-btn">
                          <button class="btn btn-primary" name="login" type="submit">Submit</button>

                        </span>
                    </div>
                </div>
            </form>
            
        </div>

           <?php endif;?>
          
          <!-- Categories Widget -->
          <div class="card my-4" id="card_categories">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
             <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <ul class="list-unstyled mb-0">

                   <?php 
    foreach($categories as $cat) {
        $cat_title = $cat->cat_title;
        $cat_id = $cat->cat_id;

           echo "<li>
               <a href='" . ASSET_ROOT . "/home/category/{$cat_id}'>{$cat_title}</a>
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