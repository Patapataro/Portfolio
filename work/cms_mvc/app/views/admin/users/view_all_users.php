<div class="content-wrapper">
    <div class="container-fluid">
    
    <table class="table table-responsive-xl table-borderless table-hover table-striped table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Date</th>
                </tr>
            </thead>
        <tbody>
           
    <form action="<?php echo ASSET_ROOT;?>/admin/users" method="post">
            <?php
            
    $users = $data['users'];
    foreach($users as $user) {
        $user_id = $user->user_id; 
        $username = $user->username; 
        $user_password = $user->user_password; 
        $user_firstname = $user->user_firstname; 
        $user_lastname = $user->user_lastname; 
        $user_email = $user->user_email; 
        $user_image = $user->user_image; 
        $user_role = $user->user_role; 

        echo "<tr>";  
        echo "<td>$user_id</td>";
        echo "<td>$username</td>";
        echo "<td>$user_firstname</td>";

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

        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role</td>";

    //    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
    //    $select_post_id_query = mysqli_query($connection, $query);
    //    while($row = mysqli_fetch_assoc($select_post_id_query)){
    //    $post_id = $row['post_id'];
    //    $post_title = $row['post_title'];
    //    
    //    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
    //    
    //    }

        echo "<td></td>";

        echo "<td><button class='btn btn-primary' type='submit' name='admin' value='$user_id'>Admin</button></td>";
        echo "<td><button class='btn btn-primary' type='submit' name='subscriber' value='$user_id'>Subscriber</button></td>";    

        echo "<td><button class='btn btn-primary' name='edit_user' type='submit' value='$user_id'>Edit</button></td>";
        
        echo "<td><a onclick='modal($user_id)' class='delete_link btn btn-danger'>Delete</a></td>";
        echo "</tr>";
      
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
        
        </form>

        </tbody>
        </table>
        
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
                <h2>Are you sure you want to delete this user?</h2>
              </div>
              <div class="modal-footer">
               <form action="<?php echo ASSET_ROOT;?>/admin/users" method='post'>
                   <button name="delete_user" value="" type="submit" class="btn btn-danger modal_delete_link">Delete</button>
               </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>

          </div>
        </div>    
    </div>
</div>