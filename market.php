<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location:signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAYARShopping</title>
    <link rel="stylesheet" href="market.css">

</head>
<body>
<nav>
  <img src="Picsart_22-06-28_01-38-33-013.png" alt="logo" />
  	<ul class="menu">
      
  	  <li><a href="Home.php">Home</a></li>
  	  <li><a href="admin.php">Admin</a></li>
  	  <li><a href="market.php">Market</a></li>
      <?php
        echo "<li><a href='".$_SERVER['PHP_SELF']."?deconecter'>Deconecter</a></li>";
        if (isset($_GET['deconecter'])) {
          session_destroy();
          header('Location:Home.php');
        }
      ?>
  	</ul>
</nav>

<section>
<?php
  $user="WKqqskzOJ5";
  $password="HUNByhOWMK";
  $DB=new PDO("mysql:host=remotemysql.com;dbname=WKqqskzOJ5",$user,$password);
$select=$DB->prepare("SELECT * FROM article");
$select->execute();
foreach ($select as $key => $value) {
  echo '<article>';
  echo '<div class="produit" style="background-image: url('.$value['image'].');background-position: center;background-size: cover;">';
  echo '<div style="background: rgb(143, 143, 143);">';
  echo  '<h2>'.$value['libart'].'</h2>';
  echo '</div>';
  echo '</div>';

  echo "<br><center><a href='".$_SERVER['PHP_SELF']."?achat=".$value['numArt']."' name='acheter'>Acheter</a></center>";
  echo "</article>";
}
if(isset($_GET['achat'])){
   $_SESSION['achat']=$_GET['achat'];
   header('Location:pageAchat.php');
}

?>
</section>

</body>
</html>