  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">CMS Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePost" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-arrows-v"></i>
            <span class="nav-link-text">Posts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsePost">
            <li>
              <a href="posts.php">View All Posts</a>
            </li>
            <li>
              <a href="posts.php?source=add_post">Add Posts</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="categories.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Categories</span>
          </a>
        </li>
        <li class="nav-item" data-placement="right" title="Example Pages">
          <a class="nav-link" href="comments.php">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Comments</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="users.php">View All Users</a>
            </li>
            <li>
              <a href="users.php?source=add_user">Add User</a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="profile.php">
            <i class="fa fa-fw fa-user-circle"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>
        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       

        <!-- <li class="nav-item">
            <a class="nav-link" href="">Users Online: <?php //echo users_online();?></a>
        </li> -->

        
        <!-- <li class="nav-item">
            <a class="nav-link" href="">Users Online: <span class="usersonline"></span></a>
        </li>  -->
       
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
          <i class="fa fa-fw fas fa-home"></i>Home Site</a>
        </li>

        
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
           
<!--
            <a class="dropdown-item " data-toggle="modal" data-target="#exampleModal" href="#">
            <i class="fa fa-fw fa-cog"></i>Settings
            </a>
-->
            <a class="dropdown-item " href="profile.php">
            <i class="fa fa-fw fa-cog"></i>Settings
            </a>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../includes/logout.php">
             <i class="fa fa-fw fa-sign-out"></i>Logout
            </a>
          </div>
        </li>
        
        
      </ul>
    </div>
  </nav>