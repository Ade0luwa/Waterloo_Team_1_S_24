<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['logout_success'] = true;
header('Location: login.php');
exit;