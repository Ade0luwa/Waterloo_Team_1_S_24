<?php
$showAlert = false;
$showError = false;
$already = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include './admin/db_connect.php';

    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];

    if (usernameExists($conn, $username)) {
        $already = true;
    } else {
        $showError = !handleSignup($conn, $name, $username, $email, $pass, $cpass);
        $showAlert = !$showError;
    }
}

function usernameExists($conn, $username) {
    $existsStmt = $conn->prepare("SELECT * FROM `clients` WHERE username=?");
    $existsStmt->bind_param("s", $username);
    $existsStmt->execute();
    $result = $existsStmt->get_result();
    return $result->num_rows > 0;
}

function validateInput($name, $username, $email, $pass, $cpass) {
    if (empty($name) || empty($username) || empty($email) || empty($pass) || empty($cpass)) {
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    if ($pass !== $cpass) {
        return false;
    }

    return true;
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

function insertUser($conn, $name, $username, $email, $hash) {
    $queryStmt = $conn->prepare("INSERT INTO `clients` (`name`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)");
    $queryStmt->bind_param("ssss", $name, $username, $email, $hash);
    return $queryStmt->execute();
}

function handleSignup($conn, $name, $username, $email, $pass, $cpass) {
    if (!validateInput($name, $username, $email, $pass, $cpass)) {
        return false;
    }

    $hash = hashPassword($pass);

    if (insertUser($conn, $name, $username, $email, $hash)) {
        header('Location: login.php');
        exit();
    }

    return false;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./admin/db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
    $system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
    foreach($system as $k => $v){
        $_SESSION['system'][$k] = $v;
    }
}
ob_end_flush();
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Effortless Events</title>


    <?php include('./header.php'); ?>

</head>
<style>
body {
    width: 100%;
    height: calc(100%);
    /*background: #007bff;*/
}

main#main {
    width: 100%;
    height: calc(100%);
    background: white;
}

#login-right {
    border-left: 5px solid purple;
    position: absolute;
    right: 0;
    width: 45%;
    height: calc(100%);
    background: rgb(151, 117, 250);
    background: linear-gradient(180deg, rgba(151, 117, 250, 1) 27%, rgba(255, 216, 168, 1) 100%);
    color: white;
    display: flex;
}

#login-left {
    position: absolute;
    left: 0;
    width: 55%;
    height: calc(100%);
    display: flex;
    align-items: center;
    /*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);*/
    background: url('./admin/assets/img/bgimage.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

#login-right .card {
    margin: auto;
    z-index: 1
}

.logo {
    margin: auto;
    font-size: 8rem;
    padding: 50px;
    color: #000000b3;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50px;
}

.text-theme {
    border-bottom: 2px solid purple;
    padding: 12px;
    margin: 10px;
    color: purple;
}

.btn-theme {
    display: inline-block;
    margin: 10px 0px;
    padding: 8px 24px;
    background-color: #d0bfff;
}

.btn-theme:hover {
    background-color: #845ef7;
    transition: 0.4s ease all;
}
</style>

<body>


    <main id="main" class=" bg-black">
        <div id="login-left">
            <div class="logo">
                <img src="assets/img/ee-logo-large.png">
            </div>
        </div>

        <div id="login-right">
            <div class="w-100">
                <h1 class="text-theme text-center">Sign Up</h1>
                <br>

                <div class="card col-md-8 bg-dark">
                    <div class="card-body">
                        <?php
                        if ($already) {
                            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong> Username Already Exists. </strong> 
                                </div>';
                        }

                        if ($showAlert) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Your Account is now created and you can login.</strong>
                                </div> ';
                        }

                        if ($showError) {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong> Your Passwords does not match. </strong>
                                </div>';
                        }
                        ?>

                        <form id="login-form" method="post">
                            <div class="form-group">
                                <label for="name" class="control-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username" class="control-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cpassword" class="control-label">Confirm Password</label>
                                <input type="password" id="cpassword" name="cpassword" class="form-control" required>
                            </div>
                            <center><button class="btn-lg btn-wave btn-theme">Sign Up</button></center>
                        </form>
                        <p> Have an Account? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>

</html>
