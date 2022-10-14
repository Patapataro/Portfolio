<?php

if(isset($_POST['checkBoxArray'])){

    foreach($_POST['checkBoxArray'] as $commentValueId){

        $bulk_options = $_POST['bulk_options'];

        if($bulk_options == "delete"){

                $query = "Delete FROM comments WHERE comment_id = {$commentValueId}";

                $result = mysqli_query($connection, $query);

                confirmQuery($result);

        } else if($bulk_options === "approve" || $bulk_options === "unapproved"){
                
                $bulk_options = mysqli_real_escape_string($connection, $bulk_options);
            
                $query = "UPDATE comments SET comment_status = '{$bulk_options}' WHERE comment_id = {$commentValueId} ";

                $result = mysqli_query($connection, $query);

                confirmQuery($result);

        } else if($bulk_options == 'clone') {
                $query = "Select * FROM comments WHERE comment_id = $commentValueId";
                $select_post = mysqli_query($connection, $query);
                confirmQuery($select_post);
            while($row = mysqli_fetch_assoc($select_post)){
                $comment_id = $row['comment_id']; 
                $comment_post_id = $row['comment_post_id']; 
                $comment_author = $row['comment_author']; 
                $comment_email = $row['comment_email']; 
                $comment_content = $row['comment_content']; 
                $comment_status = $row['comment_status']; 
                $comment_date = $row['comment_date']; 

                
                $query = "INSERT INTO comments (comment_post_id ,comment_author, comment_email, comment_content, comment_status) ";
                $query .= "VALUES ('{$comment_post_id}', '{$comment_author}', '{$comment_email}', '{$comment_content}', '{$comment_status}', '{$comment_date}')";
                
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
                   <option value="approve">Approve</option>
                   <option value="unapproved">Unapproved</option>
                   <option value="clone">Clone</option>
                   <option value="delete">Delete</option>
               </select>

           </div>

           <div class="col-xs-4 col-md-4">

               <input type="submit" name="checkBoxArray" class="btn btn-success" value="Apply">

           </div>
        </div>
           <br>
            <thead>
                <tr>
                    <th><input id="selectAllBoxes" type="checkbox"></th>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>In Response to</th>
                    <th>Date</th>
                    <th>Approved</th>
                    <th>Unapproved</th>
                    <th>Delete</th>
                </tr>
            </thead>
        <tbody>
            <?php
            
//approves comments
    if(isset($_GET['apprve'])){
    $the_comment_id = $_GET['apprve'];

    $query = "UPDATE comments SET comment_status = 'approved' ";
    $query .= "WHERE comment_id = {$the_comment_id} ";

    $result = mysqli_query($connection, $query);

    confirmQuery($result);
    }
            
//unapproves comment
    if(isset($_GET['unapprve'])){
    $the_comment_id = $_GET['unapprve'];

    $query = "UPDATE comments SET comment_status = 'unapproved' ";
    $query .= "WHERE comment_id = {$the_comment_id} ";

    $result = mysqli_query($connection, $query);

    confirmQuery($result);
    }
         
// deletes comment
    if(isset($_GET['delete'])){
    $the_comment_id = $_GET['delete'];

    $query = "Delete FROM comments WHERE comment_id = {$the_comment_id}";

    $result = mysqli_query($connection, $query);

    confirmQuery($result);
    }
            
            
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_assoc($select_comments)) {
    $comment_id = $row['comment_id']; 
    $comment_post_id = $row['comment_post_id']; 
    $comment_author = $row['comment_author']; 
    $comment_email = $row['comment_email']; 
    $comment_content = $row['comment_content']; 
    $comment_status = $row['comment_status']; 
    $comment_date = $row['comment_date']; 

    echo "<tr>";  
    echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]'</td> ";
    echo "<td>$comment_id</td>";
    echo "<td>$comment_author</td>";
    echo "<td>$comment_content</td>";

        

//    $query = "SELECT * FROM comments";
//    $select_comments = mysqli_query($connection,$query);
//        
//    confirmQuery($select_comments);
//        
//    while($row = mysqli_fetch_assoc($select_comments)) {
//    $cat_id = $row['cat_id']; 
//    $cat_title = $row['cat_title']; 
//    
//    echo "<td>{$cat_title}</td>";
//    }
    
    echo "<td>$comment_email</td>";
    echo "<td>$comment_status</td>";
    
    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
    $select_post_id_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_post_id_query)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    
    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
    
    }
        
    echo "<td>$comment_date</td>";
        
    echo "<td><a class='btn btn-primary' href='comments.php?apprve=$comment_id'>Approve</a></td>";
    echo "<td><a class='btn btn-primary' href='comments.php?unapprve=$comment_id'>Unapprove</a></td>";
    
    echo "<td><a class='btn btn-primary' onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='comments.php?delete=$comment_id'>Delete</a></td>";
    echo "</tr>";
      
    }
    

    
    ?>

        </tbody>
        </table>
</form>