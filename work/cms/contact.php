<?php include "includes/register_header.php";?>
<?php

// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);



if(isset($_POST['submit'])) {

    $to = "patrick.flores@g.austincc.edu";
    $subject = wordwrap($_POST['subject'], 70);
    $body = wordwrap($_POST['body'], 70);
    $header ="From: " . $_POST['email'];

    
    // send email
    mail($to, $subject, $body, $header);
}
    
?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Contact</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input class="form-control" id="subject" type="subject" aria-describedby="subject" placeholder="Enter Subject" name="subject" required>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <textarea class="form-control" name="body" id="body" cols="60" rows="10" required></textarea>
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="Send">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
