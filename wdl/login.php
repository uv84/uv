
<?php
session_start();
$message="";
if(count($_POST)>0) {
 $con = mysqli_connect('127.0.0.1:3306','root','uv84','dbms') or die('Unable To connect');
$result = mysqli_query($con,"SELECT * FROM user_details WHERE user_name='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["id"] = $row['id'];
$_SESSION["name"] = $row['name'];
} else {
$message = "Invalid Username or Password!";
}
}
if(isset($_SESSION["id"])) {
header("Location:index.php");
}
?>

<?php


$data = $_POST;

#var_dump($_POST);
$loginname = $_POST['loginname'];
#echo $loginname ;
$password = $_POST['loginpassword'];
// Check the correct login (for example with a database)

    $_SESSION['username'] = $loginname;
    $_SESSION['logged'] = true;
    echo $_SESSION["username"] ;
    header("location: index.php");
?>

</body>
</html>
