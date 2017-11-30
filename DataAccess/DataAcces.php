<?php    

    function connexion() { // fonction permettant la connexion à la base de données 
    
    $host="localhost";
    $dbname="M2L";
    $utilisateur="root";
    $mdp="";
	// fonction pour automatiser la connexion à un serveur de base de données
	$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $utilisateur, $mdp,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'))
            or die ("Attention, problème de connexion serveur");
            
	
	return $pdo;
	
}

 
     function IdetnomFormation()  // fonction permettant de retourner une phrase avec l'id et le nom d'une formation 
                                // dans chaque ligne de la liste ainsi que l'affichage à l'aide d'un collapse de la description de la formation
    {

      $pdo = connexion();
       
         $requete = "select * from formation order by id_Formation";
        

         $execRequete = $pdo->query($requete);
       
     
        $data = $execRequete->fetchAll();
 
         foreach ($data as $valeur) {
          
       

            echo 
            "<a class='list-group-item list-group-item-action' id='listF' data-toggle='collapse' href='#".$valeur['id_Formation']."
            'aria-expanded='false' aria-controls='collapseExample'>".
            "  Formation ".$valeur['id_Formation']." : ".$valeur['intitule_formation']."  <i class='fa fa-arrow-circle-o-down' aria-hidden='true'></i></a>
            <div class='collapse' id='".$valeur['id_Formation']."'>
                <div class='card card-body'>"."<span style='text-decoration:underline;'>texte explicatif : </span>".$valeur['contenu_formation'].
                "<br><hr color='black'><br><span style='text-decoration:underline;'> la formation commence le : </span> ".$valeur['Date_formation']."
                <br><hr  color='black'><br><span style='text-decoration:underline;'> la formation a lieu à : </span> ".$valeur['lieu_formation']."
                <br><hr  color='black'><br><span style='text-decoration:underline;'> la durée de la formation est : </span> ".$valeur['Duree_formation']."
                <br><hr  color='black'><br><span style='text-decoration:underline;'> la formation à lieu pendant : </span> ".$valeur['NbrJour_formation']." jours
                <br><hr  color='black'><br><span style='text-decoration:underline;'> autre (prérequis) : </span> ".$valeur['prerequis_formation']."
                <button type='button' class='btn btn-secondary'>Imprimer</button>
                </div>
            </div>";	
    }
 
      
 
     
    }



  
     
 
 
 
 ?> 