<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="admincss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $(".login-form").hide();
        $(".login").css("background", "none");

        $(".login").click(function(){
        $(".signup-form").hide();
        $(".login-form").show();
        $(".signup").css("background", "none");
        $(".login").css("background", "#fff");
        });

        $(".signup").click(function(){
        $(".signup-form").show();
        $(".login-form").hide();
        $(".login").css("background", "none");
        $(".signup").css("background", "#fff");
        });

        $(".btn").click(function(){
        $(".input").val("");
      });
        $("#signup").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.post("custdetails.php", formValues, function(data){
                // Display the returned data in browser
                $("#result1").html(data);
            });
        });
        $("#login").on("submit", function(event){
            event.preventDefault();

            var formValues= $(this).serialize();
            console.log(formValues);

            $.post("custcheck.php", formValues, function(data){
                // Display the returned data in browser
                $("#result2").html(data);
            });
        });
      });
    </script>
    <title></title>
    <style media="screen">
      *{
        margin: 0;
        padding: 0;
        }

        body{
        background: #e9eaea;
        font-family: roboto;
        user-select: none;
        }


        .container{
        width: 600px;
        margin: 30px auto;
        }

        .signup,
        .login{
        width: 50%;
        background: #fff;
        float: left;
        height: 60px;
        line-height: 60px;
        text-align: center;
        cursor: pointer;
        text-transform: uppercase;
        }

        .signup-form{
        background: #fff;
        padding: 40px;
        clear: both;
        width: 100%;
        box-sizing: border-box;
        height: 600px;
        }
        .login-form{
          background: #fff;
          padding: 40px;
          clear: both;
          width: 100%;
          box-sizing: border-box;
          height: 300px;
        }

        .btn{
        width: 100%;
        background: #3b3d39;
        height: 80px;
        text-align: center;
        line-height: 60px;
        text-transform: uppercase;
        color: #fff;
        font-weight: bold;
        letter-spacing: 1px;
        cursor: pointer;
        /*margin-bottom: 30px;*/
        padding: 10px;
        }

        span a{
        text-decoration: none;
        color: #000;
        }

        ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
        color: #3e3e40;
        font-family: roboto;
        }
        ::-moz-placeholder { /* Firefox 19+ */
        color: #3e3e40;
        font-family: roboto;
        }
        :-ms-input-placeholder { /* IE 10+ */
        color: #3e3e40;
        font-family: roboto;
        }
        :-moz-placeholder { /* Firefox 18- */
        color: #3e3e40;
        font-family: roboto;
        }
        .null{
          /*height: 100px;*/
          height: 60px;
          padding: 10px;
        }
    </style>
  </head>
  <body id="mentorlogin">
    <div class="null">
      <h1 style="text-align: center; margin-top: 10px">Customer's Signup/Login</h1>
    </div>
    <div class="wrapper">
    <div class="container">

      <div class="signup">Sign Up</div>
      <div class="login">Log In</div>
      <form id="signup" action="custdetails.php" method="post" class="signup-form form-group">
       <!--<div class="signup-form">-->
          <input type="text" placeholder="Email"  class="form-control" name="email" required><br />
          <input type="text" placeholder="Name" class="form-control" name="name" required><br />
          <input type="password" placeholder="Password" class="form-control" name="password" required><br/>
          <h4>Interests</h4>
          <input type="hidden" name="domain" value="0">
          <input type="checkbox" name="choice1" value="1" class="">
          <label for="DSA">ACCESSORIES</label><br>
          <input type="hidden" name="choice2" value="0">
          <input type="checkbox" name="choice2" value="2" class="">
          <label for="c">HANDICRAFTS</label><br>
          <input type="hidden" name="choice3" value="0">
          <input type="checkbox" name="choice3" value="3" class="">
          <label for="dbms">CLOTHING</label><br>
          <input type="hidden" name="choice4" value="0">
          <input type="checkbox" name="choice4" value="4" class="">
          <label for="os">SECOND HAND BOOKS</label><br>
          <br>
          <button type="submit" class="btn">Submit</button>
          <div id="result1"></div>
     </form>
     <form id="login" action="custcheck.php" method="post" class="login-form form-group">
          <input type="text" placeholder="Email" name="email" class="form-control"><br />
          <input type="password" placeholder="Password" name="password" class="form-control"><br />
          <button type="submit" class="btn">Submit</button>
          <div id="result2" style="color:red;"></div>
     </form>
    </div>
  </div>
  </body>
</html>
