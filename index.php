<?php
  session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TYRShop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="Ajoute.css" type="text/css" media="all" />
       
</head>
<body>
<nav>
  <img src="Picsart_22-06-28_01-38-33-013.png" alt="logo" />
  	<ul class="menu">
  	  <li><a href="Home.php">Home</a></li>
  	  <li><a href="admin.php">Admin</a></li>
  	  <li><a href="market.php">Market</a></li>

      <?php
       if (isset($_SESSION['user'])) {
        echo "<li><a href='".$_SERVER['PHP_SELF']."?deconecter'>Deconecter</a></li>";
        if (isset($_GET['deconecter'])) {
          session_destroy();
          header('Location:Home.php');
        }
       }
      ?>

  	</ul>
</nav>

<!--1er part-->
<section class="premierePart">
  <img src="women-shopping.png" alt="women" />
  <div>
    <h2>TAYARSHOPPING</h2>
    <p>Follow our shopping page – you will find the best products here</p>
  <button type="button" onclick="window.location.href = 'market.php'">Market</button>
  </div>
</section>


</body>

</body>
</html>
