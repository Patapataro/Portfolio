<div class="content-wrapper">
    <div class="container-fluid">

<?php
    if(isset($data['boolean'])){
        
        $the_post_id = $data['post_id'];

        echo "<p class='bg-success'>Post Created. <a class='btn btn-info' href='../post.php?p_id=$the_post_id'>View Post </a> or <a class='btn btn-info' href='posts.php'>View All Posts</a></p>";
    }
?>  

        <form action="<?php echo ASSET_ROOT;?>/admin/addPost" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
           <label for="category">Category</label>
           <select name="post_category_id" id="">

                <?php 
                foreach($data['categories'] as $row)
                {
                    $cat_id = $row->cat_id;
                    $cat_title = $row->cat_title;

                    echo "<option value='$cat_id'>$cat_title</option>";

                }

                ?>

           </select>
        </div>


        <div class="form-group">   
            <label for="post_author">Users</label>
            <select name="author_user" >
                <?php
                foreach($data['users'] as $row){

                    $username = $row->username;

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
            <input type="file" name="image" id="image">
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
    </div>
</div>