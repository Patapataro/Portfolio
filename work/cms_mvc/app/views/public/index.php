<!-- Page Content -->
<div class="container">

  <div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8 order-md-first">
    <?php
    
if(isset($posts)):
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
            <a href="<?php echo ASSET_ROOT;?>/home/post/<?php echo $post_id?>"><img class="card-img-top" src='data:image/png;base64,<?php echo base64_encode(file_get_contents("./app/views/images/$post_image"));?>' alt="Card image cap"></a>
            <div class="card-body">
              <p class="card-text"><?php echo substr($post_content, 0, 100);?></p>
              <a href="<?php echo ASSET_ROOT . "/home/post/"  . $post_id; ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <?php echo $post_date;?> by
              <a href="<?php echo ASSET_ROOT;?>/home/authorPosts/<?php echo str_replace(" ", "_", $post_author);?>"><?php echo $post_author;?></a>
            </div>
          </div>
        <hr>

 <?php
        endforeach;
    else:
        
        echo "<h1 class='mt-5 text-center'>No posts available</h1>";
        
    endif;      
?>

</div>