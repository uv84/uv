<?php
session_start();
?>

<?php
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("location:index.php");
?>
