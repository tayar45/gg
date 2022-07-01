<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="pageAchat.css">
</head>
<body style="background:#fbe551;">
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
        $achat=$_SESSION['achat'];
        $user="WKqqskzOJ5";
        $password="HUNByhOWMK";
        $DB=new PDO("mysql:host=remotemysql.com;dbname=WKqqskzOJ5",$user,$password);
        $select=$DB->prepare("SELECT * FROM article WHERE numArt=$achat");
        $select->execute();
        foreach ($select as $key => $value) {
            $QteStock=$value['qteStock'];
            $numArt=$value['numArt'];
    ?>
    <section>
    <form method="post" style="display: flex;justify-content: center;margin-top: 10px;">
        <div class="card" style="width: 20rem;">
            <img src="<?= $value['image'] ?>" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title"><?= $value['libart'] ?></h5>
            <h6 class="card-title">Qte : <?= $value['qteStock'] ?></h6>
            <input required class="form-control mt-2" type="number" placeholder="Qte commander" name="qteCom">
            <input required type="submit" class="btn btn-primary form-control mt-3" value="Acheter" name="acheter">
            </div>
        </div>
    </form>  
    </section>
    <?php
        }
        $user="WKqqskzOJ5";
        $password="HUNByhOWMK";
         $DB=new PDO("mysql:host=remotemysql.com;dbname=WKqqskzOJ5",$user,$password);
    if (isset($_POST["acheter"])) {
        if ($_POST["qteCom"]<$QteStock) {
            $idCli=$_SESSION['user'];
            $date=date("Y-m-d");
            $Qte=$_POST['qteCom'];
            $numCom=rand(0,9999);
            $insert1=$DB->prepare("INSERT INTO commande VALUES ('$numCom','$date','$idCli')");
            if($insert1->execute()){
                $DB=new PDO("mysql:host=remotemysql.com;dbname=WKqqskzOJ5",$user,$password);
                $insert2=$DB->prepare("INSERT INTO `comporter`(`numArt`, `numCom`, `qteCom`) VALUES ('$numArt',$numCom,'$Qte')");
                if ($insert2->execute()) {
                    $user="WKqqskzOJ5";
                    $password="HUNByhOWMK";
                    $DB=new PDO("mysql:host=remotemysql.com;dbname=WKqqskzOJ5",$user,$password);
                    $moinQte=$DB->prepare("UPDATE article SET qteStock=qteStock-$Qte WHERE numArt=$numArt");
                    if ($moinQte->execute()) {
                        echo "<div class='alert alert-success text-center m-4'>Achat réussi</div>";
                        header("Refresh:1");
                    }
                }
            }else {
                echo "<div class='alert alert-danger m-4'>ERORR</div>";
            }

        }else {
            echo "<div class='alert alert-danger m-4'>Qte commande plus grand</div>";
        }
    }



    ?>
</section>
</body>
</html>