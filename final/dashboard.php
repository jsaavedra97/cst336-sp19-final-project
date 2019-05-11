<?php
    session_start();

    if (!isset($_SESSION['email_address'])){
      header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="bootstrap/bootstrap.css">
        
        <script>
      
          $(document).ready(function() {
              
                $("#searchButton").on("click", function() {
                console.log("in click");
                $.ajax({
                    type: "GET",
                    url: "api/currentBet.php",
                    dataType: "json",
                    success: function(data, status) {
                      console.log(data);
                      if (!data || data.length == 0) return;

                        //var asOfDateFormatted = $.format.date(data.standings_date, "d-MMM-yy");

                        // Insert the date
                        //$('h1 > span').html(asOfDateFormatted);

                        // Print the standings
                          
                          for (var i in data) {
                            var key = data[i];
                            $('#results > tbody')
                                .append($('<tr>')
                                    .append($('<td>')
                                        .html(key.match_bet)
                                    )
                                    .append($('<td>')
                                        .html(key.amount)
                                    )
                                    .append($('<td>')
                                        .html(key.pick)
                                    )
                                    .append($('<td>')
                                        .html("???")
                                    )
                                    .append($('<td>')
                                        .html(key.game)
                                    )
                                    
                                );
                        
                          }
                    },
                    complete: function(data, status) { //optional, used for debugging purposes
                        //console.log(data);
                        console.log(status);
                    }
                    
                });  
                });
                
          });
         
          
        </script>
        
        <style>
        body {
            text-align: center;
        }

        #results {
            text-align: left;
            padding-left: 20px;
        }
    </style>
    
    
    
    </head>
    <body>
    
      
      <!--logo end-->
      <!--<div class="nav notify-row" id="top_menu">-->
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
          </div>
        </nav>
      
        
        <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="img/tbd.jpg"><img src="img/tbd.jpg" class="img-circle" width="80"></a></p>
          <h5 id="sidebarEmail" class="centered"></h5>
          <li class="mt">
            <a class="sub-menu" href="">
              <i class="fa fa-dashboard"></i>
              <span>Home</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="bet_history.php">
              <i class="fa fa-cogs"></i>
              <span>Previous bets</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="settings.php">
              <i class="fa fa-book"></i>
              <span>Settings</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <section id="main-content">
      <section class="wrapper">
        
            <h1>Dashboard</h1>
            
            <div class="container">
              <h1>Recent Bets<span></span></h1>
                <div class="table-responsive">
                  <table id="results" class="table table-hover">
                      <thead>
                          <th>Match</th>
                          <th>Amount</th>
                          <th>Team</th>
                          <th>Result</th>
                          <th>Game</th>
                      </thead>
                      <tbody></tbody>
                  </table>
                  <!--<img class="loading" src="loading_spinner.gif" />-->
                </div>
            </div>
            
            <div>
                <button id="searchButton" class="btn btn-danger">Search</button>
                <button id="logoutButton" class="btn btn-danger">Logout</button>
            </div>
            <div>
                
            </div>
            
        </section>
      </section>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script>
           $("#logoutButton").on("click", function() {
                console.log("in login");
                window.location = "logout.php";
            });
        </script>
        
    </body>
</html>