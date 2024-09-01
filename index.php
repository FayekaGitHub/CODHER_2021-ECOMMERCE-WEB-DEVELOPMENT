<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HELP A HAND | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" href = "styleindex.css">
</head>
<body class = "bg-dark">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src= "imgs/logo.jpeg" alt="logo"style="width:80px;height:50px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="index.php#about">About <span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="customer/customer.php">Customer login<span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="organisation/organisation.php">Organisation login<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<body>
<div id="demo" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imgs/bg.jpg" alt="Los Angeles" width="100px" height="100px">
      <div class="carousel-caption">
        <h1 style="color:white;margin:50px; font-size:140px">SHOP WITH HELP A HAND!</h1>
      </div>
    </div>
    </div> 
  </div>

<div id="about" class = "grid-container">
    <div class = "grid-child">
        <img src = "imgs/about.jpeg" style = "height:400px;width:600px">
</div>
<div class = "grid-child">
    <h1 id="heading">About</h1>
    <p>
    This is a E-commerce and E markering website which mainly focuses on small scale businesses.
    Here people can buy and sell their products.This creates a great opportunity for the budding businesses.
 </p>
     </div>
</div>

<div id="footer">
<?php
  include('customer/footer.php')
?>
</div>

</body>
</html>
