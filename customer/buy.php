<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include('db.php');
$email = $_SESSION['email'];
$sql = "UPDATE cart SET buy=1 WHERE cust_email = '$email'";
if(mysqli_query($con, $sql))
{
  echo "<script>window.location.href='cart.php'</script>";
}
}
?>
