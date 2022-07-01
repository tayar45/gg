
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
             /****menu****/
    body{
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



<section class="container mt-4">
    <table class="table table-striped">
        <tr>
            <th>Qte commande</th>
            <th>Num commande</th>
            <th>date commande</th>
            <th>Id Client</th>
            <th>Nom Client</th>
            <th>adresse Client</th>
            <th>Num article</th>
            <th>libelle article</th>
            <th>Qte Stock</th>
            <th>image</th>
            
        </tr>
       <?php
              $user="WKqqskzOJ5";
              $password="HUNByhOWMK";
              $DB=new PDO("mysql:host=remotemysql.com;dbname=WKqqskzOJ5",$user,$password);
            $select=$DB->prepare("SELECT C.qteCom, Co.numCom, Co.dateCom,Cl.idCli, Cl.nomCli, Cl.adCli, A.*  FROM comporter C, commande Co, client Cl, article A WHERE Cl.idCli=Co.idCli and Co.numCom=C.numCom and A.numArt=C.numArt");
            $select->execute();
            foreach ($select as $key => $value) {
             
            ?>
            <tr>
            
            <td><?=$value['qteCom']?></td>
            <td><?=$value['numCom']?></td>
            <td><?=$value['dateCom']?></td>
            <td><?=$value['idCli']?></td>
            <td><?=$value['nomCli']?></td>
            <td><?=$value['adCli']?></td>
            <td><?=$value['numArt']?></td>
            <td><?=$value['libart']?></td>
            <td><?=$value['qteStock']?></td>
            <td><img src="<?=$value['image']?>" height="60px"></td>



        </tr>
        <?php
            } 
       ?>
        
    </table>
</section>

</body>
</html>