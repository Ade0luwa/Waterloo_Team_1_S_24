<<<<<<< HEAD
<<<<<<< Updated upstream
<?php 
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');  
    exit;
?>
=======
=======
>>>>>>> 2b8c92e9d2cd7c5e8e178b8ca5bcde885ac0c468
<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['logout_success'] = true;
header('Location: login.php');
exit;
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
?>
>>>>>>> 2b8c92e9d2cd7c5e8e178b8ca5bcde885ac0c468
