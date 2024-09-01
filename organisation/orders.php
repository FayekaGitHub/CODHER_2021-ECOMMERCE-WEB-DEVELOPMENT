<?php
session_start();
include('db.php');
$org_name = $_SESSION['name'];
$sql = "SELECT * FROM cart WHERE org_name = '$org_name' AND buy=1";
$result = mysqli_query($con, $sql);
$details = mysqli_fetch_all($result, MYSQLI_ASSOC);
$i =1;
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
  padding: 0.3em;
  text-align: center;
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
  background-color:brown;
  color: black;
  border: 1px solid black;
  border-radius:4%;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
.t
{
    width:70%;
    margin-top:3em;
    margin-left:15%;
    align:center;
}
.b{
    text-align:center;
}
</style>
<script>
$(document).ready(function(){
  $("#done").on("submit", function(event){
      event.preventDefault();

      var formValues= $(this).serialize();
      console.log(formValues);

      $.post("delete.php", formValues, function(data){
          // Display the returned data in browser
          $("#result1").html(data);
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
        <a class="nav-link" href="org_posts.php">Posts<span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="chatpage.php">Chat<span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="../index.php">Log out <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<div style="text-align:center;font-size:30px;margin:10px;">YOUR ORDERS...</div>
<table class="t">
  <tr>
    <th>S.NO</th>
    <th>CUSTOMER NAME</th>
    <th>PRODUCT NAME</th>
    <th>QUANTITY</th>
    <th>PRICE</th>
    <th>Customer Email</th>
    <th>STATUS</th>
  </tr>
  <?php foreach ($details as $detail) { ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $detail['cust_name']; ?></td>
    <td><?php echo $detail['prod_name']; ?></td>
    <td><?php echo $detail['quantity']; ?></td>
    <td><?php echo $detail['price']; ?></td>
    <td><?php echo $detail['cust_email']; ?></td>
    <?php
    $i = $i +1;
    ?>
    <form action="delete.php" method="post" id="done">
      <input type="hidden" name="cart_id" value="<?php echo $detail['cart_id']; ?>">
      <td><button type="submit" class="button button1">COMPLETE</button></td>
      <div id="result1"></div>
    </form>
  </tr>
<?php } ?>
</table>
</body>
</html>
