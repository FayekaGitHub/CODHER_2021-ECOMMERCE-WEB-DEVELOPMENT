<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include('db.php');
  $email = $con->real_escape_string($_POST['email']);
  $name = $con->real_escape_string($_POST['name']);
  $password = $con->real_escape_string($_POST['password']);
  $choice1 = $con->real_escape_string($_POST['choice1']);
  $choice2 = $con->real_escape_string($_POST['choice2']);
  $choice3 = $con->real_escape_string($_POST['choice3']);
  $choice4 = $con->real_escape_string($_POST['choice4']);
  $_SESSION['email']=$email;
  $_SESSION['cust_name'] = $name;
  $_SESSION['login'] = 0;
  $email = stripcslashes($email);
  $name = stripcslashes($name);
  $password = stripcslashes($password);
  $choice1 = stripcslashes($choice1);
  $choice2 = stripcslashes($choice2);
  $choice3 = stripcslashes($choice3);
  $choice4 = stripcslashes($choice4);
  $sql = "INSERT INTO customer (email, cust_name, password, choice1, choice2, choice3, choice4) VALUES ('$email', '$name', '$password', '$choice1', '$choice2', '$choice3', '$choice4')";
  if(mysqli_query($con, $sql))
  {
    echo "New user inserted";
    echo "<script>window.location.href='access.php'</script>";
  }
  else{
    echo "Error: " . $sql . "<br>" . $con->error;
  }
}
?>
