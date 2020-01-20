<?php
session_start();
?>
<html>

<head>
   <title>Hello World</title>


</head>

<body>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <p> Username:<input type="text" name="name" placeholder="enter user name"></input></p>
      <p>Password:<input type="password" name="password" placeholder="enter password"></input></p>
      <input type="submit" value="submit">
   </form>


   <?php
   $name = $password = "";
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $password = $_POST["password"];
      $_SESSION["name"] = $name;
      $_SESSION["password"] = $password;
   }
   if ($name == "deeptiranjan" and $password == "mindfire") {
      header("Location: welcome.php");
   } else {
      echo "please enter valid credentials";
   }
   ?>
</body>

</html>