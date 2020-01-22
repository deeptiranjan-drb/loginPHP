<?php
session_start();
?>
<?php
unset($_SESSION["name"]);
unset($_SESSION["password"]);
header("location:index.php");
?>