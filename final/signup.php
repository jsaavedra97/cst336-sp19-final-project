<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
    
        <style>
            .bgimg-1, .bgimg-2, .bgimg-3 {
              position: relative;
              opacity: 0.65;
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            
            }
            .bgimg-1 {
              background-image: url("img/esports1.jpeg");
              height: 100%;
            }
 
            .text-center {
              align-items: center;
              display: flex;
              justify-content: center;
            }
            
            .sign-up-form{
               border-radius: 25px;
               background-color: #000;
               color: white;
               padding: 30px;
               width: 260px;
               height: 550px;
               text-align: center;
            }
        </style>
    
    </head>

    <body>
        <script>
          $(document).ready(function(){
            console.log("running");
            $(".sign-up-form").validate();
            
            $("#sign-up-button").on("click", function(e){
              console.log("hello");
              $.ajax({
                  type: "POST",
                  url: "./insertUser.php",
                  dataType: "text",
                  data: {
                      "email": $("input[name='email']").val(),
                      "password": $("input[name='password']").val(),
                  },
                  success: function(data, status) {
                     console.log(data.email);
                      console.log(data);
                      
                      // if (data.isAuthenticated) {
                      //     window.location = "matches.php";
                      //     console.log("Sign Up Success!!");
                      // } else {
                      //     $("#message").html("Invalid email address");
                      //     $("#message").removeClass("open-hidden");
                      //     console.log("Sign Up fail");
                      // }
                      console.log("executed");
                      
                  },
                  
                  complete: function(data, success){
                    console.log("finished");
                  }
                  
              });
              
            });
            
            function checkPassword(input) {
                if (input.value != document.getElementById('password').value) {
                    input.setCustomValidity('Password Must be Matching.');
                } else {
                    // input is valid -- reset the error message
                    input.setCustomValidity('');
                }
            }
            // $("#retyped-password")
          });
        </script>
      
        <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="#">E-Bet</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="matches.php">Matches</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
              </li>
            </ul>
            <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>-->
            <!--<form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>-->
          </div>
        </nav>
        
        <!-------------------------------------------------------------------------->
        <!-------------------------------------------------------------------------->

        <div class="bgimg-1">
          <div class="text-center">
            <form class="sign-up-form">
                <br />
                <h1>Sign Up!</h1>

                <div><label for="email">Email Address</label>
                <input type="text" name="" minlength="3"  id="email" required/>
                
                <label for="password">Password</label>
                <input type="text" name="password" minlength="8" id="password" required/>
                
                <label for="retyped-password">Retype Password</label>
                <!--<input type="text" name="retyped-password" minlength="8" id="retyped-password" oninput="checkPassword(this)" required/></div>-->

                <br />
                <div><input type="button" value="Sign Up" id="sign-up-button"/></div>
            </form>
          </div>
        </div>
    </body>
</html>