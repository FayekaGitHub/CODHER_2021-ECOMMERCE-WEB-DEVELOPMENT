<?php
session_start();
include('db.php');
$sql = "SELECT * FROM products WHERE category = 3";
$result = mysqli_query($con, $sql);
$details = mysqli_fetch_all($result, MYSQLI_ASSOC);
$custname = $_SESSION['cust_name'];
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
<script>
$(document).ready(function(){
  $(".addcart").on("submit", function(event){
      event.preventDefault();

      var formValues= $(this).serialize();
      console.log(formValues);

      $.post("addcart.php", formValues, function(data){
          // Display the returned data in browser
          $("#result").html(data);
      });
  });
  $(".chatbox").on("submit", function(event){
      event.preventDefault();

      var formValues= $(this).serialize();
      console.log(formValues);

      $.post("chat.php", formValues, function(data){
          // Display the returned data in browser
          $("#result2").html(data);
      });
  });
});

</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#"><img src= "imgs/logo.jpeg" alt="logo"style="width:80px;height:50px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
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
        <a class="nav-link" href="cart.php">Cart<i class="fas fa-shopping-cart"></i><span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="../index.php">Log out <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="new">
<b><div id="result" style="margin-left: 35em; color: green"></div></b>
<div class="row">
<?php foreach($details as $detail){
      $_SESSION['org_name']= $detail['org_name'];
      $orgname = $_SESSION['org_name'];
      $sql2= "SELECT * FROM chat WHERE cust_name='$custname' AND org_name='$orgname'";
      $result2 = mysqli_query($con, $sql2);
      $details2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
      //echo $_SESSION['org_name'];
  ?>
  <div class="column col-lg-4 col-sm-12 col-md-6">
  <form class="addcart" action="addcart.php" method="post">
    <div class="c">
    <img src="../imgs/<?php echo $detail['image'];?>" alt="image" class="image">
     <div class="overlay"><div class="text1"><p><b>Product name : <?php echo $detail['prod_name'];?></b></p>
     <p><b>Price : Rs.<?php echo $detail['price'];?></b></p>
     <p><b>Number of items:<input style="margin-left:20px; text-align:center" type="number" min="1" max="100" name="noi" value="1"></b></p>
     <p><b>Seller name : <?php echo $detail['org_name'];?></b></p>
     <p><b>Follow us on Instagram : <?php echo $detail['instagram'];?></b></p>
     <p><b><?php echo $detail['description'];?> </b></p>
     <input type="hidden" name="prod_name" value="<?php echo $detail['prod_name'];?>">
     <input type="hidden" name="prod_price" value="<?php echo $detail['price'];?>">
     <input type="hidden" name="org_name" value="<?php echo $detail['org_name'];?>">
     <input type="hidden" name="cust_name" value="<?php echo $_SESSION['cust_name']; ?>">
     <input type="hidden" name="cust_email" value="<?php echo $_SESSION['email'];?>">
     <input type="submit" name="submit" value="+ADD" class="btn btn-primary add button1">
     <button style="padding: 0.4em" type="button" class="btn btn-primary add button1" data-toggle="modal" data-target="#chat<?php echo $detail['prod_id'];?>">CHAT</button>
   </form>
     </div>
     </div>
    </div>
  </div>
  <div class="modal fade" id="chat<?php echo $detail['prod_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $_SESSION['org_name'];?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <?php
            foreach ($details2 as $detail2) {
           ?>
           <b><?php echo $detail2['sender'];?></b>
           <div><?php echo $detail2['times'];?></div>
           <div><?php echo $detail2['comment'];?></div>
         <?php } ?>

          <form class="chatbox" action="chat.php" method="post">
            <input type="hidden" name="org_name" value="<?php echo $_SESSION['org_name'];?>">
            <textarea name="msg" rows="3" cols="55"></textarea>
            <input type="submit" class="btn btn-primary" value="SEND">
            </form>
        </div>
        <div class="modal-footer">

          <div id="result2"></div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>
</div>
<?php include('footer.php') ?>
</body>
</html>
