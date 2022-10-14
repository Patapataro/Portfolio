<?php include "includes/header.php";?>

    <!-- Navigation -->
<?php include "includes/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <?php
if(isset($_GET['author'])) {
            
        $author_name = $_GET['author'];
            
        $query = "SELECT * FROM posts WHERE post_author = '{$author_name}' AND post_status = 'published' ";
        $select_all_posts_query = mysqli_query($connection ,$query);
        confirmQuery($select_all_posts_query);

    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'], 0, 100);
        $post_status = $row['post_status'];
        
        if($post_status !== 'published'){
            echo "<h1>NO POSTS SORRY</h1>";
        }else {
        
        ?>
        
        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>

          <!-- Blog Post -->
          <div class="card mb-4">
            <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="card-img-top" src="images/<?php echo $post_image;?>" alt="Card image cap"></a>
            <div class="card-body">
              <h2 class="card-title"><?php echo $post_title;?></h2>
              <p class="card-text"><?php echo $post_content;?></p>
              <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <?php echo $post_date;?> by
              <a href="index.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author;?></a>
            </div>
          </div>
        <hr>
        
 <?php       
}}}
            ?>
          
        
        </div>
        <!-- Sidebar Widgets Column -->
<?php include "includes/sidebar.php";?>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

<?php include "includes/footer.php";?>