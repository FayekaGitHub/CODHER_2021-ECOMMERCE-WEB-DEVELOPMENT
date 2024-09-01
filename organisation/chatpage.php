<?php session_start();
  include('db.php');
  $sql = "SELECT DISTINCT cust_name FROM chat";
  $result = mysqli_query($con, $sql);
  $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $i=1;
  //print_r($customers);
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
  background-color:lightblue;
  color: black;
  border: 2px solid black;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
.t
{
    width:60%;
    margin-top:3%;
    margin-left:20%;
}
.b{
    text-align:center;
}
</style>
<script>
$("form").on("submit", function(event){
    event.preventDefault();

    var formValues= $(this).serialize();
    console.log(formValues);

    $.post("../customer/chat.php", formValues, function(data){
        // Display the returned data in browser
        $("#result2").html(data);
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
        <a class="nav-link" href="orders.php">Orders<span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="../index.php">Log out <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<div style="text-align:center;font-size:30px;margin:10px;">YOU HAVE MESSAGES...</div>
<table class="t">

  <tr>
    <th>S.no</th>
    <th>Customer name</th>
    <th>MESSAGES</th>
  </tr>
  <?php foreach ($customers as $customer) {
    $orgname = $_SESSION['name'];
    $custname = $customer['cust_name'];
    $sql2 = "SELECT * FROM chat WHERE cust_name='$custname' AND org_name='$orgname'";
    $result2 = mysqli_query($con, $sql2);
    $details2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    //print_r($details2);
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $customer['cust_name'];?></td>
    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chat<?php echo $i;?>">
  view message
</button></td>
  </tr>
<!-- Modal -->
<div class="modal fade" id="chat<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $customer['cust_name'];?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          foreach ($details2 as $detail2) {
         ?>
         <div><b><?php echo $detail2['sender'];?></b></div>
         <div><?php echo $detail2['times'];?></div>
         <div><?php echo $detail2['comment'];?></div>
       <?php } ?>
        <form class="chatbox" action="chat.php" method="post">
          <input type="hidden" name="cust_name" value="<?php echo $customer['cust_name'];?>">
          <textarea name="msg" rows="3" cols="55"></textarea>
          <input type="submit" class="btn btn-primary" value="SEND">
        </form>
        <div id="result2"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
$i++;
} ?>
</table>
</body>

</html>
