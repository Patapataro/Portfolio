<?php include "includes/admin_header.php";?>

  <!-- Navigation-->
<?php include "includes/admin_navigation.php"?>
  
  <div class="content-wrapper">
    <div class="container-fluid">
            
         <small><?php echo "<h1 class='page-header'>Welcome  ".$_SESSION['firstname']."</h1>"; ?></small>
            
        <hr>
        
    <div class="row">
       
        
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
                            
           <div class="mr-5"><?php echo $post_count = recordCount("posts"); ?> Posts!</div>

            </div>
            <a class="card-footer text-white clearfix small z-1" href="posts.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
        
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
                              
                <div class="mr-5"><?php echo $comment_count = recordCount("comments"); ?> Comments!</div>
              
            </div>
            <a class="card-footer text-white clearfix small z-1" href="comments.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>

                <div class="mr-5"><?php echo $user_count = recordCount("users"); ?> Users!</div>
                
            </div>
            <a class="card-footer text-white clearfix small z-1" href="users.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-clipboard"></i>
              </div>

                <div class="mr-5"><?php echo $category_count = recordCount("categories"); ?> Categories!</div>
                       
            </div>
            <a class="card-footer text-white clearfix small z-1" href="categories.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      
        <?php
        
        $post_draft_count = checkStatus('posts','post_status','draft');
        
        $post_published_count = checkStatus('posts','post_status','published');
        
        $unapproved_comment_count = checkStatus('comments','comment_status','unapproved');
        
        $subscriber_count = checkStatus('users','user_role','subscriber');
        
        ?>
      
      <div class="row">
         <div class="col-sm-12">
          
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Count'],
            
            <?php 
            
            $element_text = ['All Posts', 'Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
            $element_count = [$post_count, $post_published_count, $post_draft_count, $comment_count, $unapproved_comment_count, $user_count, $subscriber_count, $category_count];
            
            for($i =0; $i < 8; $i++){
                
                echo "['{$element_text[$i]}'" . "," . " {$element_count[$i]}],";
                 
            }
             
            ?>
            
         // ['Posts', 1000],

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
         
<div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
          
          </div>
      </div>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php include "includes/admin_footer.php";?>