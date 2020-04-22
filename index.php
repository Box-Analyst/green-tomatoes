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
	<div>
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<p>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</p>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <?php endif ?>
  </div>
    <div id="slideshow-container">
      <img src="./media/landing/1.jpg" id="slides">
    </div>

    <br><br>

    <div id="welcome">
      <h3>Welcome!</h3>
      <p>Come stay in one of our cottages and experience a peaceful farming life in luxury!</p>
      <a href="#more">
        <p id="morebtn">Learn More</p>
      </a>
      <a name="more"><br></a>
    </div>
    <h3>Experience Farming Life in Luxury!</h3>
    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in bibendum massa, faucibus interdum dolor. Duis
      nisi
      mi, faucibus non porttitor id, ullamcorper ut mi. Cras accumsan commodo lectus in egestas. Lorem ipsum dolor sit
      amet, consectetur adipiscing elit. Integer malesuada augue velit, in rhoncus eros commodo ac. Vivamus sodales
      viverra metus id venenatis. Vivamus a sodales dui. Donec id aliquet lacus. Praesent sit amet urna velit. Nam
      pellentesque eget magna vitae tincidunt. Nullam efficitur nulla orci, ac tincidunt ex commodo in. Donec dignissim
      efficitur ipsum vitae malesuada. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus
      mus.</p>

    <h3 id="reshead">Reservations</h3>

    <div id="resCard">
      <img src="./media/landing/4.jpg" id="resimg">
      <h4>Tomato Cottage</h4>
      <p>Lorem ipsum dolor sit amet</p>
	  <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
	    <p>You must Login to reserve a room</p>
      </a>
	  <?php endif ?>
	  <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more" href="reserveroom.php">
	    <?php $_SESSION['cottageID'] = '1'; ?>
	    <p>Reserve</p>
      </a>
	  <?php endif ?>
    </div>

    <div id="resCard">
      <img src="./media/landing/2.jpg" id="resimg">
      <h4>Watermelon Cottage</h4>
      <p>Lorem ipsum dolor sit amet</p>
      <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
	    <p>You must Login to reserve a room</p>
      </a>
	  <?php endif ?>
	  <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more" href="reserveroom.php">
		<?php $_SESSION['cottageID'] = '2'; ?>
	    <p>Reserve</p>
      </a>
	  <?php endif ?>
    </div>

    <div id="resCard">
      <img src="./media/landing/5.jpg" id="resimg">
      <h4>Corn Cottage</h4>
      <p>Lorem ipsum dolor sit amet</p>
      <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
	    <p>You must Login to reserve a room</p>
      </a>
	  <?php endif ?>
	  <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more" href="reserveroom.php">
	    <?php $_SESSION['cottageID'] = '3'; ?>
	    <p>Reserve</p>
      </a>
	  <?php endif ?>
    </div>

    <div id="resCard">
      <img src="./media/landing/1.jpg" id="resimg">
      <h4>Sunflower Cottage</h4>
      <p>Lorem ipsum dolor sit amet</p>
      <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
	    <p>You must Login to reserve a room</p>
      </a>
	  <?php endif ?>
	  <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more" href="reserveroom.php">
	    <?php $_SESSION['cottageID'] = '4'; ?>
	    <p>Reserve</p>
      </a>
	  <?php endif ?>
    </div>

    <div id="resCard">
      <img src="./media/landing/3.jpg" id="resimg">
      <h4>Wheat Cottage</h4>
      <p>Lorem ipsum dolor sit amet</p>
      <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
	    <p>You must Login to reserve a room</p>
      </a>
	  <?php endif ?>
	  <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more" href="reserveroom.php">
	    <?php $_SESSION['cottageID'] = '5'; ?>
	    <p>Reserve</p>
      </a>
	  <?php endif ?>
    </div>

  </main>

  <footer>
    <p>footer</p>
  </footer>
</body>

</html>
