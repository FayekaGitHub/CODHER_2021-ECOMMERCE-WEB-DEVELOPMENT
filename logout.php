<?php
session_start();
if(isset($_SESSION['login'])){
    unset($_SESSION['email']);
    unset($_SESSION['name']);
    unset($_SESSION['cust_name']);
    unset($_SESSION['login']);
}
echo '<script>window.location.href="index.php";</script>';
?>
