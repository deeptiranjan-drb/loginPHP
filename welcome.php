<?php
session_start();
?>
<html>
<?php
if (isset($_SESSION["name"]) and isset($_SESSION["password"])) {
    echo "Welcome! " . $_SESSION["name"];
?>
    <br />
    <a href="profile.php">Profile</a>
    <a href="index.php">LOG OUT</a>
<?php
} else {
    header("location:index.php");
}
?>

</html>