<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./style.css" />
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
    <form method="post" action="reserveroom.php">
	<?php include('errors.php'); ?>
      <div class="container">
        <br><br><br>
        <h1>Reserve a Room</h1>
        <p>Name: <?php echo $_SESSION['name']; ?></p>
		<p>Email: <?php echo $_SESSION['username']; ?></p>
		<p>Phone: <?php echo $_SESSION['phone']; ?></p>
		<p>Address: <?php echo $_SESSION['address']; ?></p>
		<p>City: <?php echo $_SESSION['city']; ?></p>
		<p>State: <?php echo $_SESSION['state']; ?></p>
		<p>Zip: <?php echo $_SESSION['zip']; ?></p>
		<p>Cottage: <?php echo $_SESSION['cottageName']; ?></p>
        <hr>
		    <label for="checkin"><b>Check-in</b></label>
        <input type="text" placeholder="MM/DD/YY" name="checkin" required>
		    <label for="checkout"><b>Check-out</b></label>
        <input type="text" placeholder="MM/DD/YY" name="checkout" required>
		   
        
        <hr>


        <button type="submit" class="registerbtn saveinfobtn">Save Info</button>
      </div>

   
    </form>
  </main>

</body>

</html>
