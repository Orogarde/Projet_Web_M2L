<?php    

    function connexion() { // fonction permettant la connexion à la base de données 
    
    $host="localhost";
    $dbname="M2L";
    $utilisateur="root";
    $mdp="";
	// fonction pour automatiser la connexion à un serveur de base de données
	$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $utilisateur, $mdp)
            or die ("Attention, problème de connexion serveur");
            
	
	return $pdo;
	
}

 
     function IdetnomFormation()  // fonction permettant de retourner une phrase avec l'id et le nom d'une formation 
                                // dans chaque ligne de la liste
    {

      $pdo = connexion();
       
         $requete = "select * from formation order by id_Formation";
        

         $execRequete = $pdo->query($requete);
       
     
        $data = $execRequete->fetchAll();
 
         foreach ($data as $valeur) {
          
       

            echo "<a class='list-group-item list-group-item-action '>"."Formation ".$valeur['id_Formation']." : ".$valeur['contenu_formation']." (voir détails)"."</a>";
    }
 
      
 
     
    }
     
 
 
 
 ?> 