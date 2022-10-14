<?php include "includes/header.php";?>

    <!-- Navigation -->
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php
            
    if(isset($_GET['p_id'])){
        
        $the_post_id = $_GET['p_id'];

        $query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id";

        $post_views = mysqli_query($connection, $query); 

        confirmQuery($post_views);
        
        if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ) {

            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";


        } else {

            $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'published' ";

        }

        $select_all_posts_query = mysqli_query($connection,$query);
        
        if(mysqli_num_rows($select_all_posts_query) < 1 ){
        
        echo "<h1 class='text-center'>No posts available</h1>";
        
    }else {


        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            ?>

        <h2 class="my-4 card-title"><?php echo $post_title;?></h2>

              <!-- Blog Post -->
              <div class="card mb-4">
                <img class="card-img-top" src="images/<?php echo $post_image;?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?php echo $post_content;?></p>
                </div>
                <div class="card-footer text-muted">
                  <?php echo $post_date;?> by
                  <a href="#"><?php echo $post_author;?></a>
                </div>
              </div>
            <hr>   
     <?php } ?>

    <?php
        if(isset($_POST['create_comment'])){

            $comment_author = escape($_POST['comment_author']);
            $comment_email = escape($_POST['comment_email']);
            $comment_content = escape($_POST['comment_content']);

            if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ) {

                $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";

                $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'approved', now())";

                $create_comment_query = mysqli_query($connection, $query);

                if(!$create_comment_query){
                    die("QUERY FAILED!".mysqli_error($connection));
                }

        //        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
        //        $query .= "WHERE post_id = $the_post_id ";

         //       $update_comment_count = mysqli_query($connection, $query);

//                if(!$update_comment_count){
//                    die("UPDATE COUNT QUERY FAILED!".mysqli_error($connection));
//                }

    //            header("Location: index.php");

            } else {

                echo "<script> alert('Feilds cannot be empty!'); </script>";

            }


        }   

    ?>


              <!-- Comments Form -->
              <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                  <form action="" method="post" role="form">

                    <div class="form-group">
                        <label for="author">Author</label>
                        <input class="form-control" type="text" name="comment_author" requred>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="comment_email"> 
                    </div>


                    <div class="form-group">
                      <label for="comment">Your Comment</label>
                      <textarea class="form-control" name="comment_content" rows="3"></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
    <hr>
              <!-- Single Comment -->
    <?php 
//    $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
//    $query .= "AND comment_status = 'approved' ";
//    $query .= "ORDER BY comment_id DESC ";
    
    $stmt = mysqli_prepare($connection, "SELECT comment_author, comment_content, comment_date FROM comments WHERE comment_post_id = ? AND comment_status = 'approved' ORDER BY comment_id DESC ");
        
    mysqli_stmt_bind_param($stmt, "i", $the_post_id);
    
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_bind_result($stmt, $comment_date, $comment_content, $comment_author);

//    $select_comment_query = mysqli_query($connection, $query);
//    if(!$select_comment_query) {
//        die('QUERY FAILED! ' . mysqli_error($connection));
//    }


//    while($row = mysqli_fetch_array($select_comment_query)) {
//        $comment_date = $row['comment_date'];
//        $comment_content = $row['comment_content'];
//        $comment_author = $row['comment_author'];
      while(mysqli_stmt_fetch($stmt)) {
    ?>

              <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0"><?php echo $comment_author; ?>
                   <small><?php echo $comment_date; ?></small></h5>
                    <?php echo $comment_content; ?>
                </div>
              </div>


 <?php }
    mysqli_stmt_close($stmt);
        }} else {
    
            header("Location: index.php"); 
    
}  ?>


        </div>
        <!-- Sidebar Widgets Column -->
<?php include "includes/sidebar.php";?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include "includes/footer.php";?>