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
        <?php if (isset($_SESSION['username'])) : ?>
          <li><a href="customerdash.php"><?php echo $_SESSION['username']; ?></a></li>
        <?php endif ?>
        <?php if (isset($_SESSION['username'])) : ?>
          <li><a href="index.php?logout='1'">Logout</a></li>
        <?php endif ?>
        <?php if (!isset($_SESSION['username'])) : ?>
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
      <nav>
        <ul id="horizontal-list">
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <?php if (isset($_SESSION['username'])) : ?>
            <li><a href="customerdash.php"><?php echo $_SESSION['username']; ?></a></li>
          <?php endif ?>
          <?php if (isset($_SESSION['username'])) : ?>
            <li><a href="index.php?logout='1'">Logout</a></li>
          <?php endif ?>
          <?php if (!isset($_SESSION['username'])) : ?>
            <li><a href="login.php">Login</a></li>
          <?php endif ?>
        </ul>
      </nav>
      <h1 id="menuClose"><i class="fas fa-times" onclick="mobiMenuClose()"></i></h1>
    </div>
  </header>
  <main>
    <form method="post" action="customerinfo.php">
	<?php include('errors.php'); ?>
      <div class="container">
        <br><br><br>
        <h1>Customer Info</h1>
        <p>Please fill in your info.</p>
        <hr>
		<label for="Fname"><b>Name</b></label>
        <input type="text" placeholder="Name" name="Fname" required value="<?php echo $fName; ?>">
		  <label for="Phone"><b>Phone</b></label>
        <input type="text" placeholder="Phone Number" name="phone" maxlength="10" required value="<?php echo $phone; ?>">
		    <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Address" name="address" required value="<?php echo $address; ?>">
		    <label for="city"><b>City</b></label>
        <input type="text" placeholder="City" name="city" required value="<?php echo $city; ?>">
		      <label for="state"><b>State</b></label>
        <input type="text" placeholder="State" name="state" maxlength="2" required value="<?php echo $state; ?>">
		   <label for="zip"><b>Zip</b></label>
        <input type="text" placeholder="Zip" name="zip" maxlength="5" required value="<?php echo $zip; ?>">


        <hr>


        <button type="submit" class="customerinfobtn" name="customerinfo">Save Info</button>
      </div>

      <div class="container signin">
        <p>Already have an account? <a href="login.php">Sign in</a>.</p>
      </div>
    </form>
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
