<?php include "includes/admin_header.php";?>
 
  <!-- Navigation-->
<?php include "includes/admin_navigation.php"?>
  <div class="content-wrapper">
    <div class="container-fluid">

<div class="col-md-12">
<?php
if(isset($_GET['source'])){

$source =  $_GET['source'];
    
}else{
$source = "";
}
   
switch($source) {
        case 'add_post';
        include "includes/add_post.php";
        break;
        
        case'edit_post';
        include "includes/edit_post.php";
        break;
        
        
    default:
        
    include "includes/view_all_posts.php";
    
    break;
}  
?>
</div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php include "includes/admin_footer.php";?>