        <table class="table table-responsive table-borderless table-hover table-striped table-dark">
            <thead>
                <tr>
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
            
            
    $query = "SELECT * FROM comments WHERE comment_post_id = ".mysqli_real_escape_string($connection, $_GET['id'])." ";
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