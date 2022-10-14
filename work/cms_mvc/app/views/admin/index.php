<div class="content-wrapper">
    <div class="container-fluid">
        
    <div class="row">
       
        
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
                            
           <div class="mr-5"><?php echo $data['posts_count'] ?> Posts!</div>

            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo ASSET_ROOT;?>/admin/viewPosts">
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
                              
                <div class="mr-5"><?php echo $data['comments_count']; ?> Comments!</div>
              
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo ASSET_ROOT;?>/admin/viewAllComments">
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

                <div class="mr-5"><?php echo $data['users_count']; ?> Users!</div>
                
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo ASSET_ROOT;?>/admin/users">
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

                <div class="mr-5"><?php echo $data['categories_count']; ?> Categories!</div>
                       
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo ASSET_ROOT;?>/admin/categories">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      
        <?php
        
        //  $post_draft_count = $data['post_draft_count'];
        
        //  $post_published_count = $data['post_published_count'];
        
        //  $unapproved_comment_count = $data['unapproved_comment_count'];
        
        //  $subscriber_count = $data['subscriber_count'];
       
        ?>
        
      <div class="row">
         <div class="col-sm-12">
            <script type="text/javascript">
              // google.charts.load('current', {'packages':['bar']});
              // google.charts.setOnLoadCallback(drawChart);

              // function drawChart() {
              //   var data = google.visualization.arrayToDataTable([
              //     ['Date', 'Count'],
              //       <?php 
              //       $element_text = ['All Posts', 'Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
              //       $element_count = [$post_count, $post_published_count, $post_draft_count, $comment_count, $unapproved_comment_count, $user_count, $subscriber_count, $category_count];
                    
              //       for($i = 0; $i < 8; $i++){
                        
              //           echo "['{$element_text[$i]}'" . "," . " {$element_count[$i]}],";
                          
              //       }
              //       ?>
              //   ]);

              //   var options = {
              //     chart: {
              //       title: '',
              //       subtitle: '',
              //     }
              //   };

              //   var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

              //   chart.draw(data, google.charts.Bar.convertOptions(options));
              // }
            </script> 
            
          <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
        </div>
    </div>
</div>
