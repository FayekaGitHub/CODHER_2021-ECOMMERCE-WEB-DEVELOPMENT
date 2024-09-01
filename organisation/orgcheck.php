<?php
session_start();
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include('db.php');
    $name = $con->real_escape_string($_POST['name']);
    $password = $con->real_escape_string($_POST['password']);
    $sql1= "SELECT * FROM organisation WHERE org_name='$name' AND password='$password'";
    $result= mysqli_query($con, $sql1);
    $count = $result->num_rows;
    if($count == 1){
      $_SESSION["name"] = $name ;
      $_SESSION['login'] = 1;
      echo "<script>window.location.href='org_posts.php'</script>";

    }
    else {
      echo "Invalid username or password";
      //echo $count;
    }
  }
?>
