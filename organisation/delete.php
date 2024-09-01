<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include('db.php');
  if($_SESSION['login']==0)
  {
    $cart_id = $con->real_escape_string($_POST['cart_id']);
    $sql = "DELETE FROM cart WHERE cart_id='$cart_id' AND buy=0";
    if(mysqli_query($con, $sql))
    {
      echo "<script>window.location.href='cart.php'</script>";
    }
  }
  elseif ($_SESSION['login']==1)
  {
    $cart_id = $con->real_escape_string($_POST['cart_id']);
    $sql = "DELETE FROM cart WHERE cart_id='$cart_id' AND buy=1";
    if(mysqli_query($con, $sql))
    {
      echo "<script>window.location.href='orders.php'</script>";
    }
  }
}
?>
