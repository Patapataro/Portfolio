<div class="content-wrapper">
    <div class="container-fluid">
    
<?php
//if(isset($data['user'])) {
    
    $user = $data['user'];

    $user_id = $user->user_id; 
    $username = $user->username; 
    $user_password = $user->user_password; 
    $user_firstname = $user->user_firstname; 
    $user_lastname = $user->user_lastname; 
    $user_email = $user->user_email; 
    $user_image = $user->user_image; 
    $user_role = $user->user_role; 
    
    

//}else{
//    header('Location: index.php');
//}
        if(isset($data['message'])){
    echo "<div class='alert alert-danger' role='alert'>" . $data['message'] . "</div>";
    }

?>  

<form action="<?php echo ASSET_ROOT;?>/admin/editUser/<?php echo $user_id;?>" method="post" enctype="multipart/form-data">
    
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
    
    <option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>

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
    <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
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
    <input class="btn btn-primary" type="submit" class="btn btn-primary" name="edituser" value="Edit User">
</div>

</form>
   
    </div>
</div>