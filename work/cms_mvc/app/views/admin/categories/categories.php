 <div class="content-wrapper">
    <div class="container-fluid">

        <div class="col-sm-6">  
        <form action="<?php echo ASSET_ROOT;?>/admin/Categories" method="post">
           <label for="cat-title">Add Category</label>
            <div class="form-group">  
                <input class="form-control" type="text" name="cat_title">
            </div>  

            <div class="form-group">  
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
            </div>
        </form> 
        </div>
        
        <!-- Add Category Form --> 
        <div class=" col-xl-6">

        <table class="table table-responsive-sm table-borderless table-hover table-striped table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Title</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                
                $categories = $data['categories'];
                foreach($categories as $category)
                {
                    $cat_id = $category->cat_id; 
                    $cat_title = $category->cat_title; 
                    
                    echo "<tr>";
                    echo "<td>{$cat_id}</td>";
                    echo "<td>{$cat_title}</td>";
                    echo "<td><a rel='$cat_id' onclick='modal($cat_id)' class='btn btn-primary' id='delete_link'>Delete</a>
                    <a class='btn btn-primary' href='" . ASSET_ROOT . "/admin/catUpdate/{$cat_id}'>update</a></td>";
                    echo "</tr>";
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
        </div>
        
                <!-- Modal -->
        <div id="catModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="red"></h4>
              </div>
              <div class="modal-body">
                <h2>Are you sure you want to delete this Category?</h2>
              </div>
              <div class="modal-footer">
               <form action="<?php echo ASSET_ROOT;?>/admin/Categories" method='post'>
                   <button name="DeleteCategory" value="" type="submit" class="btn btn-danger modal_delete_link">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
              </div>
            </div>

          </div>
        </div>

    </div>
</div>
   