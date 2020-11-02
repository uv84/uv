<?php

$data = $_POST;
$name = $_POST['name'];
$email = $_POST['email'];
$password1 = $_POST['password'];


$servername = "localhost";
$username = "root";
$password = "uv84";
$dbname = "dbms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user_details (name, email, password)
VALUES ('$name', '$email', '$password1')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location:signin.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
