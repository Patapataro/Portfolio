<?php include "includes/header.php";?>

    <!-- Navigation -->
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php
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
            
    
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ) {
        $stmt = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_user, post_date, post_image, post_content, post_status FROM posts");
        
        mysqli_stmt_execute($stmt);
        
    } else {
        $stmt = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_user, post_date, post_image, post_content, post_status FROM posts WHERE post_status = ?");
        $published = "published";
        
        mysqli_stmt_bind_param($stmt, "s", $published);
        
        mysqli_stmt_execute($stmt);
        
    }

    mysqli_stmt_bind_result($stmt, $post_id, $post_title, $post_author, $post_user, $post_date, $post_image, $post_content, $post_status);

    mysqli_stmt_store_result($stmt);
    
    $count = mysqli_stmt_num_rows($stmt);
            
    if($count < 1){
        
        echo "<h1 class='text-center'>No posts available</h1>";
        
    } else {
         
    
        
        $count = ceil($count / $per_page);


        if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ) {
//
//            $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
//            
            $stmt = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_user, post_date, post_image, post_content, post_status FROM posts ORDER BY post_id DESC LIMIT $page_1, $per_page");
            

        } else {

//            $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page_1, $per_page";
            
            $stmt = mysqli_prepare($connection, "SELECT post_id, post_title, post_author, post_user, post_date, post_image, post_content, post_status FROM posts WHERE post_status = ? ORDER BY post_id DESC LIMIT $page_1, $per_page");
            $published = "published";
            
            mysqli_stmt_bind_param($stmt, "s", $published);
            
        }
        
        mysqli_stmt_execute($stmt);
        
        mysqli_stmt_bind_result($stmt, $post_id, $post_title, $post_author, $post_user, $post_date, $post_image, $post_content, $post_status);

        
//        $select_all_posts_query = mysqli_query($connection ,$query);

//        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
//            $post_id = $row['post_id'];
//            $post_title = $row['post_title'];
//            $post_author = $row['post_author'];
//            $post_date = $row['post_date'];
//            $post_image = $row['post_image'];
//            $post_content = substr($row['post_content'], 0, 100);
//            $post_status = $row['post_status'];
        while(mysqli_stmt_fetch($stmt)) {
            

        ?>

            <h2 class="my-4 card-title">
                <?php echo $post_title;?>
            </h2>

              <!-- Blog Post -->
              <div class="card mb-4">
                <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="card-img-top" src="images/<?php echo $post_image;?>" alt="Card image cap"></a>
                <div class="card-body">
                  <p class="card-text"><?php echo substr($post_content, 0, 100);?></p>
                  <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                  <?php echo $post_date;?> by
                  <a href="author_posts.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author;?></a>
                </div>
              </div>
            <hr>


 <?php
    } }  ?>


        </div>
        <!-- Sidebar Widgets Column -->
<?php include "includes/sidebar.php";?>

    
      </div>
    <!-- /.row -->

<ul class="pagination pagination justify-content-center">
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