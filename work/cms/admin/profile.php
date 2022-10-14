<?php include "includes/admin_header.php";?>
<?php  

if(isset($_SESSION['username'])) {
    
$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username = '{$username}' ";
    
$select_user_profile_query = mysqli_query($connection, $query);
    
while($row = mysqli_fetch_array($select_user_profile_query)){
    
    $user_id = $row['user_id']; 
    $username = $row['username']; 
    $user_password = $row['user_password']; 
    $user_firstname = $row['user_firstname']; 
    $user_lastname = $row['user_lastname']; 
    $user_email = $row['user_email']; 
//    $user_image = $row['user_image']; 
    $user_role = $row['user_role']; 
    
    }
}

?>
<?php
if(isset($_POST['edit_user'])) {
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];

    $username = escape($_POST['username']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);
//    $post_date = date('y-m-d');

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_role = '{$user_role}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE username = '{$username}'";

    $edit_user_query =  mysqli_query($connection, $query);

    confirmQuery($edit_user_query);
//    if(confirmQuery($creat_user_query) == true){
//        move_uploaded_file($post_image_temp, "../images/$post_image");
//    }
    
}
?>
 
  <!-- Navigation-->
<?php include "includes/admin_navigation.php"?>
  <div class="content-wrapper">
    <div class="container-fluid">

        <h1 class="page-header">
            Welcome to Admin
            <small>Author</small>            
        </h1>
        <hr>
<div class="col-sm-10 col-xs-10">

<form action="" method="post" enctype="multipart/form-data">
    
<div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
</div>

<div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
</div>    

<div class="form-group">
<label for="post_category_id">Category</label>
  <br>
    <select name="user_role" id="">
    
    <option value='subscriber'><?php echo $user_role; ?></option>

    <?php
    if($user_role == 'admin'){
    echo "<option value='subscriber'>subscriber</option>";
    }else {
    echo "<option value='admin'>admin</option>";
    }
       
       ?>
    
    

   </select>
</div>
   
   
<div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
</div>
  
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
</div>
<!--
   
<div class="form-group">
    <label for="post_Image">Post Image</label>
    <input type="file" name="image">
</div>
   
-->
    
<div class="form-group">
    <input class="btn btn-primary" type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
</div>

</form>

</div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php include "includes/admin_footer.php";?>