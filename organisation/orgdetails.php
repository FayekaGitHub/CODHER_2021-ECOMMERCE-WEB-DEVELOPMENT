<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include('db.php');
  $email = $con->real_escape_string($_POST['email']);
  $name = $con->real_escape_string($_POST['name']);
  $password = $con->real_escape_string($_POST['password']);
  $months = $con->real_escape_string($_POST['months']);
  $instagram = $con->real_escape_string($_POST['instagram']);
  $turnover = $con->real_escape_string($_POST['turnover']);
  $description = $con->real_escape_string($_POST['description']);
  $_SESSION['name']=$name;
  $_SESSION['login'] = 1;
  $email = stripcslashes($email);
  $name = stripcslashes($name);
  $password = stripcslashes($password);
  $months = stripcslashes($months);
  $instagram = stripcslashes($instagram);
  $turnover = stripcslashes($turnover);
  $description = stripcslashes($description);
  $sql = "INSERT INTO organisation (email, org_name, password, months, instagram, turnover, description) VALUES ('$email', '$name', '$password', '$months', '$instagram', '$turnover', '$description')";
  if(mysqli_query($con, $sql))
  {
    echo "New user inserted";
    echo "<script>window.location.href='org_posts.php'</script>";
  }
  else{
    echo "Error: " . $sql . "<br>" . $con->error;
  }
}
?>
