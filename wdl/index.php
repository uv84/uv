<?php
    session_start();
    $database_name = "dbms";
    $con = mysqli_connect("localhost","root","uv84",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="index.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="index.php"</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<title>wdl</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');
        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{

          border: 1px solid #eaeaec;
          margin: -1px 19px 3px -1px;
          padding: 10px;
          text-align: center;
          background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .w3-sidebar a {
    font-family: "Roboto", sans-serif
  }

  body,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  .w3-wide {
    font-family: "Montserrat", sans-serif;
  }
</style>

<body class="w3-content" style="max-width:1200px">

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
      <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
      <h3 class="w3-wide"><b>BUG</b></h3>
    </div>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
      <a href="http://localhost/wdl/index.php" class="w3-bar-item w3-button">Home</a>
      <a href="http://localhost/wdl/account.php" class="w3-bar-item w3-button">Account</a>
      <a href="http://localhost/wdl/orders.php" class="w3-bar-item w3-button">Your Oders</a>
      <a href="http://localhost/wdl/mycart.php" class="w3-bar-item w3-button">My Cart</a>
      <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding"
      onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a>
    <a href="#footer" class="w3-bar-item w3-button w3-padding">Subscribe</a>
  </nav>

  <!-- Top menu on small screens -->
  <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-padding-24 w3-wide">BUG</div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i
        class="fa fa-bars"></i></a>
  </header>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu"
    id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:250px">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Top header -->
    <header class="w3-container w3-xlarge">
      <p class="w3-left">Home</p>
      <p class="w3-right">
        <a href="http://localhost/wdl/mycart.php">
        <i class="fa fa-shopping-cart w3-margin-right"></i>
        <?php
        
        if(isset($_SESSION["name"])) { 

          echo   "Hi " . $_SESSION["name"] . " !" ;
        }
        else {
          echo '<a href="account.php"><span>Login/Register</span></a></li>';
        }
        ?>
      </p>
    </header>

    <!-- Product grid -->
    <div class="container" style="width: 100%" >
        <?php
            $query = "SELECT * FROM website_items ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-4" style="background-color:white;">

                        <form method="post" action="mycart.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["img"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["name"]; ?></h5>
                                <h5 class="text-danger"><?php echo "₹" . $row["price"]; ?></h5>
                                <input type="text" name="quantity"  value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>













    <!-- Subscribe section -->

    <!-- Footer -->
    <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
      <div class="w3-row-padding">
        <div class="w3-col s4">
          <h4>Contact</h4>
          <p>Questions? Go ahead.</p>
          <form action="http://localhost/wdl/action_page.php" method="post">
            <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
            <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
            <button type="submit" class="w3-button w3-block w3-black">Send</button>
          </form>
        </div>

        <div class="w3-col s4">
          <h4>About</h4>
          <p><a href="#">About us</a></p>
          <p><a href="#">We're hiring</a></p>
          <p><a href="#">Support</a></p>
          <p><a href="#">Find store</a></p>
          <p><a href="#">Shipment</a></p>
          <p><a href="#">Payment</a></p>
          <p><a href="#">Gift card</a></p>
          <p><a href="#">Return</a></p>
          <p><a href="#">Help</a></p>
        </div>

        <div class="w3-col s4 w3-justify">
          <h4>Store</h4>
          <p><i class="fa fa-fw fa-map-marker"></i> BUG</p>
          <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
          <p><i class="fa fa-fw fa-envelope"></i> BUG@Gmail.com</p>
          <h4>We accept</h4>
          <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
          <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
          <br>
          <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
          <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
          <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
          <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
          <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
          <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
        </div>
      </div>
    </footer>

  <!-- Newsletter Modal -->
  <form action="http://localhost/wdl/newsletter.php" method="POST">
    <div id="newsletter" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
      <div class="w3-container w3-white w3-center">
        <i onclick="document.getElementById('newsletter').style.display='none'"
          class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
        <h2 class="w3-wide">NEWSLETTER</h2>
        <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
        <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" name="email"></p>
        <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
          onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
      </div>
    </div>
  </div>
  </from>

  <script>


    // Open and close sidebar
    function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
      document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
      document.getElementById("myOverlay").style.display = "none";
    }
  </script>

</body>

</html>
