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
       
        $requete = 'INSERT INTO `participer` (`id_Salarie`, `id_Formation`, `statuts`) VALUES (:id, :forma, 2)';       
        $PrepRequete = $connexion->prepare($requete);
        $PrepRequete->bindValue(':forma',$_POST["idFormation"]);
        $PrepRequete->bindValue(':id',$_POST["idS"]);
       
       $execPrepRequete = $PrepRequete->execute();
    
       
        $url = "../index3.php";
        echo 'redui';
        redirection($url);
        
    
  

?>
</body>
</html>
