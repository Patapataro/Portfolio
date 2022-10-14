        <?php
// Update Function

    if(isset($_GET['id'])){
        $cat_id = $_GET['id'];
        $cat_title = $_GET['title'];
    }else {
        $cat_title = "";
    }

    if(isset($_POST['update'])){
        $new_cat_title = escape($_POST['new_cat_title']);
        
        if($new_cat_title == "" || empty($new_cat_title)){
            echo "Update Cant Be Empty";
        }else{
            $stmt = mysqli_prepare($connection, "UPDATE categories SET cat_title = ? WHERE cat_id = ?");
            
            mysqli_stmt_bind_param($stmt, "si", $new_cat_title, $cat_id);
            
            mysqli_stmt_execute($stmt);
            
            if(!$stmt){
                confirmQuery($stmt);
            }else{ 
                $cat_title = $new_cat_title;
            }
        }
    }
            ?>
            
        <form action="" method="post">
           <label for="cat-title">Edit   Category</label>
           
            <div class="form-group">  
                <input class="form-control" type="text" name="new_cat_title" value="<?php if(isset($cat_id)){echo $cat_title;}?>">
            </div>  
               
            <div class="form-group">  
                <input class="btn btn-primary" type="submit" name="update" value="Update Category">
            </div>
        </form>
        