<?php
session_start();
include('../administrator/includes/function.php');
unset($_SESSION['mid']);
session_destroy();

redirect('../login.php');
?>