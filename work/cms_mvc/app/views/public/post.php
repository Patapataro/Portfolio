<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8 order-md-first">
        <?php
    
if(!$posts == []):
    foreach($posts as $data):

        $post_id = $data->post_id;
        $post_title = $data->post_title;
        $post_author = $data->post_author;
        $post_date = $data->post_date;
        $post_image = $data->post_image;
        $post_content = $data->post_content;
        $post_status = $data->post_status;

        ?>

        <h2 class="my-4 card-title">
            <?php echo $post_title;?>
        </h2>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("./app/views/images/$post_image"));?>' alt="Card image cap">
            <div class="card-body">
              <p class="card-text"><?php echo $post_content;?></p>
            </div>
            <div class="card-footer text-muted">
              <?php echo $post_date;?> by
              <a href="<?php echo ASSET_ROOT;?>/home/authorPosts/<?php echo str_replace(" ", "_", $post_author);?>"><?php echo $post_author;?></a>
            </div>
          </div>
        <hr>

 <?php
        endforeach;
?>

<!-- Comments Form -->
              <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                  <form action="" method="post" role="form">

                      <!-- Made for user auto fill -->
                      <!-- <?php 
                    // $_SESSION['username'] = $db_username;
                    // $_SESSION['firstname'] = $db_user_firstname;
                    // $_SESSION['lastname'] = $db_user_lastname;
                    // $_SESSION['user_role'] = $db_user_role;
                    // $_SESSION['user_id'] = $db_user_id;
                    // $class = null;
                    // $author
                    // if(isset($_SESSION['user_role'])){
                    //     $username = $_SESSION['username']
                    // }?> -->

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input class="form-control" type="text" name="comment_author" requred>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="comment_email" required> 
                    </div>

                    <div class="form-group">
                      <label for="comment">Your Comment</label>
                      <textarea class="form-control" name="comment_content" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
    <hr>
<!-- Single Comment -->
    <?php 
if(isset($comments)):
    foreach($comments as $comment):
        $comment_author = $comment->comment_author;
        $comment_date = $comment->comment_date;
        $comment_content = $comment->comment_content
    
    ?>
      <div class="media mb-4">

      <!-- for futer user images -->
        <!-- <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt=""> -->
        <div class="media-body">
          <h5 class="mt-0"><?php echo $comment_author; ?>
           <small><?php echo $comment_date; ?></small></h5>
            <?php echo $comment_content; ?>
        </div>
      </div>

 <?php 
        endforeach;
    else:

        echo "<h1 class='text-center'>No Comments Available</h1>";

    endif;
else:

    echo "<h1 class='mt-5 text-center'>No posts available</h1>";

endif;      
    ?>

</div>
