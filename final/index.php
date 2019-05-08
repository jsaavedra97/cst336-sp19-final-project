<?php

    //echo htmlentities($_GET[/lol/champions?filter[name]=Brand,Twitch&filter[armor]=21&token=401JNf8sytFd4p0cwE0lsLw3CsfW8xfWvG85vm8OdRKbPnLzVGk]);
?>


<html>
    <head>
        <title> </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
 
        </style>
        
        
        <script>
            $(document).ready(function() {
                $.ajax({
                type: "GET",
                url: "getCurl.php",
                dataType: "json",
                success: function(data, status) {
                    //console.log(data);
                    data.forEach(function(key){
                        //console.log(key);
                        if(!key.opponents[0] && !key.opponents[1]){
                            console.log("if again");
                        } else if (!key.opponents[0]){
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' src='img/tbd.jpeg' width='100px' height='100px'/><h2>TBD</h2></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' src='"+ key.opponents[1].opponent.image_url +"' width='100px' height='100px'/><h2>" + key.opponents[1].opponent.name + "</h2></div>");
                            $("#div").append("</div>")
                        } else if (!key.opponents[1]){
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' src='"+ key.opponents[0].opponent.image_url +"' width='100px' height='100px'/><h2>" + key.opponents[0].opponent.name + "</h2></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' src='img/tbd.jpeg' width='100px' height='100px'/><h2>TBD</h2></div>");
                            $("#div").append("</div>")
                        } else {
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' src='"+ key.opponents[0].opponent.image_url +"' width='100px' height='100px'/><h2>" + key.opponents[0].opponent.name + "</h2></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' src='"+ key.opponents[1].opponent.image_url +"' width='100px' height='100px'/><h2>" + key.opponents[1].opponent.name + "</h2></div>");
                            $("#div").append("</div>")
                        }
                        
                    });
                }
                });
               
               $("#loginButton").on('click', function(e) {
                    $.ajax({
                        type: "post",
                        url: "login.php",
                        dataType: "json",
                        data: {
                            "email_address": $("input[name='email_address']").val(),
                            "password": $("input[name='password']").val(),
                        },
                        success: function(data, status) {
                            console.log(data);
                            if (data.isAuthenticated) {
                                window.location = "dashboard.php";
                                console.log("in success");
                            } else {
                                $("#message").html("Bad email or password");
                                $("#message").removeClass("open-hidden");
                                console.log("in bad");
                            }
                        },
                        complete: function(data, status) { //optional, used for debugging purposes
                            console.log(complete);
                        }
                    });
                });
               
              });
                
                 
                
        </script>
        
    </head>
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
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>
            <!--<form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>-->
          </div>
        </nav>

      <div >
        <h1>Bootstrap starter template</h1>
        <!--<p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>-->
      </div>
        
        <div class="bgimg-1">
        <div class="text-center">
            <form class="form-signin" style="background-color: #000;">
                <h1>E-Bet</h1>
                <img class="mb-4" src="img/tbd.jpeg" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal" style="color:rgb(256,256,256);">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email_address" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <!--<label for="inputPasswordCheck" class="sr-only">Re-Enter Password</label>
                <input type="password" id="inputPasswordCheck" class="form-control" placeholder="Re-Enter Password" required>-->
                    <!--<div>
                        <a href="/signup.php">Sign-Up</a>
                    </div>-->
                    <div class="checkbox mb-3">
                        <label style="color:rgb(256,256,256);">
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                <button id="loginButton" type="button" class="btn btn-lg btn-primary btn-block">Sign in</button>
                <p id="message" class="mt-5 mb-3 text-muted" role="alert"></p>
                <p class="mt-5 mb-3 text-muted" style="color:rgb(256,256,256);">&copy; 2018-2019</p>
            </form>
        </div>
        </div>
        <!--<div id="div">
            
        </div>-->
        
        
    </body>
</html>
