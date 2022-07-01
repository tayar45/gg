<?php
session_start();
if ($_SESSION['admin']!=TRUE) {
  header('Location:admin.php');
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
    <link rel="stylesheet" href="admin.css">
    

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
<section class="container partAjouter">
      
  <form class="form-control" method="POST" enctype="multipart/form-data">
      <input class="form-control m-2" type="text" placeholder="Libelle article" name="libart" required >
      <input class="form-control m-2" type="number" placeholder="Qte Stock" name="QteStock" required >
      <label for="image" class="form-control m-2 btn btn-success">image de produit</label> <input style="display:none;" type="file" name="image" id="image" accept="image/png, image/gif, image/jpeg">
      <input class="form-control m-2 btn btn-outline-info" type="submit" value="Ajouter" name="ajouter">
</form>
</section>



<?php
  $user="WKqqskzOJ5";
  $password="HUNByhOWMK";
  $DB=new PDO("mysql:host=remotemysql.com;dbname=WKqqskzOJ5",$user,$password);
  if(isset($_POST["ajouter"])){
    $libart=$_POST["libart"];
    $QteStock=$_POST["QteStock"];
    $image=$_FILES['image'];
    $image_location=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];
    $image_up="images/".$image_name;
    $ajout=$DB->prepare("INSERT INTO article VALUES (DEFAULT,'$libart','$QteStock','$image_up')");
   
    if( $ajout->execute() && move_uploaded_file($image_location,'images/'.$image_name)){
      echo "<div class='alert alert-success m-5 text-center'>l'ajout est bien reçu</div>";
    }
    else{
      echo "<div class='alert alert-danger m-5 text-center'>erorr</div>";
    }
  }
 
?>


</body>
</html>