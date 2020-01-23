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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="welcome_style.css?v=1">
    <link rel="stylesheet" type="text/css" href="footer_style.css">
</head>


<body class='bg-light'>
    <?php require_once("navbar.php"); ?>
    <div class='welcome'>
        <h1><?php echo "Welcome! " . $_SESSION["name"]; ?></h1>
        <a href="profile.php" class="btn btn-success" role="button">PROFILE</a>
        <a href="logout.php" class="btn btn-danger" role="button">LOG OUT</a>
    </div>

    <?php require_once("footer.php"); ?>
</body>

</html>