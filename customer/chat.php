<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include('db.php');
  $msg =  $con->real_escape_string($_POST['msg']);
  $orgname = $con->real_escape_string($_POST['org_name']);
  $custname = $con->real_escape_string($_SESSION['cust_name']);
  $msg = stripcslashes($msg);
  $orgname = stripcslashes($orgname);
  $custname = stripcslashes($custname);
  $sql = "INSERT INTO chat (cust_name, org_name, comment,sender,receiver) VALUES('$custname', '$orgname', '$msg', '$custname', '$orgname')";
  if(mysqli_query($con, $sql))
  {
    echo "<script>
    alert('MESSAGE SENT');
    window.location.href = window.location.href;
  </script>";
  }
  else{
    echo "Error: " . $sql . "<br>" . $con->error;
  }
}
?>
