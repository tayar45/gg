<?php
session_start()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAYARShopping</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist\css\bootstrap.min.css">
    <style>
        /****menu****/
    body{
    margin: 0;
    background-color:#ffc107;
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
  	</ul>
    
</nav>

<section>
<form class="form-control mt-5 container"  method="POST">
      <center><h1>PAGE ADMIN</h1></center>
      <input id="id" class="mt-4 form-control border-0 border-bottom border border-dark rounded-0" type="text" name="id" required>
      <label for="id">Identifiant</label>
      
      <input id="password" class="mt-4 form-control border-0 border-bottom border border-dark rounded-0" type="password" name="password" required>
      <label for="password">Password</label>

      <input class="form-control btn btn-warning mt-4" type="submit" value="Sing in" name="singin" >
</form>
</section>

<?php
    $user="WKqqskzOJ5";
    $password="HUNByhOWMK";
    $DB=new PDO("mysql:host=remotemysql.com;dbname=WKqqskzOJ5",$user,$password);
    if(isset($_POST['singin'])){
       $id=$_POST['id'];
       $password=$_POST['password'];
       $select=$DB->prepare("SELECT `id`, `pass` FROM `admin`");
       $select->execute();
       foreach ($select as $key => $value) {
           if($value['id']==$id && $value['pass']==$password){
               header("Location:adminAjou.php");
               $_SESSION['admin']=TRUE;
           }else {
               echo "<div class='alert alert-danger m-4'>identifiant ou password erroné</div>";
           }
       }
    }

?>
</body>
</html>