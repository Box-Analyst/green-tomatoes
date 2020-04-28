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
  if (isset($_GET['cottageName'])){
	  $cottageName = $_GET['cottageName'];
	  $_SESSION['cottageName'] = $cottageName;
	  if($cottageName == 'Tomato Cottage'){
		  $_SESSION['cottageID'] = '1';
	  } else if($cottageName == 'Watermelon Cottage'){
		  $_SESSION['cottageID'] = '2';
	  } else if($cottageName == 'Corn Cottage'){
		  $_SESSION['cottageID'] = '3';
	  } else if($cottageName == 'Sunflower Cottage'){
		  $_SESSION['cottageID'] = '4';
	  } else if($cottageName == 'Wheat Cottage'){
		  $_SESSION['cottageID'] = '5';
	  }
	  header("location: reserveroom.php");
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
      <div class="error success">
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
    <p> Stay at the Green Tomatoes Farm and Resort and experience the life of a farmer while also enjoying time away from the city! Our unique resort farming experience allows our customers to choose a crop they would like to grow with the assistance of the owner, Farmer Joe. Once your stay is over, all crops grown throughout the duration of the stay are yours to take back home! Our open fields and peaceful scenery will leave you feeling refreshed after a week, month, or however long you would like to stay! Simply scroll down, select your preferred cottage, and make a reservation for the most luxurious farming experience Arkansas has to offer.</p>

    <h3 id="reshead">Reservations</h3>

    <div id="resCard">
      <img src="./media/landing/4.jpg" id="resimg">
      <h4>Tomato Cottage</h4>
      <p>This is our primier cottage. Featuring wonderful views of our fields and pond, the Tomato Cottage is the place
        to be.<br>
        <ul>
          <li>2 bedroom, 2 bath with living room and fully stocked kitchen</li>
          <li>Cable TV and High-Speed Internet</li>
          <li>Rates starting at $300/night</li>
        </ul>
      </p>
      <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
        <p>You must Login to reserve a room</p>
      </a>
      <?php endif ?>
      <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more"  href="index.php?cottageName=Tomato Cottage">
	    <p>Reserve</p>
      </a>
      <?php endif ?>
    </div>

    <div id="resCard">
      <img src="./media/landing/2.jpg" id="resimg">
      <h4>Watermelon Cottage</h4>
      <p>This is our midrange cottage. Featuring wonderful views of a field and some woods, the Watermelon Cottage is
        the place to be.<br>
        <ul>
          <li>2 bedroom, 2 bath with living room and fully stocked kitchen</li>
          <li>Cable TV and High-Speed Internet</li>
          <li>Rates starting at $150/night</li>
        </ul>
      </p>
      <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
        <p>You must Login to reserve a room</p>
      </a>
      <?php endif ?>
      <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more" href="index.php?cottageName=Watermelon Cottage">
	    <p>Reserve</p>
      </a>
      <?php endif ?>
    </div>

    <div id="resCard">
      <img src="./media/landing/5.jpg" id="resimg">
      <h4>Corn Cottage</h4>
      <p>This is our Corn Cottage. Featuring wonderful views of our a corn field, the Corn Cottage is the place to
        be.<br>
        <ul>
          <li>2 bedroom, 2 bath with living room and fully stocked kitchen</li>
          <li>Cable TV and High-Speed Internet</li>
          <li>Rates starting at $150/night</li>
        </ul>
      </p>
      <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
        <p>You must Login to reserve a room</p>
      </a>
      <?php endif ?>
      <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more" href="index.php?cottageName=Corn Cottage">
	    <p>Reserve</p>
      </a>
      <?php endif ?>
    </div>

    <div id="resCard">
      <img src="./media/landing/1.jpg" id="resimg">
      <h4>Sunflower Cottage</h4>
      <p>This is on of our budget cottages. Featuring wonderful views of a sunflower field, the Sunflower Cottage is the
        place to be.<br>
        <ul>
          <li>2 bedroom, 1 bath with a outdoor patio and a fully stocked kitchen</li>
          <li>landline phone</li>
          <li>Rates starting at $100/night</li>
        </ul>
      </p>
      <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
        <p>You must Login to reserve a room</p>
      </a>
      <?php endif ?>
      <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more" href="index.php?cottageName=Sunflower Cottage">
	    <p>Reserve</p>
      </a>
      <?php endif ?>
    </div>

    <div id="resCard">
      <img src="./media/landing/3.jpg" id="resimg">
      <h4>Wheat Cottage</h4>
      <p>This is on of our budget cottages. Featuring wonderful views of a wheat field, the Sunflower Cottage is the
        place to be.<br>
        <ul>
          <li>2 bedroom, 1 bath with a outdoor patio and a fully stocked kitchen</li>
          <li>landline phone</li>
          <li>Rates starting at $100/night</li>
        </ul>
      </p>
      <?php  if (!isset($_SESSION['username'])) : ?>
      <a name="more" href="login.php" style="color: red;">
        <p>You must Login to reserve a room</p>
      </a>
      <?php endif ?>
      <?php  if (isset($_SESSION['username'])) : ?>
      <a name="more" href="index.php?cottageName=Wheat Cottage">
	    <p>Reserve</p>
      </a>
      <?php endif ?>
    </div>

  </main>

  <footer>
    <br><br>
    <div id="footer-span">
      <div><i class="far fa-copyright" id="copy"></i> <?php echo date("Y"); ?> Copyright Green Tomatoes Farm and Resort.</div>
    </div>
    <br>
  </footer>
</body>

</html>
