
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form action="" method="post">
        <h6 class="text-center"><?php echo isset($message) ? $message : ''; ?></h6>
         <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" id="username" type="text" aria-describedby="nameHelp" placeholder="Enter username" autocomplete="on" value="<?php echo isset($username) ? $username : '' ?>" name="username" required>
            
            <p style="color:red;"><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
            
         </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name" name="firstname" autocomplete="on" value="<?php echo isset($firstname) ? $firstname : '' ?>" name="username" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name" name="lastname" autocomplete="on" value="<?php echo isset($lastname) ? $lastname : '' ?>" name="username" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" autocomplete="on" value="<?php echo isset($email) ? $email : '' ?>" required>
            
            <p style="color:red;"><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
            
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password" required>
                
                <p style="color:red;"><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="registerUser" value="Register">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Login Page</a>
        </div>
      </div>
    </div>
