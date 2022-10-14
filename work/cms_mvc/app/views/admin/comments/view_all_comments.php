<div class="content-wrapper">
    <div class="container-fluid">

<form action="<?php echo ASSET_ROOT;?>/admin/users<?php echo (isset($data['post_id'])? '/'.$data['post_id']: ''); ?>" method="post">
     <table class="table table-responsive table-borderless table-hover table-striped table-dark">
        <div class="row">
           <div id="bulkOptionsContainer" class="col-xs-4 col-md-4">

               <select class="form-control" name="bulk_options" id="">
                   <option value="">Select Action</option>
                   <option value="approved">Approve</option>
                   <option value="unapproved">Unapproved</option>
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
        //    if(isset($_GET['apprve'])){
        //    $the_comment_id = $_GET['apprve'];
        //
        //    $query = "UPDATE comments SET comment_status = 'approved' ";
        //    $query .= "WHERE comment_id = {$the_comment_id} ";
        //
        //    $result = mysqli_query($connection, $query);
        //
        //    confirmQuery($result);
        //    }
        //            
        ////unapproves comment
        //    if(isset($_GET['unapprve'])){
        //    $the_comment_id = $_GET['unapprve'];
        //
        //    $query = "UPDATE comments SET comment_status = 'unapproved' ";
        //    $query .= "WHERE comment_id = {$the_comment_id} ";
        //
        //    $result = mysqli_query($connection, $query);
        //
        //    confirmQuery($result);
        //    }
        //         
        //// deletes comment
        //    if(isset($_GET['delete'])){
        //    $the_comment_id = $_GET['delete'];
        //
        //    $query = "Delete FROM comments WHERE comment_id = {$the_comment_id}";
        //
        //    $result = mysqli_query($connection, $query);
        //
        //    confirmQuery($result);
        //    }
        //            
            

            $comments = $data['comments'];
        foreach($comments as $comment){

            $comment_id = $comment->comment_id; 
            $comment_post_id = $comment->comment_post_id; 
            $comment_author = $comment->comment_author; 
            $comment_email = $comment->comment_email; 
            $comment_content = $comment->comment_content; 
            $comment_status = $comment->comment_status; 
            $comment_date = $comment->comment_date; 
            $post_id = $comment->post_id;
            $post_title = $comment->post_title;

            echo "<tr>";  
            echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$comment_id'></td> ";
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

        //    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        //    $select_post_id_query = mysqli_query($connection, $query);            
            echo "<td><a href='" . ASSET_ROOT . "/home/post/$post_id'>$post_title</a></td>";
            
            echo "<td>$comment_date</td>";

            echo "<td><button type='submit' name='approved' value='$comment_id' class='btn btn-primary'>Approve</button></td>";
            echo "<td><button type='submit' name='unapproved' value='$comment_id' class='btn btn-primary'>Unapprove</button></td>";
            echo "<td><a rel='$comment_id' onclick='modal($comment_id)' class='btn btn-primary' id='delete_link'>Delete</a>";
            echo "</td>";

            }

            ?>
            
            <script>

                function modal($id){

                    const modal_delete_link = document.querySelector(".modal_delete_link");

                    modal_delete_link.setAttribute('value', $id);
                    console.log(modal);

                    $("#catModal").modal('show');
                }

            </script>

                </tbody>
                </table>
        
                        <!-- Modal -->
        <div id="catModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- modal header -->
                <h4 class="modal-title" style="red"></h4>
              </div>
              <div class="modal-body">
                <h2>Are you sure you want to delete this Category?</h2>
              </div>
              <div class="modal-footer">
               <form action="<?php echo ASSET_ROOT;?>/admin/viewAllComments<?php echo (isset($data['post_id'])? '/'.$data['post_id']: ''); ?>" method='post'>
                   <button type='submit' name='delete' value='' class="btn btn-danger modal_delete_link">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
              </div>
            </div>

          </div>
        </div>
        
     </form>
    </div>
</div>