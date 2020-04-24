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
        <li><a href="about.php">About</a></li>
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
	  <h2> About Us</h2>
	  <p> We are the Green Tomatoes Farm and Resort. Come experenience country living with us! We are open 365 days a year.</p>
	  <h3>Our History</h3>
	  <p> Farmer Joe Smith grew up on the Green Tomatoes Farm as a young child. After his father passed, Joe inherited the 1000 acre farm that also contained five uninhabited cottages. After talking to people nearby, Joe decedied to make the farm into a resort. Thus Greaan Tomatoes Farm and Resort was born in 2005.</p>
	  
	  <h3>Amenities</h3>
	  <ul>
  <li>2 rooms in each cottage with all amenities included.</li>
<li>Each cottage comes with 100 acres with access to tools and ingredients for farming with guidence on farming from Farmer Joe.</li>
  <li>All cottages happened to be spread out, so you can enjoy some privacy without having to deal with annoying neighbors.</li>
  <li>Customers choose their crop and book a cottage near a farm where they can grow their chosen crop. </li>
  <li>After the stay, guests get to keep a portion of the yield.</li>
  <li>On-site restaurant is included where a chef prepares meals for guests from fresh yield</li>
</ul>  

	  <h3>Our Staff</h3>
	  <ul>
  <li>Farmer Joe Smith - Owner, Manager and Main Farmer</li>
  <li>Farmer Joe's Four Sons</li>
  <li>1 Chef and 3 cooks for on-site restaurant</li>
  <li>2 full-time cleaning crew</li>
</ul> 
	  <h3>Contact Us</h3>
	  <p>Green Tomatoes Farm and Resort<br>
	  88005 AR-178<br>
	  Flippin, AR 72634<br>
	Phone: (870) 555-1234<br>
	Email: <a href="mailto:joe@greentomatoes.com">joe@greentomatoes.com</a>	  
	</p>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        var uluru = {
          lat: 36.316694,
          lng: -92.604528
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
    <p>© <?php echo date("Y"); ?> Copyright Green Tomatoes Farm and Resort.</p>
  </footer>
</body>

</html>
