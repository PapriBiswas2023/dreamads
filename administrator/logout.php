<?php
session_start();
include('includes/function.php');
unset($_SESSION['sid']);
redirect('index.php');
?>