<?php
session_start();
include('db.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM customer WHERE email='$email'";
$result = mysqli_query($con, $sql);
$choices = mysqli_fetch_all($result, MYSQLI_ASSOC);
$i = 1;
foreach ($choices as $choice) {
  if($choice['choice1']==1)
  {
    $sql1= "SELECT * FROM products WHERE category = 1";
    $result1 = mysqli_query($con, $sql1);
    $details1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
  }
  else{
    $details1= array();
  }
  if($choice['choice2']==2)
  {
    $sql2= "SELECT * FROM products WHERE category = 2";
    $result2 = mysqli_query($con, $sql2);
    $details2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
  }
  else{
    $details2= array();
  }
  if($choice['choice3']==3)
  {
    $sql3= "SELECT * FROM products WHERE category = 3";
    $result3 = mysqli_query($con, $sql3);
    $details3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
  }
  else{
    $details3= array();
  }
  if($choice['choice4']==4)
  {
    $sql4= "SELECT * FROM products WHERE category = 4";
    $result4 = mysqli_query($con, $sql4);
    $details4 = mysqli_fetch_all($result4, MYSQLI_ASSOC);
  }
  else{
    $details4= array();
  }
}
//print_r($choices);
//echo $result;
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="old.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
.st{
    font-family:verdana;
    text-align:center;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src= "customer/imgs/logo(1).png" alt="logo"style="width:80px;height:50px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <li>
        <a class="nav-link active" href="#">Interests <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item bg-dark" href="access.php" style="color: white">ACCESSORIES</a>
          <div class="dropdown-divider bg-light"></div>
          <a class="dropdown-item bg-dark" href="han.php" style="color: white">HANDICRAFTS</a>
          <div class="dropdown-divider bg-light"></div>
          <a class="dropdown-item bg-dark" href="clo.php" style="color: white">CLOTHING</a>
          <div class="dropdown-divider bg-light"></div>
          <a class="dropdown-item bg-dark" href="sec.php" style="color: white">SECOND HAND BOOKS</a>
        </div>
      </li>
      <li>
        <a class="nav-link" href="cart.php">Cart<i class="fas fa-shopping-cart"></i><span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="../index.php">Log out <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<h1 class="st" style="color:black;">YOUR INTERESTS...</h1>
<div class="new">
<div class="row">
  <?php foreach ($details1 as $detail1) {
      if($i == 4)
      {
        break;
      }
      else{
    ?>
  <div class="column col-lg-4 col-sm-12 col-md-6">
    <div class="c">
    <img src="../imgs/<?php echo $detail1['image'];?>" alt="image" class="image">
     <div class="overlay"><div class="text1"><p><b>Product name : <?php echo $detail1['prod_name'];?></b></p>
     <p><b>Price : Rs.<?php echo $detail1['price'];?></b></p>
     <input type="hidden" name="prod_name" value="<?php echo $detail1['prod_name'];?>">
     <input type="hidden" name="prod_price" value="<?php echo $detail1['price'];?>">
     <input type="hidden" name="org_name" value="<?php echo $detail1['org_name'];?>">
     <input type="hidden" name="cust_name" value="<?php echo $_SESSION['cust_name']; ?>">
     <input type="hidden" name="cust_email" value="<?php echo $_SESSION['email'];?>">
     <p><b>Seller name : <?php echo $detail1['org_name'];?></b></p>
     <p><b>Follow us on instagram: <?php echo $detail1['instagram'];?></b></p>
     <p><b><?php echo $detail1['description'];?></b></p>
      </div>
     </div>
    </div>
  </div>
<?php }
$i =$i+1;
}
$i=1;
foreach ($details2 as $detail2){
  if($i == 4)
  {
    break;
  }
  else{
?>
<div class="column col-lg-4 col-sm-12 col-md-6">
  <div class="c">
  <img src="../imgs/<?php echo $detail2['image'];?>" alt="image" class="image">
   <div class="overlay"><div class="text1"><p><b>Product name : <?php echo $detail2['prod_name'];?></b></p>
   <p><b>Price : Rs.<?php echo $detail2['price'];?></b></p>
   <input type="hidden" name="prod_name" value="<?php echo $detail2['prod_name'];?>">
   <input type="hidden" name="prod_price" value="<?php echo $detail2['price'];?>">
   <input type="hidden" name="org_name" value="<?php echo $detail2['org_name'];?>">
   <input type="hidden" name="cust_name" value="<?php echo $_SESSION['cust_name']; ?>">
   <input type="hidden" name="cust_email" value="<?php echo $_SESSION['email'];?>">
   <p><b>Seller name : <?php echo $detail2['org_name'];?></b></p>
   <p><b>Follow us on :  <?php echo $detail2['instagram'];?></b></p>
   <p><b><?php echo $detail2['description'];?></b></p>
   </div>
   </div>
  </div>
</div>
<?php }
$i =$i+1;
}
$i=1;
  foreach ($details3 as $detail3){
    if($i == 4)
    {
      break;
    }
    else{
  ?>
  <div class="column col-lg-4 col-sm-12 col-md-6">
    <div class="c">
    <img src="../imgs/<?php echo $detail3['image'];?>" alt="image" class="image">
     <div class="overlay"><div class="text1"><p><b>Product name : <?php echo $detail3['prod_name'];?></b></p>
     <p><b>Price : Rs.<?php echo $detail3['price'];?></b></p>
     <input type="hidden" name="prod_name" value="<?php echo $detail3['prod_name'];?>">
     <input type="hidden" name="prod_price" value="<?php echo $detail3['price'];?>">
     <input type="hidden" name="org_name" value="<?php echo $detail3['org_name'];?>">
     <input type="hidden" name="cust_name" value="<?php echo $_SESSION['cust_name']; ?>">
     <input type="hidden" name="cust_email" value="<?php echo $_SESSION['email'];?>">
     <p><b>Seller name : <?php echo $detail3['org_name'];?></b></p>
     <p><b>Follow us on : <?php echo $detail3['instagram'];?></b></p>
     <p><b><?php echo $detail3['description'];?></b></p>
     </div>
     </div>
    </div>
  </div>
  <?php }
  $i =$i+1;
  }
  $i=1;
  foreach ($details4 as $detail4){
    if($i == 4)
    {
      break;
    }
    else{
  ?>
  <div class="column col-lg-4 col-sm-12 col-md-6">
    <div class="c">
    <img src="../imgs/<?php echo $detail4['image'];?>" alt="image" class="image">
     <div class="overlay"><div class="text1"><p><b>Product name : <?php echo $detail4['prod_name'];?></b></p>
     <p><b>Price : Rs.<?php echo $detail4['price'];?></b></p>
     <input type="hidden" name="prod_name" value="<?php echo $detail4['prod_name'];?>">
     <input type="hidden" name="prod_price" value="<?php echo $detail4['price'];?>">
     <input type="hidden" name="org_name" value="<?php echo $detail4['org_name'];?>">
     <input type="hidden" name="cust_name" value="<?php echo $_SESSION['cust_name']; ?>">
     <input type="hidden" name="cust_email" value="<?php echo $_SESSION['email'];?>">
     <p><b>Seller name : <?php echo $detail4['org_name'];?></b></p>
     <p><b>Follow us on :  <?php echo $detail4['instagram'];?></b></p>
     <p><b><?php echo $detail4['description'];?></b></p>
    </div>
     </div>
    </div>
  </div>
  <?php }
  $i =$i+1;
  }
?>
</div>
</div>

<?php include('footer.php') ?>
</body>
</html>
