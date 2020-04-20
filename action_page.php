<?php
$servername = "localhost";
$username = "scaduser";
$password = "GoAsim1!";
$dbname = "green-tomatoes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$email = $psw = $psw-rpt = "";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connection Successful";
}

$emailErr = "";

if (isset($_POST['submit'])) {
	$email = test_input($_POST["email"]);
	if(!filter_var($myEmail, FILTER_VALIDATE_EMAIL)){
		$emailErr = "Invalid email format";
	}
	$psw = test_input($_POST["psw"]);
} else {
	echo "Post failed";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "INSERT INTO LOGIN (emailAddress, isAdmin, password)
VALUES ('$email', '0', '$psw')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>