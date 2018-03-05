<!DOCTYPE html>
<?php include_once ("Vues/AfficherFormation.php") ?>
<?php include_once ("DataAccess/formation.php") ?>
<?php include_once ("Vues/connexionSite.php") ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/b8a3d61bd6.js"></script> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Style\css\bootstrap.css" >
   <link rel="stylesheet" href="Style\css\row.css" > 
    <script src="Javascript\js\bootstrap.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="Style/css/mdb.min.css" rel="stylesheet"> 
    <title>Maison Des Ligues</title>
</head>
<body>
  <?php 


if(!isset($_COOKIE["moncookie"]))
{
    $url = "Pageconnexion.php";
    redirection($url);
    exit();
}

    

  include_once("Vues\header.php"); // ajout à l'aide du php de l'header 

  include_once("Vues\landing.1.php") ;

  include_once("Vues\landing.2.php") // ajoutà l'aide du php de la landing page (liste des formations)

  ?>
  
  
		
		
   
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    
    <script type="text/javascript" src="js/popper.min.js"></script>
   
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="js/mdb.min.js"></script>
	<script>
            new WOW().init();
    </script>  
</body>
</html>