<?php
session_start();

// initializing variables
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'scaduser', 'GoAsim1!', 'green-tomatoes');

// REGISTER USER
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['psw']);
  $password_2 = mysqli_real_escape_string($db, $_POST['psw-repeat']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {array_push($errors, "Invalid Email format"); }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM LOGIN WHERE emailAddress='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO LOGIN (emailAddress, isAdmin, password) 
  			  VALUES('$email', '0', '$password_1')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: customerinfo.php');
  }
}

if (isset($_POST['customerinfo'])) {
  // receive all input values from the form
  $fName = mysqli_real_escape_string($db, $_POST['Fname']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $city = mysqli_real_escape_string($db, $_POST['city']);
  $state = mysqli_real_escape_string($db, $_POST['state']);
  $zip = mysqli_real_escape_string($db, $_POST['zip']);
  $email = $_SESSION['username'];
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fName)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($city)) { array_push($errors, "City is required"); }
  if (empty($state)) { array_push($errors, "State is required"); }
  if (empty($zip)) { array_push($errors, "Zip is required"); }

  //if (!preg_match("/^[a-zA-Z ]$/",$fName)) { array_push($errors, "Only letters and white space allowed"); }
  if (!preg_match("/^[0-9]{10}$/",$phone)) { array_push($errors, "Only 11 numbers without slashes or dashes allowed"); }
  if (!preg_match("/^[a-zA-Z ]{2}$/",$state)) { array_push($errors, "Only 2 letters allowed"); }
  if (!preg_match("/^[0-9]{5}$/",$zip)) { array_push($errors, "Only 5 numbers without slashes or dashes allowed"); }
  
  
  
  // Finally, register user information if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO CUSTOMER (name, emailAddress, phoneNumber, address, city, state, zip) 
  			  VALUES('$fName', '$email', '$phone', '$address', '$city', '$state', '$zip')";
  	mysqli_query($db, $query);
	$_SESSION['name'] = $fName;
	$_SESSION['username'] = $email;
	$_SESSION['phone'] = $phone;
	$_SESSION['address'] = $address;
	$_SESSION['city'] = $city;
	$_SESSION['state'] = $state;
	$_SESSION['zip'] = $zip;
  	header('location: index.php');
  }
}

if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['psw']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM LOGIN WHERE emailAddress='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
	  $query1 = "SELECT name, phoneNumber, address, city, state, zip FROM CUSTOMER WHERE emailAddress='$email'";
	  $results1 = mysqli_query($db, $query1);
	  $row = mysqli_fetch_array($results1);
  	  $_SESSION['username'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
	  $_SESSION['name'] = $row[0];
	  $_SESSION['phone'] = $row[1];
	  $_SESSION['address'] = $row[2];
	  $_SESSION['city'] = $row[3];
	  $_SESSION['state'] = $row[4];
	  $_SESSION['zip'] = $row[5];
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong email/password combination");
  	}
  }
}
?>