<?php
session_start();
?>
<?php
if (isset($_SESSION["name"]) and isset($_SESSION["password"])) {
} else {
    header("location:index.php");
}
?>
<html>

<head>
    <meta name='author' content='Deeptiranjan'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Page</title>
    <link rel="stylesheet" type="text/css" href="welcome_style.css?v=1">
</head>


<body>
    <?php require_once("navbar.php"); ?>
    <div class='welcome'>
        <h1><?php echo "Welcome! " . $_SESSION["name"]; ?></h1>
        <a href="profile.php" class="btn btn-success" role="button">PROFILE</a>
        <a href="logout.php" class="btn btn-danger" role="button">LOG OUT</a>
    </div>

    <?php require_once("footer.php"); ?>
</body>

</html>