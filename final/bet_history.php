<?php
    session_start();

    if (!isset($_SESSION['email_address'])){
      header("Location: index.php");
      
    }
?>

<html>
    <head>
        <title>Dashboard</title>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="bootstrap/bootstrap.css">
        
        <script>
      
          $(document).ready(function() {
                $("#searchButton").on("click", function() {
                /*  console.log("in click");
                $.ajax({
                    type: "GET",
                    url: "api/emailCheck.php",
                    dataType: "",
                    success: function(data, status) {
                      console.log(data);
                      
                    },
                complete: function(data, status) { //optional, used for debugging purposes
                    //console.log(status);
                }
                    
                });*/  
                
                 $.ajax({
                        
                        url: "https://www.showdeolabs.com/cors?url=https://erikberg.com/mlb/standings.json",
                        

                        // Whether this is a POST or GET request
                        type: "GET",

                        // The type of data we expect back
                        dataType: "json",

                    })
                    // Code to run if the request succeeds (is done);
                    // The response is passed to the function
                    .done(function(data) {
                        console.log("Baseball Data:", data);

                        // Do not do anything if there is no data
                        if (!data || data.length == 0) return;

                        var asOfDateFormatted = $.format.date(data.standings_date, "d-MMM-yy");

                        // Insert the date
                        $('h1 > span').html(asOfDateFormatted);

                        // Print the standings
                        for (var i in data.standing) {
                            var standing = data.standing[i];

                            $('#results > tbody')
                                .append($('<tr>')
                                    .append($('<td>')
                                        .html(standing.conference)
                                    )
                                    .append($('<td>')
                                        .append($('<img>')
                                            .attr('src', getLogoFor(standing.last_name))
                                            .attr('class', 'team-logo')
                                        )
                                    )
                                    .append($('<td>')
                                        .html(standing.first_name + " " + standing.last_name)
                                    )
                                    .append($('<td>')
                                        .html(standing.won)
                                    )
                                    .append($('<td>')
                                        .html(standing.lost)
                                    )
                                    .append($('<td>')
                                        .html(standing.games_back)
                                    )
                                    
                                );
                        }
                    });
                    function getLogoFor(team) {
                switch (team) {
                    case "Angels":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_laa_79x76.jpg";
                    case "Astros":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_hou_79x76.jpg";
                    case "Athletics":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_oak_79x76.jpg";
                    case "Blue Jays":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_tor_79x76.jpg";
                    case "Braves":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_atl_79x76.jpg";
                    case "Cardinals":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_stl_79x76.jpg";
                    case "Cubs":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_chc_79x76.jpg";
                    case "Diamondbacks":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_ari_79x76.jpg";
                    case "Dodgers":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_lad_79x76.jpg";
                    case "Indians":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_cle_79x76.jpg";
                    case "Giants":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_sf_79x76.jpg";
                    case "Mariners":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_sea_79x76.jpg";
                    case "Marlins":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_mia_79x76.jpg";
                    case "Mets":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_nym_79x76.jpg";
                    case "Nationals":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_was_79x76.jpg";
                    case "Orioles":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_bal_79x76.jpg";
                    case "Padres":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_sd_79x76.jpg";
                    case "Phillies":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_phi_79x76.jpg";
                    case "Pirates":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_pit_79x76.jpg";
                    case "Rangers":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_tex_79x76.jpg";
                    case "Rays":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_tb_79x76.jpg";
                    case "Reds":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_cin_79x76.jpg";
                    case "Red Sox":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_bos_79x76.jpg";
                    case "Rockies":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_col_79x76.jpg";
                    case "Royals":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_kc_79x76.jpg";
                    case "Tigers":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_det_79x76.jpg";
                    case "Twins":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_min_79x76.jpg";
                    case "White Sox":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_cws_79x76.jpg";
                    case "Yankees":
                        return "http://mlb.mlb.com/mlb/images/team_logos/logo_nyy_79x76.jpg";
                    default:
                        return "http://content.sportslogos.net/logos/4/490/full/1986.gif";
                }
            }
                
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
          <p class="centered"><a href="img/tbd.jpeg"><img src="img/tbd.jpeg" class="img-circle" width="80"></a></p>
          <h5 id="sidebarEmail" class="centered"></h5>
          <li class="mt">
            <a class="sub-menu" href="dashboard.php">
              <i class="fa fa-dashboard"></i>
              <span>Home</span>
              </a>
          </li>
          <li class="active">
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
        
            <h1>Bet History</h1>
            
            <div class="container">
              <h1>Standings as of <span></span></h1>
                <div class="table-responsive">
                  <table id="results" class="table table-hover">
                      <thead>
                          <th>Match</th>
                          <th>Amount</th>
                          <th>Team</th>
                          <th>Result</th>
                          <th>Game</th>
                          <th>Net Gain/Loss</th>
                      </thead>
                      <tbody></tbody>
                  </table>
                  <img class="loading" src="loading_spinner.gif" />
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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js"></script>

        <script>
           $("#logoutButton").on("click", function() {
                console.log("in login");
                window.location = "logout.php";
            });
        </script>
        
    </body>
</html>