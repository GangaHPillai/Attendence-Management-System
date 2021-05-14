<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['uname']);
unset($_SESSION['previlege']);
session_destroy();
header('Location:index.php');
?>
