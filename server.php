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
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Invalid Email format");
  }
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
  if (empty($fName)) {
    array_push($errors, "Email is required");
  }
  if (empty($phone)) {
    array_push($errors, "Phone is required");
  }
  if (empty($address)) {
    array_push($errors, "Address is required");
  }
  if (empty($city)) {
    array_push($errors, "City is required");
  }
  if (empty($state)) {
    array_push($errors, "State is required");
  }
  if (empty($zip)) {
    array_push($errors, "Zip is required");
  }

  //if (!preg_match("/^[a-zA-Z ]$/",$fName)) { array_push($errors, "Only letters and white space allowed"); }
  if (!preg_match("/^[0-9]{10}$/", $phone)) {
    array_push($errors, "Only 11 numbers without slashes or dashes allowed");
  }
  if (!preg_match("/^[a-zA-Z ]{2}$/", $state)) {
    array_push($errors, "Only 2 letters allowed");
  }
  if (!preg_match("/^[0-9]{5}$/", $zip)) {
    array_push($errors, "Only 5 numbers without slashes or dashes allowed");
  }



  // Finally, register user information if there are no errors in the form
  if (count($errors) == 0) {

    $query = "INSERT INTO CUSTOMER (name, emailAddress, phoneNumber, address, city, state, zip, checkedIn)
  			  VALUES('$fName', '$email', '$phone', '$address', '$city', '$state', '$zip', '0')";
    mysqli_query($db, $query);
    $query2 = "SELECT customerID FROM CUSTOMER WHERE emailAddress = '$email'";
    $results = mysqli_query($db, $query2);
    $row = mysqli_fetch_array($results);
    $_SESSION['customerID'] = $row[0];
    $_SESSION['name'] = $fName;
    $_SESSION['username'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['address'] = $address;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['zip'] = $zip;
    $_SESSION['checkedIn'] = '0';
    header('location: index.php');
  }
}

if (isset($_POST['checkreservation'])) {
  $checkin = mysqli_real_escape_string($db, $_POST['checkin']);
  $checkout = mysqli_real_escape_string($db, $_POST['checkout']);
  $cottageID = $_SESSION['cottageID'];

  if (count($errors) == 0) {
    $query = "SELECT lastStayDate FROM COTTAGE WHERE cottageID = '$cottageID'";
    $results = mysqli_query($db, $query);
    $results1 = mysqli_fetch_array($results);

    $date1 = date('Y-m-d', strtotime($checkin));
    $date2 = date('Y-m-d', strtotime($results1[0]));
    $date3 = date('Y-m-d', strtotime($checkout));

    if ($date1 < date("Y-m-d")) {
      array_push($errors, "Check-in date is in the past.");
    }
    if (count($errors) == 0) {
      if ($date1 > $date2) {
        $_SESSION['checkin'] = $date1;
        $_SESSION['checkout'] = $date3;
        header('location: transaction.php');
      } else {
        array_push($errors, "Check-in date is not available. Try a later date.");
      }
    }
  }
}

