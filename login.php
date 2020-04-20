<?php include('server.php')?>
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
        <li><a href="/" class="active">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="./login.html">Login</a></li>
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
    <form method="post" action="login.php">
	<?php include('errors.php'); ?>
      <div class="container">
        <br><br><br>
        <h1>Login</h1>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>


        <hr>
        <p>Not registered? <a href="./register.php">Create an account</a>.</p>

        <button type="submit" class="signinbtn" name="login_user">Sign in</button>
      </div>


    </form>
  </main>

</body>

</html>
