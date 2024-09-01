<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include('db.php');
  $name = $con->real_escape_string($_POST['name']);
  $orgname = $con->real_escape_string($_SESSION['name']);
  $price = $con->real_escape_string($_POST['price']);
  $description = $con->real_escape_string($_POST['description']);
  $category = $con->real_escape_string($_POST['category']);
  $file_name = $_FILES['image']['name'];
  $file_tmp = $_FILES['image']['tmp_name'];
  if(move_uploaded_file($file_tmp,"../imgs/".$file_name))
  {
    //echo "uploaded image";
  }
  $instagram = $con->real_escape_string($_POST['instagram']);
  $name = stripcslashes($name);
  $orgname = stripcslashes($orgname);
  $price = stripcslashes($price);
  $description = stripcslashes($description);
  $category = stripcslashes($category);
  $instagram = stripcslashes($instagram);

  $sql = "INSERT INTO products (prod_name, org_name, price, description, category, image, instagram) VALUES ('$name', '$orgname', '$price', '$description', '$category', '$file_name', '$instagram')";
  if($con->query($sql))
  {
    //echo "New user inserted";
    echo "<script>alert('Posted');</script>";
    echo "<script>window.location.href='org_posts.php'</script>";
  }
  else{
    echo "Error: " . $sql . "<br>" . $con->error;
  }
}
?>
