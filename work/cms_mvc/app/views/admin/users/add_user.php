<div class="content-wrapper">
    <div class="container-fluid">
    
<?php
    if(isset($data['message'])){
        echo "<div class='alert alert-danger' role='alert'>" . $data['message'] . "</div>";
    }

?>  

<form action="<?php echo ASSET_ROOT;?>/admin/addUser" method="post" enctype="multipart/form-data">
    
<div class="form-group">
    <label for="firstname">First Name</label>
    <input autocomplete="on" type="text" class="form-control" name="user_firstname" required>
</div>

<div class="form-group">
    <label for="lastname">Last Name</label>
    <input autocomplete="on" type="text" class="form-control" name="user_lastname" required>
</div>    

<div class="form-group">
<label for="post_category_id">User Role</label>
  <br>
   <select name="user_role" id="">
    
    <option value='subscriber'>Select Options</option>
    <option value='admin' name="admin">Admin</option>
    <option value='subscriber' name="subscriber">Subscriber</option>

   </select>
</div>
   
   
<div class="form-group">
    <label for="username">User Name</label>
    <input autocomplete="on" type="text" class="form-control" name="username" required>
</div>
  
<div class="form-group">
    <label for="email">Email</label>
    <input autocomplete="on" type="email" class="form-control" name="user_email" required>
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


    </div>
</div>