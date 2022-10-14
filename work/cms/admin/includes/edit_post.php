
<?php
if(isset($_GET['p_id'])) {
    $the_p_id = $_GET['p_id'];

    if(isset($_POST['update_post'])) {
        $post_author = escape($_POST['author']);
        $post_title = escape($_POST['title']);
        $post_category_id = escape($_POST['post_category_id']);
        $post_status = escape($_POST['post_status']);

        $post_image = escape($_FILES['image']['name']);
        $post_image_temp = escape($_FILES['image']['tmp_name']);

        $post_content = escape($_POST['post_content']);
        $post_tags = escape($_POST['post_tags']);
        $post_date = escape(date('y-m-d'));

        // keeps image if one isn't selected
        if(empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $the_p_id ";
            $select_image = mysqli_query($connection, $query);
            confirmQuery($select_image);

            while($row = mysqli_fetch_array($select_image)){
                $post_image = $row['post_image'];
            }
    }

        $query = "UPDATE posts SET ";
        $query .= "post_title = '$post_title', ";
        $query .= "post_category_id = '$post_category_id', ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '$post_author', ";
        $query .= "post_status = '$post_status', ";
        $query .= "post_tags = '$post_tags', ";
        $query .= "post_content = '$post_content', ";
        $query .= "post_image = '$post_image' ";

        if(isset($_POST['viewCount'])) {
            $viewCountReset = 0;
            $query .= ", post_views_count = $viewCountReset";
        }

        $query .= "WHERE post_id = $the_p_id";

        $update_post_query =  mysqli_query($connection, $query);
        echo "<p class='bg-success'>Post Updated. <a class='btn btn-info' href='../post.php?p_id=$the_p_id'>View Post </a> or <a class='btn btn-info' href='posts.php'>Edit More Posts</a></p>";

       if(confirmQuery($update_post_query) == true){
            move_uploaded_file($post_image_temp, "../images/$post_image"); 
       }
    }


        $query = "SELECT * FROM posts WHERE post_id = $the_p_id ";
        $select_post_by_id = mysqli_query($connection, $query);

        confirmQuery($select_post_by_id);

        while($row = mysqli_fetch_assoc($select_post_by_id)) {
            $post_id = $row['post_id']; 
            $post_author = $row['post_author']; 
            $post_title = $row['post_title']; 
            $post_category = $row['post_category_id']; 
            $post_status = $row['post_status']; 
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags']; 
            $post_comment = $row['post_comment_count']; 
            $post_date = $row['post_date']; 
        }
}

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_title?>" type="text" class="form-control" name="title">
</div>

<div class="form-group">
   <label for="category">Category</label>
   <br>
   <select name="post_category_id" id="">

<?php 
$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection, $query);
        
confirmQuery($select_categories);  

           
while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    
    if($cat_id == $post_category) {
        
        echo "<option selected value='{$cat_id}'>{$cat_title}</option>";

    } else {
        
        echo "<option value='{$cat_id}'>{$cat_title}</option>";
    
    }
    
}

?>
       
   </select>
</div>

<div class="form-group">
   <label for="users">Users</label>
   <br>
   <select name="author" id="">

<?php 
$users_query = "SELECT * FROM users";
$select_users = mysqli_query($connection, $users_query);
        
confirmQuery($select_users);     
       
echo "<option value='$post_author'>$post_author</option>";
           
while($row = mysqli_fetch_assoc($select_users)) {
    $username = $row['username'];
    
    echo "<option value='$username'>$username</option>";
    
}

?>
       
   </select>
</div>
   
   
   
<!--
<div class="form-group">
    <label for="post_author">Post Author</label>
    <input value="<?php echo $post_author?>" type="text" class="form-control" name="author">
</div>
-->

<div class="form-group">
<select name="post_status" id="">
    <option value="<?php echo $post_status;?>"><?php echo $post_status;?></option>
    
    <?php
    if($post_status == 'published' ) {
    
     echo "<option value='draft'>Draft</option>";
        
    }else {
        
     echo "<option value='published'>Publish</option>";
        
    }
    ?>
    
</select>
</div>

<div class="form-group">
    <label for="post_Image">Post Image</label>
    <input type="file" name="image">
    <br>
    <img width="100" src="../images/<?php echo $post_image?>">
    
</div>
   
<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post_tags?>" type="text" class="form-control" name="post_tags">
</div>
   
<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content?></textarea>
</div>

<div class="form-group">
    <label for="reset-vew-count">Reset View Count</label>
    <br>
    <input type="checkbox" class="reset-vew-count"  name="viewCount">
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" class="btn btn-primary" name="update_post" value="Update Post">
</div>


</form>