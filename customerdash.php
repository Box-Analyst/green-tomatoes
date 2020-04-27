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
if (isset($_GET['checkedIn'])) {
  $_SESSION['checkedIn'] = $_GET['checkedIn'];
  header("location: customerdash.php");
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
      <h1 id="red"><i class="fas fa-seedling"></i></h1>
      <h1 id="menuClose"><i class="fas fa-times" onclick="mobiMenuClose()"></i></h1>
    </div>
  </header>

  <main>

    <h1>Customer Dashboard</h1>
    <!-- logged in user information -->
    <?php if (isset($_SESSION['username'])) : ?>
      <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p><strong><?php echo $_SESSION['transaction']; ?></strong></p>
    <?php endif ?>
    <?php if (!isset($_SESSION['username'])) : ?>
      <p> <a href="login.php?msg='1'" style="color: red;">You must Login to use this page.</a> </p>
    <?php endif ?>
    </div>
    <p>Use this page to check in/out and request services after you arrive!</p>
    <!-- TODO: make button say "canel reservation" if before reservation date -->
    <?php if (($_SESSION['checkin'] < date("Y-m-d")) || ($_SESSION['checkin'] != '0000-00-00')) : ?>
      <button type="button" class="signinbtn" onclick="location.href='server.php?cancel'" style="background-color: darkred;">
        <h2>
          <div>Cancel Reservation</div>
        </h2>
      </button>
    <?php endif ?>
    <?php if (!isset($_SESSION['username'])) : ?>
      <button type="button" class="signinbtn" style="background-color: gray;">
        <h2>
          <div>Check In</div>
        </h2>
      </button>
    <?php endif ?>
    <?php if ($_SESSION['checkedIn'] == '0') : ?>
      <button type="button" class="signinbtn" onclick="location.href='customerdash.php?checkedIn=1'">
        <h2>
          <div>Check In</div>
        </h2>
      </button>
    <?php endif ?>
    <?php if ($_SESSION['checkedIn'] == '1') : ?>
      <button type="button" class="signinbtn" onclick="location.href='customerdash.php?checkedIn=0'">
        <h2>
          <div>Check Out</div>
        </h2>
      </button>
    <?php endif ?>

    <?php if (!isset($_SESSION['username'])) : ?>
      <button type="button" class="signinbtn" style="background-color: gray;">
        <h2>
          <div>Contact Front Desk</div>
        </h2>
      </button>
    <?php endif ?>
    <?php if (isset($_SESSION['username'])) : ?>
      <button type="button" class="signinbtn">
        <h2>
          <div>Contact Front Desk</div>
        </h2>
      </button>
    <?php endif ?>

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
