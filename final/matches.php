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
        
        <style>
          
          .bg-image {
              /* Full height */
              height: 50%; 
              
              /* Center and scale the image nicely */
              background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
            }
            
            /* Images used */
            /*.Img1 { background-image: url("img/esports2.jpg"); }
            .Img2 { background-image: url("img/esports3.jpg"); }
            .Img3 { background-image: url("img/esports4.jpg"); }
            .img4 { background-image: url("img_nature.jpg"); }
            .img5 { background-image: url("img_forest.jpg"); }
            .img6 { background-image: url("img_woods.jpg"); }*/

          
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
    
    </body>

</html>