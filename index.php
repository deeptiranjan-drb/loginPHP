<?php
session_start();
?>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
   <meta name='author' content='Deeptiranjan'>
   <title>LogIn Page</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css" />
   <link rel="stylesheet" type="text/css" href="login_style.css?v=1">
   <link rel="stylesheet" type="text/css" href="profile_style.css?v=1">
   <?php
   $name = $password = "";
   $nameErr = $passwordErr = "";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $password = $_POST["password"];
      $_SESSION["name"] = $name;
      $_SESSION["password"] = $password;
      if ($name == "deeptiranjan" and $password == "mindfire") {

         header("location:welcome.php");
      } else {
         if ($name != "deeptiranjan") {
            $nameErr = "Please enter valid username";
         }
         if ($password != "mindfire") {
            $passwordErr = "Please enter valid password";
         }
      }
   }
   ?>
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-md-12  d-flex flex-column justify-content-center">
            <div class="row">
               <div class="col-lg-6 col-md-8 mx-auto">

                  <!-- form card login -->
                  <div class="card rounded shadow shadow-sm">
                     <div class="card-header">
                        <h3 class="mb-0">Login</h3>
                     </div>
                     <div class="card-body">
                        <form class="form" role="form" autocomplete="off" id="formLogin" method="POST">
                           <div class="form-group">
                              <label for="uname1">Username</label>
                              <input type="text" class="form-control form-control-lg rounded-0" name="name" id="uname1" value="<?php echo $name ?>">
                              <span class="error"><?php echo $nameErr; ?></span>
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control form-control-lg rounded-0" id="pwd1">
                              <span class="error"><?php echo $passwordErr; ?></span>
                           </div>

                           <button type="submit" class="btn btn-success btn-block btn-lg float-right" id="btnLogin">Login</button>
                        </form>
                     </div>
                     <!--/card-block-->
                  </div>
                  <!-- /form card login -->

               </div>


            </div>
            <!--/row-->

         </div>
         <!--/col-->
      </div>
      <!--/row-->
   </div>
   <!--/container-->



</body>

</html>