if (isset($_POST['makepayment'])) {
  $datePaid = date('Y-m-d');
  $customerID = $_SESSION['customerID'];
  $reservationID = $_SESSION['reservationID'];
  $checkout = $_SESSION['checkout'];
  $checkin = $_SESSION['checkin'];
  $cottageID = $_SESSION['cottageID'];

  if (count($errors) == 0) {
    $query = "INSERT INTO TRANSACTIONINFO (amountPaid, customerID, datePaid)
		VALUES('20', '$customerID', '$datePaid')";
    mysqli_query($db, $query);
    $query2 = "INSERT INTO STAYLOG (customerID, endDate, startDate)
		VALUES('$customerID', '$checkout', '$checkin')";
    mysqli_query($db, $query2);
    $query3 = "UPDATE COTTAGE
		SET lastStayDate = '$checkout'
		WHERE cottageID = '$cottageID'";
    mysqli_query($db, $query3);
    $query4 = "SELECT stayLogID FROM STAYLOG WHERE customerID = '$customerID' AND startDate = '$checkin'";
    $results = mysqli_query($db, $query4);
    $row = mysqli_fetch_array($results);
    $stayLogID = $row[0];
    $query5 = "SELECT transactionID FROM TRANSACTIONINFO WHERE customerID = '$customerID' AND datePaid = '$datePaid'";
    $results1 = mysqli_query($db, $query5);
    $row1 = mysqli_fetch_array($results1);
    $transactionID = $row1[0];
    $query6 = "INSERT INTO RESERVATION (cottageID, customerID, stayLogID, transactionID)
		VALUES('$cottageID', '$customerID', '$stayLogID', '$transactionID')";
    mysqli_query($db, $query6);
    $_SESSION['transaction'] = $transactionID;
    $_SESSION['stayLogID'] = $stayLogID;

    $email = $_SESSION['username'];
    $msg = "Reservation $reservationID for $cottageID \nPaid on: $datePaid \nCheck in date: $checkin \nCheck out date: $checkout";
    $msg = wordwrap($msg, 70);
    $headers = 'From: scademail@web1.paulmickey.com';
    mail("greentomatoes@thayn.me", "Green Tomatoes Reservation", $msg, $headers);
    //mail("$email", "Green Tomatoes Reservation", $msg, $headers);

    echo '<script>alert("Reservation Successful!")</script>';

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
      $query1 = "SELECT name, phoneNumber, address, city, state, zip, checkedIn, customerID FROM CUSTOMER WHERE emailAddress='$email'";
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
      $_SESSION['checkedIn'] = $row[6];
      $_SESSION['customerID'] = $row[7];

      $query2 = "SELECT transactionID FROM TRANSACTIONINFO WHERE customerID = $row[7] AND datePaid = (SELECT max(datePaid) FROM TRANSACTIONINFO WHERE customerID = $row[7])";
      $results2 = mysqli_query($db, $query2);
      $row2 = mysqli_fetch_array($results2);
      $_SESSION['transaction'] = $row2[0];
      $query3 = "SELECT stayLogID FROM RESERVATION WHERE transactionID = $row2[0]";
      $results3 = mysqli_query($db, $query3);
      $row3 = mysqli_fetch_array($results3);
      $_SESSION['stayLogID'] = $row3[0];

      header('location: index.php');
    } else {
      array_push($errors, "Wrong email/password combination");
    }
  }
}

if (isset($_GET['cancel'])) {
  $tid = $_SESSION['transaction'];
  $query = "UPDATE STAYLOG SET startDate='0000-00-00',endDate='0000-00-00' WHERE stayLogID = (SELECT stayLogID FROM RESERVATION WHERE transactionID = '$tid')";
  mysqli_query($db, $query);
  header("location: customerdash.php?cx");
}

if (isset($_GET['checkedIn'])) {
  $_SESSION['checkedIn'] = $_GET['checkedIn'];
  $chk = $_SESSION['checkedIn'];
  $cust = $_SESSION['customerID'];
  $query = "UPDATE CUSTOMER SET checkedIn='$chk' WHERE customerID = '$cust'";
  mysqli_query($db, $query);

  if ($chk == '0') {
    $msg = "A user has checked out!";
    $msg = wordwrap($msg, 70);
    $headers = 'From: scademail@web1.paulmickey.com';
    mail("greentomatoes@thayn.me", "Green Tomatoes - Front Desk Alert", $msg, $headers);
    header("location: customerdash.php?c0");
  }
  if ($chk == '1') {
    $msg = "A user has checked in!";
    $msg = wordwrap($msg, 70);
    $headers = 'From: scademail@web1.paulmickey.com';
    mail("greentomatoes@thayn.me", "Green Tomatoes - Front Desk Alert", $msg, $headers);
    header("location: customerdash.php?c1");
  }
}
?>
