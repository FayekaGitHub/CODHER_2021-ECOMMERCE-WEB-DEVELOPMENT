<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}
body
{
  background-color:white;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: brown;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color:green;
}

.container {
    width:60%;
    border: solid black 5px;
  border-radius: 5px;
  background-color: lightgrey;
  padding: 20px;
  margin-left:20%;
  margin-top:5%;
  align:center;

}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 7px;
  margin-left:10px
}

.col-75 {
  float: left;
  width: 60%;
  margin-top: 15px;
  margin-bottom:8px;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

</style>
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
          <a class="nav-link" href="orders.php">Orders<span class="sr-only">(current)</span></a>
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
<div class="container">
  <form action="products.php" id="products" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="pname">PRODUCT NAME</label>
      </div>
      <div class="col-75">
        <input type="text" id="prd" name="name" >
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="pri">PRICE</label>
      </div>
      <div class="col-75">
        <input type="text" id="pr" name="price" >
      </div>
      </div>
        <div class="row">
      <div class="col-25">
        <label for="pdesp">PRODUCT DESCRIPTION</label>
      </div>
      <div class="col-75">
        <textarea id="desc" name="description"  style="height:200px"></textarea>
      </div>
    </div>
    <div>
    <div class="row">
      <div class="col-25">
      <p>PRODUCT CATEGORY </p>
      </div>
      <div class="col-75">
      <input type="radio" id="access" name="category" value="1">
    <label for="acc">ACCESSORIES</label><br>
    <input type="radio" id="han" name="category" value="2">
    <label for="ha">HANDICRAFTS</label><br>
    <input type="radio" id="clo" name="category" value="3">
    <label for="cl">CLOTHING</label><br>
    <input type="radio" id="sec" name="category" value="4">
    <label for="se">SECOND HAND BOOKS</label><br><br>
    </div>
    </div>
      <div class="row">
      <div class="col-25">
        <label>CHOOSE IMAGE</label>
      </div>
      <div class="col-75">
        <input type="file" name="image" id="image">
      </div>
      </div>
    <div class="row">
      <div class="col-25">
        <label for="in">INSTAGRAM LINK</label>
      </div>
      <div class="col-75">
        <input type="text" id="link" name="instagram" >
      </div>
    </div>
    <div class="row">
    <div class="col-75">
     <div style="text-align:center" ><input type="submit" value="submit" name="submit">
    </div>
    </div>
      </div>
</form>
</div>
</body>
</html>
