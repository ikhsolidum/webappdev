<?php
$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';
?>
<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
 <?php 
}else{
     header("Location: loginpage.php");
     exit();
}


 ?>
<html>
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
          h1 {
            color: white;
          }
          body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: brown;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

body {
  background-image: url('homebackground.png');
}
            </style>
            
    </head>
    
    <body>
    <div class="topnav" id="myTopnav">
  <a href="index.php?page=home" class="active">Home</a>
  <a href="index.php?page=products">Products</a>
  <a href="index.php?page=order">Order</a>
  <a href="Logout.php">Logout</a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
<?php
      switch($page){
                case 'home':
                    require_once 'index.php';
                break; 
                case 'products':
                    require_once 'products.php';
                break; 
                case 'order':
                    require_once 'order.php';
                break;

                default:
                    require_once 'navigationbar.php';
                break; 
            }
    ?>
		
</script>
</body>

</html>