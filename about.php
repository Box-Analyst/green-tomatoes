<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in to reserve a room";
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/png" href="./media/favicon.png">
  <title>Green Tomatoes Hotel</title>
  <meta name="Description" content="">
  <!--Import main stylsheet-->
  <link rel="stylesheet" href="./style.css" />
  <!--Import fonts-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">
  <!--Inport Scripts-->
  <script src="./script.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-Frame-Options" content="sameorigin">
  <link rel='manifest' href='./manifest.json'>
</head>

<body>

  <header>
    <h1><a id="green">Green </a><a id="red">Tomatoes</a></h1>
    <nav>
      <ul id="horizontal-list">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="about.html">About</a></li>
        <?php  if (isset($_SESSION['username'])) : ?>
        <li><a href="index.php?logout='1'">Logout</a></li>
		<?php endif ?>
		<?php  if (!isset($_SESSION['username'])) : ?>
        <li><a href="login.php">Login</a></li>
		<?php endif ?>
      </ul>
      <h1>
        <button type="button" id="menu" onclick="mobiMenuOpen()">
          <i class="fas fa-bars"></i>
        </button>
      </h1>
    </nav>
    <div id="mobiMenu">
      <h1 id="red"><i class="fas fa-seedling"></i></h1>
      <h1 id="menuClose"><i class="fas fa-times" onclick="mobiMenuClose()"></i></h1>
    </div>
  </header>

  <main>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        var uluru = {
          lat: 35.3130513,
          lng: -93.0248498
        };
        // The map, centered at Uluru
        var map = new google.maps.Map(
          document.getElementById('map'), {
            zoom: 11,
            center: uluru
          });
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAORPi5WeBMKbG-KAPzNWWFHh7am24muzw&callback=initMap">
    </script>
  </main>

  <footer>
    <p>footer</p>
  </footer>
</body>

</html>
