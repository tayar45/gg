<?php
session_start();
if ($_SESSION['admin']!=TRUE) {
  header('Location:Loginadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAYARShopping</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist\css\bootstrap.min.css">
    <style>
        body{
            background:url(bgAdmin.jpg);
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
    
        margin: 0;
        font-family: 'Raleway', sans-serif;
        }
    nav{
      display: flex;
      justify-content: space-between;
      align-content: center;
      background: white;
      height: 50px;
      width: 100%;
      box-shadow: 0 0 5px;
    }
    nav img{
      width:70px;
    }
    .menu{
    text-align:right;
    }
    .menu li{
    color:black;
    display:inline;
    margin:0px 10px;
    text-transform:uppercase;
    position:relative;
    }
    .menu li::after {
    content: '';
    height:3px;
    width:0;
    background-color:#FFF100;
    position:absolute;
    left:0;
    bottom:-6px;
    transition:0.5s;
    }
    .menu li a{
      text-decoration: none;
      color: #171717;
    }
    .menu li:hover::after{
      width:100%;
    }
    </style>
</head>
<body>
<nav>
  <img src="Picsart_22-06-28_01-38-33-013.png" alt="logo" />
  	<ul class="menu">
  	  <li><a href="Home.php">Home</a></li>
  	  <li><a href="admin.php">Admin</a></li>
  	  <li><a href="market.php">Market</a></li>
      <?php
       if (isset($_SESSION['admin'])) {
        echo "<li><a href='".$_SERVER['PHP_SELF']."?deconecter'>Deconect Admin</a></li>";
        if (isset($_GET['deconecter'])) {
          session_destroy();
          header("Location:Home.php");
        }
       }
      ?>
  	</ul>
    
</nav>

<section class="container m-5">
<center>
<div class="btn-group" role="group" aria-a="Basic checkbox toggle button group">
  <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
  <a href="adminAjou.php" class="btn btn-info p-5 border" for="btncheck1">Ajouter produit</a>

  <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
  <a href="sup.php" class="btn btn-info p-5 border" for="btncheck2">Supprimer produit</a>

  <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
  <a href="commande.php" class="btn btn-info p-5 border" for="btncheck3">Commandes</a>
</div>
</center>
</section>

</body>
</html>