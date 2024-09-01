<?php
session_start();
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include('db.php');
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    $sql1= "SELECT * FROM customer WHERE email='$email' AND password='$password'";
    $result= $con->query($sql1);
    $details = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $count = $result->num_rows;
    if($count == 1){
      $_SESSION['email'] = $email;
      $_SESSION['login'] = 0;
      foreach ($details as $detail) {
        $_SESSION['cust_name'] = $detail['cust_name'];
      }
      echo "<script>window.location.href='access.php'</script>";
    }
    else {
      echo "Invalid username or password";
    }
  }
?>
