<?php
$login = false;
$showError = false;
$logoutSuccess = false;

session_start();
if (isset($_SESSION['logout_success'])) {
    $logoutSuccess = true;
    unset($_SESSION['logout_success']);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include './admin/db_connect.php';

    $username = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * from `clients` where username = '$username'";
    $result = mysqli_query($conn, $query);

    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $row['name'];
            $login = true;
        } else {
            $showError = true;
        }
    } else {
        $showError = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php 
include('./admin/db_connect.php');
ob_start();
if (!isset($_SESSION['system'])) {
    $system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
    foreach ($system as $k => $v) {
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
    width: 40%;
    height: calc(100%);
    background: rgb(151, 117, 250);
    background: linear-gradient(180deg, rgba(151, 117, 250, 1) 27%, rgba(255, 216, 168, 1) 100%);
    color: white;
    display: flex;
    align-items: center;
    padding-bottom: 10%;
}

#login-left {
    position: absolute;
    left: 0;
    width: 60%;
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
    margin: 24px;
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
                logo here
            </div>
        </div>

        <div id="login-right">
            <div class="w-100">
                <h1 class="text-theme text-center">Login</h1>
                <br>

                <div class="card col-md-8 bg-dark">
                    <div class="card-body">
                        <?php 
                        if ($showError) {
                            echo '<div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Wrong Email or Password.</strong>
                                  </div>';
                        } elseif ($login) {
                            echo '<div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>SUCCESS!</strong> You\'re logged in.
                                  </div>';
                            header('Location: index.php');
                            exit();
                        } elseif ($logoutSuccess) {
                            echo '<div id="logout-success" class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>SUCCESS!</strong> You\'ve been logged out.
                                  </div>';
                        }
                        ?>
                        <form id="login-form" method="post">
                            <div class="form-group">
                                <label for="username" class="control-label">Username</label>
                                <input type="text" id="username" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                            </div>
                            <center><button class="btn-lg btn-wave btn-theme">Login</button></center>
                        </form><br>
                        <p> Don't Have an Account? <a href="signup.php">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript to hide the messages after 4 seconds -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorMessage = document.getElementById('error-message');
            var successMessage = document.getElementById('success-message');
            var logoutSuccess = document.getElementById('logout-success');

            setTimeout(function() {
                if (errorMessage) {
                    errorMessage.style.display = 'none';
                }
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
                if (logoutSuccess) {
                    logoutSuccess.style.display = 'none';
                }
            }, 2000);
        });
    </script>
</body>
</html>
