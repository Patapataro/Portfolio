<?php include "includes/admin_header.php";?>
 
  <!-- Navigation-->
<?php include "includes/admin_navigation.php"?>

  <div class="content-wrapper">
    <div class="container-fluid">

        <div class="col-sm-6">  

<?php insert_categories();?>
        <form action="" method="post">
           <label for="cat-title">Add Category</label>
            <div class="form-group">  
                <input class="form-control" type="text" name="cat_title">
            </div>  

            <div class="form-group">  
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
            </div>
        </form> 

<?php
// includes update function
if(isset($_GET['update'])){
    include "includes/cat_update.php";
}
            ?>       

        </div><!-- Add Category Form --> 

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

                <?php //Find all Categories READ
                findAllCategories();
                ?>



            </tbody>
        </table>       
        </div>

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<?php include "includes/admin_footer.php";?>