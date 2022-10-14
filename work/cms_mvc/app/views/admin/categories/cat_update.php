  <div class="content-wrapper">
    <div class="container-fluid">
       <?php
// Update Function
//
//    if(isset($_GET['id'])){
//        $cat_id = $_GET['id'];
//        $cat_title = $_GET['title'];
//    }else {
//        $cat_title = "";
//    }
//
//    if(isset($_POST['update'])){
//        $new_cat_title = escape($_POST['new_cat_title']);
//        
//        if($new_cat_title == "" || empty($new_cat_title)){
//            echo "Update Cant Be Empty";
//        }else{
//            $stmt = mysqli_prepare($connection, "UPDATE categories SET cat_title = ? WHERE cat_id = ?");
//            
//            mysqli_stmt_bind_param($stmt, "si", $new_cat_title, $cat_id);
//            
//            mysqli_stmt_execute($stmt);
//            
//            if(!$stmt){
//                confirmQuery($stmt);
//            }else{ 
//                $cat_title = $new_cat_title;
//            }
//        }
//    }
        
if(isset($data['category']))
{
    $category = $data['category'];
    $cat_id = $category->cat_id;
    $cat_title = $category->cat_title;
}
            ?>
            
        <?php 
        if(isset($data['message']))
        {
            echo "<div class='alert alert-danger' role='alert'>" . $data['message'] . "</div>";
        }?>
        <form action="<?php echo ASSET_ROOT;?>/admin/catUpdate/<?php echo $cat_id;?>" method="post">
           <label for="cat-title">Edit   Category</label>
           
            <div class="form-group">  
                <input class="form-control" type="text" name="new_cat_title" value="<?php if(isset($cat_id)){echo $cat_title;}?>">
            </div>  
               
            <div class="form-group">  
                <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                
                <a href="<?php echo ASSET_ROOT;?>/admin/categories"  class="btn btn-primary">Categories</a>
            </div>
        </form>
    </div>
</div>
        