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
  <meta name="theme-color" content="#90ee90" />
  <link rel="icon" type="image/png" href="./media/favicon.png">
  <title>Green Tomatoes Hotel</title>
  <meta name="Description" content="">
  <!--Import main stylsheet-->
  <link rel="stylesheet" href="./style.css" />
  <!--Import fonts-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" rel="stylesheet">
  <!--Inport Scripts-->
  <script src="./javascript.js"></script>
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
        <li><a href="#about">About</a></li>
        <li><a href="login.php">Login</a></li>
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
    </div>

    <a name="more" id="more">
      <h3>Experience Farming Life in Luxury!</h3>
    </a>
    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in bibendum massa, faucibus interdum dolor. Duis
      nisi
      mi, faucibus non porttitor id, ullamcorper ut mi. Cras accumsan commodo lectus in egestas. Lorem ipsum dolor sit
      amet, consectetur adipiscing elit. Integer malesuada augue velit, in rhoncus eros commodo ac. Vivamus sodales
      viverra metus id venenatis. Vivamus a sodales dui. Donec id aliquet lacus. Praesent sit amet urna velit. Nam
      pellentesque eget magna vitae tincidunt. Nullam efficitur nulla orci, ac tincidunt ex commodo in. Donec dignissim
      efficitur ipsum vitae malesuada. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus
      mus.</p>

    <h3>Reservations</h3>
    <div id="resCard">
      <p>res1</p>
      <p>Lorem ipsum dolor sit amet</p>
      <p>Lorem ipsum dolor sit amet</p>
    </div>

    <div id="resCard">
      <p>res2</p>
      <p>Lorem ipsum dolor sit amet</p>
      <p>Lorem ipsum dolor sit amet</p>
    </div>

    <div id="resCard">
      <p>res3</p>
      <p>Lorem ipsum dolor sit amet</p>
      <p>Lorem ipsum dolor sit amet</p>
    </div>

  </main>
  <div>
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
	<?php  if (!isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="login.php?msg='1'" style="color: red;">You must Login to reserve a room</a> </p>
    <?php endif ?>
  </div>
  <footer>
    <p>footer</p>
  </footer>
</body>

</html>
