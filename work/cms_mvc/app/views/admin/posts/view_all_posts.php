<div class="content-wrapper">
    <div class="container-fluid">

<form action="<?php echo ASSET_ROOT;?>/admin/bulkOptions" method="post">
           <table class="table table-responsive table-borderless table-hover table-striped table-dark">
        <div class="row">
           <div id="bulkOptionsContainer" class="col-xs-4 col-md-4">

               <select class="form-control" name="bulk_options" id="">
                   <option value="">Select Options</option>
                   <option value="published">Publish</option>
                   <option value="draft">Draft</option>
                   <option value="delete">Delete</option>
                   <option value="clone">Clone</option>
               </select>

           </div>

           <div class="col-xs-4 col-md-4">

               <input type="submit" name="submit" class="btn btn-success" value="Apply">
               <a href="<?php echo ASSET_ROOT; ?>/admin/addPost" class="btn btn-primary">New Post</a>

           </div>
        </div>
           <br>
            <thead class="thead-dark">
                <tr>
                    <th><input id="selectAllBoxes" type="checkbox"></th>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Views</th>
                    <th>Comments</th>

                </tr>
            </thead>
        <tbody>
            <?php

    foreach($data['posts'] as $post) {
        $post_id = $post->post_id; 
        $post_author = $post->post_author; 
        $post_user = $post->post_user; 
        $post_title = $post->post_title; 
        $post_category = $post->post_category_id; 
        $post_status = $post->post_status; 
        $post_image = $post->post_image; 
        $post_tags = $post->post_tags; 
        $post_comment = $post->comment_count;
        $post_date = $post->post_date; 
        $post_views_count = $post->post_views_count; 
        $category_title  = $post->cat_title; 
        $category_id = $post->cat_id; 

        echo "<tr>"; 
        echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>";
        echo "<td>$post_id</td>";

        if(isset($post_author) || !empty($post_author)) {

            echo "<td>$post_author</td>";

        } else if(isset($post_user) || !empty($post_user)) {

            echo "<td>$post_user</td>";

        }

        echo "<td>$post_title </td>";
        echo "<td>{$category_title}</td>";
        echo "<td>$post_status</td>";
        echo "<td><img width='100' src='data:image/png;base64," . base64_encode(file_get_contents("./app/views/images/$post_image")) . "' alt='No Image'></td>";
        echo "<td>$post_tags</td>";

        echo "<td>$post_views_count</td>";

        echo "<td><a href='" . ASSET_ROOT . "/admin/viewAllComments/$post_id'>$post_comment</a></td>"; 

        echo "<td><a class='btn btn-primary' href='" . ASSET_ROOT . "/home/post/$post_id'>View Post</a></td>";
        
        echo "<td><a class='btn btn-primary' href='" . ASSET_ROOT . "/admin/editPost/$post_id'>Edit</a></td>";
        
        echo "<td><a onclick='modal($post_id)' class='delete_link btn btn-danger'>Delete</a></td>";

    }

    ?>

    <script>

        function modal($id){
            
            const modal_delete_link = document.querySelector(".modal_delete_link");
            
            modal_delete_link.setAttribute('value', $id);
            console.log(modal);
            
            $("#myModal").modal('show');
        }

             
            
    </script>
        

        </tbody>
        </table>
</form>



        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="red"></h4>
              </div>
              <div class="modal-body">
                <h2>Are you sure you want to delete this comment?</h2>
              </div>
              <div class="modal-footer">
               <form action="<?php echo ASSET_ROOT;?>/admin/deletePost" method='post'>
                   <button name="post_id" value="" type="submit" class="btn btn-danger modal_delete_link">Delete</button>
               </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>

          </div>
        </div>
        
    </div>
</div>