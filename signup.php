
<!DOCTYPE html>
<html lang="en">


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
            <!--<div class="logo">
               <img src="assets/img/ee-logo-large.png">
            </div>--!>
        </div>

        <div id="login-right">
            <div class="w-100">
                <h1 class="text-theme text-center">Sign Up</h1>
                <br>

                <div class="card col-md-8 bg-dark">
                    <div class="card-body">
                       
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
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cpassword" class="control-label">Confirm Password</label>
                                <input type="password" id="cpassword" name="cpassword" class="form-control">
                            </div>
                            <center><button class="btn-lg btn-wave btn-theme">Login</button></center>
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