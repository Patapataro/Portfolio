<!-- /.row -->
</div>

<ul class="pagination pagination justify-content-center">
<?php
if(isset($count)){

  if(isset($_GET['page'])){
          
    $page = $_GET['page'];
          
  }else{

    $page = 1;

  }

  for($i = 1; $i <= $count; $i++){
     
     if($i == $page) {
         
         echo "<li class='page-item' style='background: black;'><a class='active_link page-link' href='index.php?page=$i'>$i</a></li>";

     } else {

         echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
         
     }
  }
}
    ?>


</ul>

 <!-- /.container -->    
</div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; SavvySchemme</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo ASSET_ROOT;?>/public/js/jquery.min.js"></script>

    <script src="<?php echo ASSET_ROOT;?>/public/js/popper.min.js">
    </script>

    <script src="<?php echo ASSET_ROOT;?>/public/js/bootstrap.min.js"></script>
    

  </body>

</html>
