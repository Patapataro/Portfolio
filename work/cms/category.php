<?php include "includes/header.php";?>

    <!-- Navigation -->
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php
if(isset($_GET['cat_id'])) {
        $cat_id = $_GET['cat_id'];            

    $per_page = 10;
    if(isset($_GET['page'])){
        
        $page = $_GET['page'];
        
    }else{

        $page = 1;

    }
            
    if($page == "" || $page == 1){
        
        $page_1 = 0;

    } else {

        $page_1 = ($page * $per_page) - $per_page;  

    }
            


    if(is_admin($_SESSION['username'])) { 
        $stmt1 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ? LIMIT $page_1, $per_page");

    } else {
        $stmt2 = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_date, post_image, post_content FROM  posts WHERE post_category_id = ? AND post_status = ? LIMIT $page_1, $per_page");
        
        $published = 'published';
    }
        
    if(isset($stmt1)) {
        
        mysqli_stmt_bind_param($stmt1, "i", $cat_id);
        
        mysqli_stmt_execute($stmt1);
        
        mysqli_stmt_bind_result($stmt1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
        
        $stmt = $stmt1;
        
    } else {
        
        mysqli_stmt_bind_param($stmt2, "is", $cat_id, $published);
        
        mysqli_stmt_execute($stmt2);
        
        mysqli_stmt_bind_result($stmt2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
        
        $stmt = $stmt2;
        
    }
    
    $count = 0;
    while(mysqli_stmt_fetch($stmt)) :
        $count = $count + 1;

        ?>

        <h2 class="my-4 card-title">
            <?php echo $post_title;?>
        </h2>

          <!-- Blog Post -->
          <div class="card mb-4">
            <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="card-img-top" src="images/<?php echo $post_image;?>" alt="Card image cap"></a>
            <div class="card-body">
              <p class="card-text"><?php echo $post_content;?></p>
              <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <?php echo $post_date;?> by
              <a href="author_posts.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author;?></a>
            </div>
          </div>
        <hr>


 <?php
   endwhile;
    echo mysqli_stmt_num_rows($stmt);
    if($count === 0){
        
        echo "<h1 class='text-center'>No posts available</h1>";
        
    }
        
    $count = ceil($count / $per_page);
    

} else{
    redirect("index.php");
}  ?>


        </div>
        <!-- Sidebar Widgets Column -->
<?php include "includes/sidebar.php";?>

    
      </div>
    <!-- /.row -->

<ul class="pagination pagination-lg justify-content-center">
<?php

for($i = 1; $i <= $count; $i++){
    
    if($i == $page) {
        
        echo "<li class='page-item' style='background: black;'><a class='active_link page-link' href='index.php?page=$i'>$i</a></li>";

    } else {

        echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
        
    }
}
    ?>


</ul>

      
    </div>
    <!-- /.container -->



<?php include "includes/footer.php";?>