<?php include('detailserver.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <title>FIX IT - Automotive Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
    <link rel="shortcut icon" href="Picture1.png">
    
    <link rel="stylesheet" href="css/custom-bs.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/line-icons/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <style>
    .button {
      background-color: #89ab16;
      border: none;
      color: white;
      padding: 8px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 13px;
      margin: 4px 2px;
      cursor: pointer;
    }
    body {font-family: Arial, Helvetica, sans-serif;}

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      height: 100%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
    #map {
        height: 300px;
        width: 100%;
      }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th {
        text-align: left;
        padding: 5px;
        text-align: left;
        background-color: #89ab16;
        color: white;
        height: 10px;
    }
    td {
        text-align: left;
        padding: 5px;
        padding-right: 400px;
        text-align: left;
        background-color: white;
        color: black;
        height: 10px;
    }
</style>
  </head>
  <body id="top">

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
    

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.php"><img src="logo.jpg" width="144px" height="90px" style="margin:0px; padding:-10px;"></a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li class="d-lg-none"><a href="index.php">Log out</a></li>
            </ul>
          </nav>
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
            <a href="index.php" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"></span>Home</a>
              <a href="index.php" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log Out</a>
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">
    </section>

    <section class="site-section block__18514" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 mr-auto">
            <div class="border p-4 rounded">
              <ul class="list-unstyled block__47528 mb-0">
                <li><span class="active">Notification</span></li>
                  <?php  if (isset($_SESSION['name'])) : ?>
                    <p style="font-size:20px; font-style:century; margin-left: 30px;"><p> Someone choose you to work with him/her.</p></p>

                    <button type="button" id="myBtn">Accept</button> <button onclick="window.location='dashbaordadminn.php'">Decline</button>
                  <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <strong style="text-align: center;">Here the Details</strong>
                      <form method="post" action="enterdetails.php">

                      <table>
                            <thead>
                                <tr>
                                    <th>Name:</th>
                                    <th>Contact No.:</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($dets as $message): ?>
                                <tr>
                                    <td><?= $message->name; ?></td>
                                    <td><?= $message->contact; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>  

                        <?php include('errors.php'); ?>

                        <br>  
                        <div id="map"></div>
                        <script>
                          var map, infoWindow;
                          function initMap() {
                            map = new google.maps.Map(document.getElementById('map'), {
                              center: {lat: 17.5705, lng: 120.3873},
                              zoom: 18
                            });
                            infoWindow = new google.maps.InfoWindow;

                            // Try HTML5 geolocation.
                            if (navigator.geolocation) {
                              navigator.geolocation.getCurrentPosition(function(position) {
                                var pos = {
                                  lat: position.coords.latitude,
                                  lng: position.coords.longitude
                                };


                                
                                infoWindow.setContent = new google.maps.Marker({position: pos, map: map});
                                infoWindow.open(map);
                                map.setCenter(pos);
                              }, function() {
                                handleLocationError(true, infoWindow, map.getCenter());
                              });
                            } else {
                              // Browser doesn't support Geolocation
                              handleLocationError(false, infoWindow, map.getCenter());
                            }
                          }

                          function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                            infoWindow.setPosition(pos);
                            infoWindow.setContent(browserHasGeolocation ?
                                                  'Error: The Geolocation service failed.' :
                                                  'Error: Your browser doesn\'t support geolocation.');
                            infoWindow.open(map);
                          }
                        </script>
                        <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZDsHYN5f5O4G6xXiPfAQcW-J10nxyGyM&callback=initMap">
                        </script>    
                      </form>  
                    </div>

                  </div>
                  <?php endif ?>
                  <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal 
                    btn.onclick = function() {
                      modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                      modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                      if (event.target == modal) {
                        modal.style.display = "none";
                      }
                    }
                    </script>

              </ul>
            </div>
          </div>
          <div class="col-lg-8">
            <span class="text-primary d-block mb-5"></span>

          <div class="col-lg-8">
            <?php  if (isset($_SESSION['name'])) : ?>
              <p style="font-size:30px; font-style:century; margin-left: 30px;">Welcome <strong><?php echo $_SESSION['name']; ?></strong></p>
            <?php endif ?>
          </div>


          </div>
        </div>
      </div>
    </section>
    
    <footer class="site-footer">

      <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
      </a>

        <div class="row text-center">
          <div class="col-12">
            <p class="copyright">
            <!-- Link back to Free-Template.co can't be removed. Template is licensed under CC BY 3.0. -->
            <small class="block">&copy; <script>document.write(new Date().getFullYear());</script> <strong class="text-white">STI College Vigan - Professional <br> Victoria Kirsten Sison <br> John Carlo Malamug
            </strong></a></small> 
            </p>
          </div>
    </footer>
  
  </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/stickyfill.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/quill.min.js"></script>
    
    
    <script src="js/bootstrap-select.min.js"></script>
    
    <script src="js/custom.js"></script>
   
  </body>
</html>