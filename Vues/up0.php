<!DOCTYPE html>
<?php
    include_once("../DataAccess/formation.php");
    include_once("connexionSite.php")
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
        $connexion = connexion();
       
        $requete = "update participer set statuts = '0' where participer.id_Salarie = :nom and participer.id_Formation = :id";        
        $PrepRequete = $connexion->prepare($requete);
        $PrepRequete->bindValue(':id',$_POST["idFormation"]);
        $PrepRequete->bindValue(':nom',$_POST["idS"]);
       
       $execPrepRequete = $PrepRequete->execute();
    
       
        $url = "../index3.php";
        echo 'redui';
        redirection($url);
        
    
  

?>
</body>
</html>
