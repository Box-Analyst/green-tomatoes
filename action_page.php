<html>
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
}

$emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = test_input($_POST["email"]);
	if(!filter_var($myEmail, FILTER_VALIDATE_EMAIL)){
		$emailErr = "Invalid email format";
	}
	$psw = test_input($_POST["psw"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "INSERT INTO LOGIN (emailAddress, isAdmin, password)
VALUES ('$email', false, '$psw')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</html>