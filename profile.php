<?php
session_start();

if (isset($_SESSION["name"]) and isset($_SESSION["password"])) {
} else {
    header("location:index.php");
}
$nameErr = $emailErr = $genderErr = $stateErr = $skillErr = $mobErr = $ageErr = $profilePhotoErr = $resumeErr = "";
$name = $email = $gender = $state = $mob = $age = $profilePhoto = $resume = "";
$skill = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Please enter your name";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Please enter your email";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Please enter valid email";
        }
    }
    if (empty($_POST["mob"])) {
        $mobErr = "Please enter your mobile";
    } else {
        $mob = test_input($_POST["mob"]);
        if ((is_numeric($mob) and strlen($mob) == 10)) {
        } else {
            $mobErr = "Please enter valid mobile number";
        }
    }
    if (empty($_POST["age"])) {
        $ageErr = "Please enter your age";
    } else {
        $age = test_input($_POST["age"]);
        if ($age < 20 or $age > 30) {
            $ageErr = "Valid age is between 20-30";
        }
    }
    if (empty($_POST["gender"])) {
        $genderErr = "Please select a gender";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    if (empty($_POST["state"])) {
        $stateErr = "Please select a state";
    } else {
        $state = test_input($_POST["state"]);
    }
    if (count($_POST["skill"]) < 2) {
        $skillErr = "Please select at least two skill";
    } else {
        foreach ($_POST['skill'] as $skills) {
            $skill[] = test_input($skills);
        }
    }
    $photoName = $_FILES["profilePhoto"]["tmp_name"];
    $photoType = mime_content_type($photoName);
    $formatArray = ['jpg', 'png', 'jpeg'];
    $index = strpos($photoType, '/');
    $photoFormat = substr($photoType, $index + 1);
    if (in_array($photoFormat, $formatArray) and $_FILES["profilePhoto"]["size"] < 1001718) {
    } else {
        $profilePhotoErr = "photo size or format is not supported.";
    }
    $resumeName = $_FILES["resume"]["tmp_name"];
    $resumeType = mime_content_type($resumeName);
    $index = strpos($resumeType, '/');
    $resumeFormat = substr($resumeType, $index + 1);
    if ($resumeFormat == 'pdf' and $_FILES["resume"]["size"] < (1001718 * 2)) {
    } else {
        $resumeErr = "Resume size or format is not supported.";
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta name='author' content='Deeptiranjan'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="profile_style.css?v=1">
</head>

<body>
    <?php require_once('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <form method="post" class='inputForm' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype='multipart/form-data'>
                    <div class='form-group'>
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        <span class="error"><?php echo $nameErr; ?></span>
                    </div>
                    <div class='form-group'>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                    <div class='form-group'>
                        <label for="mobile no">Mobile no:</label>
                        <input type="text" name="mob" class="form-control" value="<?php echo $mob; ?>" pattern="[1-9]{1}[0-9]{9}" maxlength="10">
                        <span class="error"><?php echo $mobErr; ?></span>
                    </div>
                    <div class='form-group'>
                        <label for="age">Age:</label>
                        <input type="text" name="age" class="form-control" value="<?php echo $age; ?>">
                        <span class="error"><?php echo $ageErr; ?></span>
                    </div>
                    <div class='custom-control-inline'>
                        <label for="gender">Gender:</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="female" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?>value="female">
                        <label class="custom-control-label" for="female">Female</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="male" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>value="male">
                        <label class="custom-control-label" for="male">Male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="others" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="others">
                        <label class="custom-control-label" for="others">Others</label>
                    </div>
                    <span class="error"><?php echo $genderErr; ?></span>
                    <div class='form-group'>
                        <label for="state">State:</label>
                        <select name="state" class="custom-select">
                            <option value="">Select any state</option>
                            <option value="AndhraPradesh">AndhraPradesh</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Gujurat">Gujurat</option>
                            <option value="MadhyaPradesh">MadhyaPradesh</option>
                        </select>
                    </div>
                    <span class="error"><?php echo $stateErr; ?></span>
                    <div class='form-group'>
                        <label for="skills">Skills:</label>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type='checkbox' name='skill[]' class="custom-control-input" id="c" value='c'>
                            <label class="custom-control-label" for="c">C</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type='checkbox' name='skill[]' class="custom-control-input" id="java" value='java'>
                            <label class="custom-control-label" for="java">Java</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type='checkbox' name='skill[]' class="custom-control-input" id="python" value='python'>
                            <label class="custom-control-label" for="python">Python</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type='checkbox' name='skill[]' class="custom-control-input" id="web_development" value='web development'>
                            <label class="custom-control-label" for="web_development">Web Development</label>
                        </div>

                    </div>
                    <span class="error"><?php echo $skillErr; ?></span>

                    <div class="custom-file button container-fluid">
                        <input type="file" class="custom-file-input" id="profilephoto" name='profilePhoto'>
                        <label class="custom-file-label" for="profilephoto">Choose profile photo</label>

                    </div>
                    <span class="error"><?php echo $profilePhotoErr; ?></span>
                    <div class="custom-file button container-fluid">
                        <input type="file" class="custom-file-input col-md-3" name='resume' id="resume">
                        <label class="custom-file-label" for="resume">Choose resume</label>
                    </div>
                    <span class="error"><?php echo $resumeErr; ?></span>
                    <div class='button'>
                        <input type="submit" class="btn btn-block btn-primary" name="submit" value="Submit">
                    </div>
                </form>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-5">
                <?php
                if ($_POST['submit'] != "") { ?>
                    <table class="table table-bordered">
                        <?php if ($nameErr == "") { ?>
                            <tr>
                                <th>
                                    Name:
                                </th>
                                <td>
                                    <?php echo $name; ?>

                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($emailErr == "") { ?>
                            <tr>
                                <th>
                                    Email:
                                </th>
                                <td>
                                    <?php echo $email; ?>

                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($mobErr == "") { ?>
                            <tr>
                                <th>
                                    Mobile no:
                                </th>
                                <td>
                                    <?php echo $mob; ?>

                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($ageErr == "") { ?>
                            <tr>
                                <th>
                                    Age:
                                </th>
                                <td>
                                    <?php echo $age; ?>

                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($genderErr == "") { ?>
                            <tr>
                                <th>
                                    Gender:
                                </th>
                                <td>
                                    <?php echo $gender; ?>

                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($stateErr == "") { ?>
                            <tr>
                                <th>
                                    State:
                                </th>
                                <td>
                                    <?php echo $state; ?>

                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($skillErr == "") { ?>
                            <tr>
                                <th>
                                    Skills:
                                </th>
                                <td>
                                    <?php echo implode(', ', $skill); ?>

                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($profilePhotoErr == "") { ?>
                            <tr>
                                <th>
                                    ProfilePhoto:
                                </th>
                                <td>
                                    <?php foreach ($_FILES["profilePhoto"] as $k => $v) {
                                        echo $k . "=>" . $v . '<br />';
                                    } ?>

                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($resumeErr == "") { ?>
                            <tr>
                                <th>
                                    Resume:
                                </th>
                                <td>
                                    <?php foreach ($_FILES["resume"] as $k => $v) {
                                        echo $k . "=>" . $v . '<br />';
                                    }
                                    ?>

                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                <?php } ?>

            </div>
        </div>
    </div>
    <?php require_once('footer.php') ?>

</body>


</html>