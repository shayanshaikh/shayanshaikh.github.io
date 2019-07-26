<!DOCTYPE html>
<html>
        <head>
                <link type='text/css' rel='stylesheet' href='style.css'/>
                <meta charset="utf-8">
                <title>Shayan Shaikh</title>
                <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
                <script type="text/javascript" src="https://blockchain.info/Resources/js/pay-now-button.js"></script>
                <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
                <script type="text/javascript">
                        $(document).ready(function() {
                          getLocation();
                        })

                        function getLocation() {
                          var location;
                          $.ajax({
                            format: "jsonp",
                            dataType: "jsonp",
                            url: "https://api.ip.sb/geoip?callback=getgeoip",
                            success: function(data) {
                              location = (data.latitude + "," + data.longitude);
                              getURL(location);
                            },
                            error: function() {
                              httpsLocation();
                            },
                            method: "GET"
                          });

                          function httpsLocation() {
                            if (navigator.geolocation) {
                              location;
                              navigator.geolocation.getCurrentPosition(passLocation);
                            }
                          }

                          function passLocation(position) {
                            location = position.coords.latitude + ", " + position.coords.longitude;
                            getURL(location);
                          }
                        }

                        function getURL(location, tempSetting) {
                          var url = ("https://api.forecast.io/forecast/bd38ed36b4d959434e24e9a1b1acf112/" + location);
                          getJson(url);
                        }

                        function getJson(url) {
                          $.ajax({
                              format: "jsonp",
                              dataType: "jsonp",
                              url: url,
                              success: function(json) {
                                $("#weather-current").html(Math.round(json.currently.temperature) + "°");
                              }

                            })
                            .error(function(jqXHR, textStatus, errorThrown) {
                              alert("error: " + JSON.stringify(jqXHR));
                            });
                        }
                </script>
                </head>
                <body>
                <nav>
                  <a href="/">Home</a>
                  <a href="/?page=contact">Contact</a>
                  <a href="/?page=about">About</a>
                  <a href="/?page=donate">Donate</a>
                  <a href="/?page=click-me">Click Me!</a>
                </nav>
                <?php
                  if(isset($_GET['page']))
                  {
                    if ($_GET['page'] == "contact") {
                      echo "<h1>Why you tryna contact me</h1>";
                    } else if ($_GET['page'] == "about") {
                      echo "<h1>About who?</h1>";
                    } else if ($_GET['page'] == "donate") {
                      echo '<div style="font-size:16px;margin:40px auto;width:400px" class="blockchain-btn"data-address="1QHTD45fuA97ZEAB8VNCd7Rev2Yy9oaBhy"data-shared="false">
                                    <div class="blockchain stage-begin">
                                            <img src="https://blockchain.info/Resources/buttons/donate_64.png"/>
                                    </div>
                                    <div style="background-color:#d8d8d8;border:10px solid #d8d8d8;border-radius:5px;" class="blockchain stage-ready">
                                            <p>Send me Bitcoin: <b style="font-family:caption">[[address]]</b></p>
                                            <p align="center" class="qr-code"></p>
                                    </div>
                                    <div class="blockchain stage-paid">
                                            Donation of <b>[[value]] BTC</b> Received. Thank You.
                                    </div>
                                    <div class="blockchain stage-error">
                                            <font color="red">[[error]]</font>
                                    </div>
                            </div>';
                    } else if ($_GET['page'] == "click-me") {
                        echo "<div class='back'><h3>AWESOME</h3></div>";
                    }
                  } else {
                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    } else {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }
                    $url = "https://api.ipdata.co/" . $ip . "/time_zone?api-key=1b968492f55c63e860436470227acbc462791b5be3cfd1f10c410456";
                    $contents = @file_get_contents($url);
                    $data = @json_decode($contents);
                    $timezone = $data->name;
                    $realTZ = new DateTimeZone($timezone);
                    $date = new DateTime('now', $realTZ);

                    printf("<h2 style='margin: 60px'>It is %s day %s of month %s in the year %s</h2>", $date->format('l'), $date->format('d'), $date->format('m'), $date->format('Y'));
                    $temp = '<h2 id="weather-current" style="display:inline;">--</h2>';
                    printf("<h2 style='display:inline;'>And the current temperature is %s</h2>", $temp);
                    echo '<a href="https://darksky.net/poweredby/"><img src="https://darksky.net/dev/img/attribution/poweredby.png" style="display:inline;" width="180" height="100"/></a>';
                  }
                ?>


                <div style="margin-top:200px;"><a style="text-decoration:none;color:#333333;font-size:60px;" href="#welcome">&#9660;</a></div>
                <div id="welcome" class="img">
                  <p style="position:absolute;top:70%;background-color:rgba(216,216,216,.9);margin:20px;padding:10px;">Welcome to me very first websit</p>
                </div>
                <img src="shayanshaikh_resume.jpg">
                <p style="width:50%;margin:300px;">
                  Content Content Content Content Content Content Content,
                  Content Content Content Content Content Content Content,
                  Content Content Content Content Content Content Content,
                  Content Content Content Content Content Content Content.
                </p>
                <div class="footer">
                        <p>Created By Shayan Shaikh</p>
                        <p>All Rights Reserved</p>
                </div>
        </body>
</html>
