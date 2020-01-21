<?php
session_start();
?>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
   <meta name='author' content='Deeptiranjan'>
   <title>LOG IN</title>
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css" />
   <link rel="stylesheet" type="text/css" href="login_style.css?v=1">

</head>

<body>

   <div class="container">
      <div class="row">
         <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title">Please sign in</h3>
               </div>
               <div class="panel-body">
                  <form accept-charset="UTF-8" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                     <fieldset>
                        <div class="form-group">
                           <input class="form-control" placeholder="<?php if ($nameErr == "") {
                                                                        echo "User name";
                                                                     } else {
                                                                        echo $nameErr;
                                                                     } ?>" name="name" type="text">
                        </div>
                        <div class="form-group">
                           <input class="form-control" placeholder="<?php if ($paswordErr == "") {
                                                                        echo "password";
                                                                     } else {
                                                                        echo $passwordErr;
                                                                     } ?>" name="password" type="password" value="">
                        </div>
                        <!-- <div class="checkbox">
                           <label>
                              <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                           </label>
                        </div> -->
                        <input class="btn btn-lg btn-primary btn-square" type="submit" value="Login">
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>


   <?php
   $name = $password = "";
   $nameErr = "";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $password = $_POST["password"];
      $_SESSION["name"] = $name;
      $_SESSION["password"] = $password;
   }
   if ($name == "deeptiranjan") {
      if ($password == "mindfire") {
         header("location:welcome.php");
      } else {
         $passwordErr = "Please enter valid password";
      }
   } else {
      $nameErr = "Please enter valid username";
   }
   ?>
</body>

</html>