<?php

session_start();

$login = false;
$showError = false;
$logoutSuccess = false;

if (isset($_SESSION['logout_success'])) {
    $logoutSuccess = true;
    unset($_SESSION['logout_success']);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include './admin/db_connect.php';

    $pass = $_POST['password'];
    $email = $_POST['email'];

    $query = "SELECT * from `clients` where email = '$email'";
    $result = mysqli_query($conn, $query);

    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            $login = true;
            header('Location: index.php');
            exit();
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
                <img src="assets/img/ee-logo-large.png">
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
                        } elseif ($logoutSuccess) {
                            echo '<div id="logout-success" class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>SUCCESS!</strong> You\'ve been logged out.
                                  </div>';
                        }
                        ?>
                        <form id="login-form" method="post">
                            <div class="form-group">
                                <label for="email" class="control-label">Email Address</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                            </div>
                            <center><button type="submit" class="btn-lg btn-block btn-wave col-md-4 btn-theme">Login</button></center>
                        </form><br>
                        <p> Don't Have an Account? <a href="signup.php">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript to handle form submission and hide messages after 2 seconds -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login-form').submit(function(e) {
                e.preventDefault();
                $('#login-form button[type="submit"]').attr('disabled', true).html('Logging in...');
                
                if ($(this).find('.alert-danger').length > 0) {
                    $(this).find('.alert-danger').remove();
                }

                $.ajax({
                    url: 'admin/ajax.php?action=login',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(resp) {
                        if (resp == 1) {
                            location.href = 'index.php?page=home';
                        } else {
                            $('#login-form').prepend('<div id="error-message" class="alert alert-danger">Username or password is incorrect.</div>');
                            $('#login-form button[type="submit"]').removeAttr('disabled').html('Login');
                            
                            // Hide error message after 2 seconds
                            setTimeout(function() {
                                $('#error-message').fadeOut('slow');
                            }, 2000);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        $('#login-form button[type="submit"]').removeAttr('disabled').html('Login');
                    }
                });
            });

            // Hide messages after 2 seconds
            setTimeout(function() {
                $('#error-message').fadeOut('slow');
                $('#logout-success').fadeOut('slow');
            }, 2000);
        });
    </script>
</body>

</html>
