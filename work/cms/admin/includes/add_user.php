<?php
if(isset($_POST['creat_user'])) {
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    
//    $post_image = $_FILES['image']['name'];
//    $post_image_temp = $_FILES['image']['tmp_name'];
//    
    $username = escape($_POST['username']);
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);
//    $post_date = date('y-m-d');

    $password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));


    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$password}')";
    
    $creat_user_query = mysqli_query($connection, $query);
    confirmQuery($creat_user_query);
    echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";
    
//    if(confirmQuery($creat_user_query) == true){
//        move_uploaded_file($post_image_temp, "../images/$post_image");
//    }
    
}
?>  

<form action="" method="post" enctype="multipart/form-data">
    
<div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" name="user_lastname">
</div>    

<div class="form-group">
<label for="post_category_id">Category</label>
  <br>
   <select name="user_role" id="">
    
    <option value='subscriber'>Select Options</option>
    <option value='admin'>Admin</option>
    <option value='subscriber'>Subscriber</option>

   </select>
</div>
   
   
<div class="form-group">
    <label for="username">User Name</label>
    <input type="text" class="form-control" name="username">
</div>
  
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="user_email">
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="user_password">
</div>
<!--
   
<div class="form-group">
    <label for="post_Image">Post Image</label>
    <input type="file" name="image">
</div>
   
-->
    
<div class="form-group">
    <input class="btn btn-primary" type="submit" class="btn btn-primary" name="creat_user" value="Add User">
</div>

</form>