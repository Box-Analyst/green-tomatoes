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
      <div class="container">
        <br><br><br>
        <h1>Reserve a Room</h1>
        <p>Please fill this form to reserve a room.</p>
        <hr>
		<label for="Name"><b>Name</b></label>
        <input type="text" placeholder="Name" name="Name" required value="<?php echo $Name; ?>">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required value="<?php echo $email; ?>">
		  <label for="Phone"><b>Phone</b></label>
        <input type="text" placeholder="Phone Number" name="phone" required value="<?php echo $phone; ?>">
		    <label for="checkin"><b>Check-in</b></label>
        <input type="text" placeholder="MM/DD/YY" name="checkin" required>
		    <label for="checkout"><b>Check-out</b></label>
        <input type="text" placeholder="MM/DD/YY" name="checkout" required>
		      <label for="cottage"><b>Cottage</b></label>
        <select id="cottage">
		<option value = "Tomato">Tomato</option>
		<option value = "Watermelon">Watermelon</option>
		<option value = "Corn">Corn</option>
		<option value = "Sunflower">Sunflower</option>
		<option value = "Wheat">Wheat</option>
	</select>
		   
        
        <hr>


        <button type="submit" class="registerbtn saveinfobtn">Save Info</button>
      </div>

   
    </form>
  </main>

</body>

</html>
