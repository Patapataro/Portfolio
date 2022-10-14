
<?php
if(isset($_POST['creat_post'])) {
    $post_title = escape($_POST['title']);
    $post_user = escape($_POST['author_user']);
    $post_category_id = escape($_POST['post_category_id']);
    $post_status = escape($_POST['post_status']);
    
    $post_image = escape($_FILES['image']['name']);
    $post_image_temp = escape($_FILES['image']['tmp_name']);
    
    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_date = escape(date('y-m-d'));
//    $post_comment_count = 4;
     

    
    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";
    
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    
    $creat_post_query = mysqli_query($connection, $query);
    
    if(confirmQuery($creat_post_query) == true){
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        $the_post_id = mysqli_insert_id($connection);
        confirmQuery($the_post_id);
        
        
        echo "<p class='bg-success'>Post Created. <a class='btn btn-info' href='../post.php?p_id=$the_post_id'>View Post </a> or <a class='btn btn-info' href='posts.php'>View All Posts</a></p>";
    }
    
}
?>  

<form action="" method="post" enctype="multipart/form-data">
    
<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
</div>

<div class="form-group">
   <label for="category">Category</label>
   <select name="post_category_id" id="">

        <?php 
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);

        confirmQuery($select_categories);      

        while($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<option value='$cat_id'>$cat_title</option>";

        }

        ?>

   </select>
</div>
   
  
<div class="form-group">   
    <label for="post_author">Users</label>
    <select name="author_user" >
        <?php

        $query = "SELECT username FROM users";

        $result = mysqli_query($connection, $query);

        confirmQuery($result);

        while($row = mysqli_fetch_assoc($result)){

            $username = $row['username'];

            echo "<option value='$username'>$username</option>";

        }

        ?>
    </select>
</div>
   
<div class="form-group">
 <select name="post_status" id="">
     <option value="draft">Post Status</option>
     <option value="published">Publish</option>
     <option value="draft">Draft</option>
 </select>
</div>
   
<div class="form-group">
    <label for="post_Image">Post Image</label>
    <input type="file" name="image">
</div>
   
<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>
   
<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
</div>
    
<div class="form-group">
    <input class="btn btn-primary" type="submit" class="btn btn-primary" name="creat_post" value="Publish Post">
</div>

</form>