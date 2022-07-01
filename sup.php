
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
    <link rel="stylesheet" href="market.css">
    
    <style>
        a{
            color:red;
            border-color:red;
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

  echo "<br><center><a style='color:red; border-color:red;' href='".$_SERVER['PHP_SELF']."?sup=".$value['numArt']."' name='acheter'>Supprimer</a></center>";
  echo "</article>";
}


?>
</section>



<?php
  if (isset($_GET['sup'])) {
    $user="WKqqskzOJ5";
    $password="HUNByhOWMK";
    $DB=new PDO("mysql:host=remotemysql.com;dbname=WKqqskzOJ5",$user,$password);
    $proSup=$_GET['sup'];
  
    $sup=$DB->prepare("DELETE FROM `article` WHERE numArt=$proSup");
    if ($sup->execute()) {
      header("Location:sup.php");
      }else{
          echo "<div class='alert alert-danger m-5 text-center'>erorr</div>";
      }
   
  }
?>


</body>
</html>