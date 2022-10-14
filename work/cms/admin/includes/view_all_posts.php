<?php

include("delete_modal.php");

if(isset($_POST['checkBoxArray'])){

    foreach($_POST['checkBoxArray'] as $postValueId){

        $bulk_options = $_POST['bulk_options'];

        if($bulk_options == "delete"){

                $query = "DELETE FROM posts WHERE post_id = {$postValueId}";

                $result = mysqli_query($connection, $query);

                confirmQuery($result);

        } else if($bulk_options == "published" || $bulk_options == "draft"){

                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";

                $result = mysqli_query($connection, $query);

                confirmQuery($result);

        } else if($bulk_options == 'clone') {
                $query = "Select * FROM posts WHERE post_id = $postValueId";
                $select_post = mysqli_query($connection, $query);
                confirmQuery($select_post);
            while($row = mysqli_fetch_assoc($select_post)){
                $post_id = $row['post_id']; 
                $post_category = $row['post_category_id']; 
                $post_title = $row['post_title']; 
                $post_author = $row['post_author']; 
                $post_date = $row['post_date']; 
                $post_image = $row['post_image']; 
                $post_content = $row['post_content']; 
                $post_tags = $row['post_tags']; 
                $post_comment = $row['post_comment_count']; 
                $post_status = $row['post_status']; 
                
                $query = "INSERT INTO posts (post_category_id ,post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
                $query .= "VALUES ('{$post_category}', '{$post_title}', '{$post_author}', '{$post_date}', '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment}', '{$post_status}')";
                
                $post_clone_query = mysqli_query($connection, $query);
                
                confirmQuery($post_clone_query);
                
            }
        }
    }
}

?>

<form action="" method="post">
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
               <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>

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
    if(isset($_POST['delete'])){
        $the_post_id = escape($_POST['post_id']);
        
        $query = "Delete FROM posts WHERE post_id = {$the_post_id}";

        $result = mysqli_query($connection, $query);

        confirmQuery($result);
    }


//    $query = "SELECT * FROM posts";
    $query = "SELECT posts.post_id, posts.post_author, posts.post_user, posts.post_title, posts.post_category_id, posts.post_status, posts.post_image, posts.post_tags, posts.post_comment_count, posts.post_date, posts.post_views_count, categories.cat_id, categories.cat_title ";
    $query .= " FROM posts ";
    $query .= " LEFT JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY posts.post_id DESC ";
            
            
    $select_all_categories = mysqli_query($connection,$query);
    confirmQuery($select_all_categories);

    while($row = mysqli_fetch_assoc($select_all_categories)) {
        $post_id = $row['post_id']; 
        $post_author = $row['post_author']; 
        $post_user = $row['post_user']; 
        $post_title = $row['post_title']; 
        $post_category = $row['post_category_id']; 
        $post_status = $row['post_status']; 
        $post_image = $row['post_image']; 
        $post_tags = $row['post_tags']; 
        $post_comment = $row['post_comment_count']; 
        $post_date = $row['post_date']; 
        $post_views_count = $row['post_views_count']; 
        $category_title  = $row['cat_title']; 
        $category_id = $row['cat_id']; 

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
        echo "<td><img width='100' src='../images/$post_image' alt='No Image'></td>";
        echo "<td>$post_tags</td>";

        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
        $send_comment_query = mysqli_query($connection, $query);

        $row = mysqli_fetch_array($send_comment_query);
        $comment_id = $row['comment_id'];

        $count_comments = mysqli_num_rows($send_comment_query);

        echo "<td>$post_views_count</td>";

        echo "<td><a href='comments.php?source=post_comments&id=$post_id'>$count_comments</a></td>"; 

        echo "<td><a class='btn btn-primary' href='../post.php?p_id=$post_id'>View Post</a></td>";
        echo "<td><a class='btn btn-primary' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        
        ?>
        <form action="post">
           
            <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
            
            <?php 
                echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>';
            
            ?>
              
        </form>
        
        
        
        <?php
        
//        echo "<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";

    //    echo "<td><a class='btn btn-primary' onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";

    }


    ?>
        
    <script>
         
        $(document).ready(function(){
            
            $(".delete_link").on('click', function(){
                
                var id =  $(this).attr("rel");
                
                var delete_url = "posts.php?delete="+ id +" ";
                
                $(".modal_delete_link").attr("href", delete_url);
                
                $("#myModal").modal('show');
                
                
            
            });  
            
            
        });
            
            
            
            
    </script>

        </tbody>
        </table>
</form>