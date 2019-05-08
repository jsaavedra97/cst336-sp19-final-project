<?php
  session_start();
  
    
?>

<html>
    <head>
        <title>Matches</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="bootstrap/bootstrap.css">
        
        <style>
          
          .bg-image {
              /* Full height */
              height: 50%; 
              
              /* Center and scale the image nicely */
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
            
            button:hover {
              opacity: 0.8;
            }
            
            /* Extra styles for the cancel button */
            .cancelbtn {
              width: auto;
              padding: 10px 18px;
              background-color: #f44336;
            }
            
            /* Center the image and position the close button */
            .imgcontainer {
              text-align: center;
              margin: 24px 0 12px 0;
              position: relative;
            }
            
            img.avatar {
              width: 40%;
              border-radius: 50%;
            }
            
            .container1 {
              padding: 16px;
            }
            
            span.psw {
              float: right;
              padding-top: 16px;
            }
            
            /* The Modal (background) */
            .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
              padding-top: 60px;
            }
            
            /* Modal Content/Box */
            .modal-content {
              background-color: #fefefe;
              margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
              border: 1px solid #888;
              width: 80%; /* Could be more or less, depending on screen size */
            }
            
            /* The Close Button (x) */
            .close {
              position: absolute;
              right: 25px;
              top: 0;
              color: #000;
              font-size: 35px;
              font-weight: bold;
            }
            
            .close:hover,
            .close:focus {
              color: red;
              cursor: pointer;
            }
            
            /* Add Zoom Animation */
            .animate {
              -webkit-animation: animatezoom 0.6s;
              animation: animatezoom 0.6s
            }
            
            @-webkit-keyframes animatezoom {
              from {-webkit-transform: scale(0)} 
              to {-webkit-transform: scale(1)}
            }
              
            @keyframes animatezoom {
              from {transform: scale(0)} 
              to {transform: scale(1)}
            }
            
            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
              span.psw {
                 display: block;
                 float: none;
              }
              .cancelbtn {
                 width: 100%;
              }
            }
                        
        </style>
        
        <script>
            $(document).ready(function() {
                $("#csgo_load").on("click", function() {
                $.ajax({
                type: "GET",
                url: "api/getCurl.php",
                dataType: "json",
                success: function(data, status) {
                    $("#div").html('');
                    console.log(data);
                    data.forEach(function(key){
                        console.log(key);
                        if(!key.opponents[0] && !key.opponents[1]){
                            console.log(key);
                        } else if (!key.opponents[0]){
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' id='tbd' src='img/tbd.jpeg' width='100px' height='100px'/><h4>TBD</h4></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2> ");
                            $("#" + key.id).append("<div><img class='img2' src='"+ key.opponents[1].opponent.image_url +"' width='100px' height='100px'/><h4>" + key.opponents[1].opponent.name + "</h4></div>");
                            $("#div").append("</div>");
                        } else if (!key.opponents[1]){
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' src='"+ key.opponents[0].opponent.image_url +"' width='100px' height='100px'/><h4>" + key.opponents[0].opponent.name + "</h4></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' id='tbd' src='img/tbd.jpeg' width='100px' height='100px'/><h4>TBD</h4></div>");
                            $("#div").append("</div>");
                        } else {
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' src='"+ key.opponents[0].opponent.image_url +"' width='100px' height='100px'/><h4>" + key.opponents[0].opponent.name + "</h4></div>");
                            $("#" + key.id).append("<a href='#' data-toggle='modal' data-target='#" + key.id + "Modal'><h2>  VERSUS  </h2></a> <div id='"+ key.id +"Modal' class='modal'><form class='modal-content animate'><div class='imgcontainer'><span onclick='document.getElementById('" + key.id + "Modal').style.display='none'' class='close' title='Close Modal'>&times;</span></div><div class='container'><label for='uname'><b>Username</b></label><input type='text' placeholder='Enter Username' name='uname' required><label for='psw'><b>Password</b></label><input type='password' placeholder='Enter Password' name='psw' required><button type='submit'>Login</button></div><div class='container1' style='background-color:#f1f1f1'><button type='button' onclick='document.getElementById('"+key.id+"Modal').style.display='none'' class='cancelbtn'>Cancel</button></div></form></div>");
                            $("#" + key.id).append("<div><img class='img2' src='"+ key.opponents[1].opponent.image_url +"' width='100px' height='100px'/><h4>" + key.opponents[1].opponent.name + "</h4></div>");
                            $("#div").append("</div>");
                             var modal = document.getElementById(key.id + "Modal");


                                window.onclick = function(event) {
                                    if (event.target == modal) {
                                        modal.style.display = "none";
                                    }
                                };
                            
                        }
                        
                    });
                }
                });
                });
                
                $("#lol_load").on("click",function() {
                $.ajax({
                type: "GET",
                url: "api/getCurlLOL.php",
                dataType: "json",
                success: function(data, status) {
                  $("#div").html('');
                    console.log(data);
                    data.forEach(function(key){
                        console.log(key);
                        if(!key.opponents[0] && !key.opponents[1]){
                            console.log(key);
                        } else if (!key.opponents[0]){
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' id='tbd' src='img/tbd.jpeg' width='100px' height='100px'/><h4>TBD</h4></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' src='"+ key.opponents[1].opponent.image_url +"' width='100px' height='100px'/><h4>" + key.opponents[1].opponent.name + "</h4></div>");
                            $("#div").append("</div>");
                        } else if (!key.opponents[1]){
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' src='"+ key.opponents[0].opponent.image_url +"' width='100px' height='100px'/><h4>" + key.opponents[0].opponent.name + "</h4></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' id='tbd' src='img/tbd.jpeg' width='100px' height='100px'/><h4>TBD</h4></div>");
                            $("#div").append("</div>");
                        } else {
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' src='"+ key.opponents[0].opponent.image_url +"' width='100px' height='100px'/><h4>" + key.opponents[0].opponent.name + "</h4></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' src='"+ key.opponents[1].opponent.image_url +"' width='100px' height='100px'/><h4>" + key.opponents[1].opponent.name + "</h4></div>");
                            $("#div").append("</div>");
                        }
                        
                    });
                }
                });
                });
                
                $("#dota_load").on("click",function() {
                $.ajax({
                type: "GET",
                url: "api/getCurlDota.php",
                dataType: "json",
                success: function(data, status) {
                    console.log(data);
                    $("#div").html('');
                    data.forEach(function(key){
                        console.log(key);
                        if(!key.opponents[0] && !key.opponents[1]){
                            console.log(key);
                        } else if (!key.opponents[0]){
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' id='tbd' src='img/tbd.jpeg' width='100px' height='100px'/><h2>TBD</h2></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' src='"+ key.opponents[1].opponent.image_url +"' width='100px' height='100px'/><h2>" + key.opponents[1].opponent.name + "</h2></div>");
                            $("#div").append("</div>");
                        } else if (!key.opponents[1]){
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' src='"+ key.opponents[0].opponent.image_url +"' width='100px' height='100px'/><h2>" + key.opponents[0].opponent.name + "</h2></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' id='tbd' src='img/tbd.jpeg' width='100px' height='100px'/><h2>TBD</h2></div>");
                            $("#div").append("</div>");
                        } else {
                            $("#div").append("<div class='container' id='" + key.id + "'>");
                            $("#" + key.id).append("<div><img class='img1' src='"+ key.opponents[0].opponent.image_url +"' width='100px' height='100px'/><h2>" + key.opponents[0].opponent.name + "</h2></div>");
                            $("#" + key.id).append("<h2>  VERSUS  </h2>");
                            $("#" + key.id).append("<div><img class='img2' src='"+ key.opponents[1].opponent.image_url +"' width='100px' height='100px'/><h2>" + key.opponents[1].opponent.name + "</h2></div>");
                            $("#div").append("</div>");
                        }
                        
                    });
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
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Matches</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a id="csgo_load" class="dropdown-item" >CSGO</a>
                  <a id="lol_load" class="dropdown-item" href="javascript:void(0)">LOL</a>
                  <a id="dota_load" class="dropdown-item" >Dota 2</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
              </li>
            </ul>
            <div >
              <button id="signInButton" class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>
            </div>
          </div>
        </nav>


        <section id="main-content">
          <section class="wrapper">
            <div id="div">
                
            </div>
          </section>
        </section>
    

    <script>
// Get the modal
  /*  var modal = document.getElementById("544099Modal");


    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };*/
</script>
    
    </body>

</html>