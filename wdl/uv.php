<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "uv84";
$dbname = "dbms";



if (isset($_SESSION["id"])){

  if(!empty($_SESSION["cart"])){
    $total = 0;
    foreach ($_SESSION["cart"] as $key => $value) {
  
       $product_name = $value["item_name"];
       $product_price= $value["product_price"];
       $user_id= $_SESSION["id"] ;
       $product_quantity= $value["item_quantity"];
       $conn = new mysqli($servername, $username, $password, $dbname);
       // Check connection
       if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
       }
       
       $sql = "INSERT INTO user_orders (user_id,product_name ,product_price ,product_quantity)
       VALUES ('$user_id', '$product_name', '$product_price', '$product_quantity')";
       
       if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
         #header("Location:signin.php");
       } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
       }
       
       }
    }
  }
  else {
    echo "plz sign in";
  }
 



?>
<!DOCTYPE html>
<html>
<body>
<?php

?>

</body>
</html>