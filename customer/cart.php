<?php
session_start();
include('db.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM cart WHERE cust_email = '$email' AND buy=0";
$result = mysqli_query($con, $sql);
$details = mysqli_fetch_all($result, MYSQLI_ASSOC);
$i =1;
$total = 0;

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<style>
table, th, td {
  border: 3px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color:grey;
  font-size:18px;

}

.button2:hover {
  color: white;
  font-size:22px;
}
.button2 {
  background-color:green;
  font-size:18px;
  padding:10px;
  border-radius:2px solid black;

}
.button1:hover {
  color: white;
  background-color:brown;
  font-size:18px;
}
.t
{
    width:70%;
    margin-top:3%;
    margin-left:15%;
}
.b{
    text-align:center;
}
</style>
<script>
$(document).ready(function(){
  $("#delete").on("submit", function(event){
      event.preventDefault();

      var formValues= $(this).serialize();
      console.log(formValues);

      $.post("delete.php", formValues, function(data){
          // Display the returned data in browser
          $("#result1").html(data);
      });
  });
  $("#buy").on("submit", function(event){
      event.preventDefault();

      var formValues= $(this).serialize();
      console.log(formValues);

      $.post("buy.php", formValues, function(data){
          // Display the returned data in browser
          $("#result2").html(data);
      });
  });
});
</script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src= "../imgs/logo.png" alt="logo"style="width:80px;height:50px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">

        <li>
          <a class="nav-link" href="interests.php">Interests <span class="sr-only">(current)</span></a>
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
          <a class="nav-link active" href="cart.php">Cart<i class="fas fa-shopping-cart active"></i><span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="../index.php">Log out <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>
<div style="text-align:center;font-size:30px;margin:10px;">HELLO <?php echo $_SESSION['cust_name']; ?>, HERE IS YOUR CART..</div>
<table class="t">
  <tr>
    <th>S.NO</th>
    <th>PRODUCT NAME</th>
    <th>QUANTITY</th>
    <th>PRICE</th>
    <th>FINALISE</th>
  </tr>
  <?php foreach ($details as $detail) { ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $detail['prod_name']; ?></td>
    <th><?php echo $detail['quantity']; ?></th>
    <td><?php echo $detail['price']; ?></td>
    <?php $total = $total + $detail['price'];
    $i = $i +1;
    ?>
    <form action="delete.php" method="post" id="delete">
      <input type="hidden" name="cart_id" value="<?php echo $detail['cart_id']; ?>">
      <td><button type="submit" class="button1">DELETE</button></td>
      <div id="result1"></div>
    </form>
  </tr>
<?php } ?>

</table>
<h4><div class="b">Total: Rs.<?php echo $total; ?> </div></h4>
<form action="buy.php" method="post" id="buy">
  <input type="hidden" name="cust_email" value="<?php $_SESSION['email']; ?>">
  <div class="b"><button type="submit" class="button2">BUY</button></div>
  <div id="result2"></div>
</form>
<br>
</body>
</html>
