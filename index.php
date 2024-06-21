<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');
?>

<style>
header.masthead {
    background: url(admin/assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>);
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 100vh
}

#viewer_modal .btn-close {
    position: absolute;
    z-index: 999999;
    /*right: -4.5em;*/
    background: unset;
    color: white;
    border: unset;
    font-size: 27px;
    top: 0;
}

#viewer_modal .modal-dialog {
    width: 80%;
    max-width: unset;
    height: calc(90%);
    max-height: unset;
}

#viewer_modal .modal-content {
    background: black;
    border: unset;
    height: calc(100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

#viewer_modal img,
#viewer_modal video {
    max-height: calc(100%);
    max-width: calc(100%);
}

footer {
    background: #000000e6 !important;
}
</style>

<body id="page-top">
    <!-- Navigation-->
    <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="./"><img
                    src=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <h3><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></h3>
                    </li>
                    <li class="nav-item">
                        <h3><a class="nav-link js-scroll-trigger" href="#">Venues</a></h3>
                    </li>
                    <li class="nav-item">
                        <h3><a class="nav-link js-scroll-trigger" href="index.php?page=events">Events</a></h3>
                    </li>
                    <li class="nav-item">
                        <h3><a class="nav-link js-scroll-trigger" href="#">About</a></h3>
                    </li>
                    <li class="nav-item">
                        <h3><a class="nav-link js-scroll-trigger" href="#">Contact</a></h3>
                    </li>
                    <?php 
                      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                        echo '<div class="float-right">
                        <div class=" dropdown mr-4" style="left: 2em;">
                            <a href="#" class="text-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">'; echo $_SESSION['name'].
                    '</a>
                    <div class="dropdown-menu" style="left: -1em;">
                        <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i>
                            Logout</a>
                    </div>
            </div>
        </div>';
        }
        else{
        echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">Login</a></li>';
        echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="signup.php">Sign Up</a></li>';
        }
        ?>

                </ul>
            </div>
        </div>
    </nav>

    <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>


    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                </div>
                <div class="modal-body">
                    <div id="delete_content"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id='confirm' onclick="">Continue</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-themec" id='submit'
                        onclick="$('#uni_modal form').submit()">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uni_modal_right" role='dialog'>
        <div class="modal-dialog modal-full-height  modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="fa fa-arrow-righ t"></span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="viewer_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
                <img src="" alt="">
            </div>
        </div>
    </div>
    <div id="preloader"></div>


    <section class="bg-navy py-3 mt-1" id="contact">
        <div class="container">
            <h1 class="text-center my-3">PROG8060#WT1</h1>

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="mt-5">
                        <p> 108 University Ave <br> Waterloo N2J 2W2  <br> Ontario.</p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="mt-5">
                        <p> <a class=""
                                href="mailto:<?php echo $_SESSION['system']['email'] ?>"><?php echo $_SESSION['system']['email'] ?></a><br>
                            Service: <?php echo $_SESSION['system']['contact'] ?></p>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <div class="mt-5">
                        <p>Monday - Sunday
                            <br> 8:00 AM - 6:00 PM
                             
                        </p>
                    </div>
                </div>
                <hr>
            </div>

            <div class="text-center mt-4">
                <a href="#" class="text-decoration-none text-white mx-3">
                    <i class="bi bi-facebook h5"></i>
                </a>
                <a href="#" class="text-decoration-none text-white mx-3">
                    <i class="bi bi-twitter h5"></i>
                </a>
                <a href="#" class="text-decoration-none text-white mx-3">
                    <i class="bi bi-instagram h5"></i>
                </a>
            </div>
        </div>
    </section>










    <?php include('footer.php') ?>
</body>

<?php $conn->close() ?>

</html>