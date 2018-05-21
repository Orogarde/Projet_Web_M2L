<?php
function Connex($nom,$mdp) // return true si il y a un résultat qui correspond entre les valeurs du formulaire et les valeurs de la bdd
{   $dbh=connexion();
    $requete = "select count(*) from salarie where nom_Salarie = :nom and Mdp_Salarie = :mdp";
   
    $resultat = $dbh->prepare($requete);
    $resultat->BindValue(':nom',$nom);
    $resultat->BindValue(':mdp',$mdp);
    $execResultat = $resultat->execute();
    $tabResultat = $resultat->fetch();
  
    $access = false;
    if($tabResultat[0]==1)
    {
        $access = true;
       
    }
    else $access = false;
    
    return $access;
}


function redirection($cible) // permet une redirection de page
{
    
    header('Location:'.$cible, false);
}






function recupid($nom,$mdp) // recupération de l'id d'un salarie
{
    $dbh=connexion();
    $requete = "select id_Salarie from salarie where Mdp_Salarie = :mdp and nom_Salarie = :nom";
   
    $resultat = $dbh->prepare($requete);
    $resultat->BindValue(':nom',$nom);
    $resultat->BindValue(':mdp',$mdp);
    $tabResultat = $resultat->execute();
    $tabResultat = $resultat->fetch();
  

    return $tabResultat;

}

function recupidEquipe($nom,$mdp) // récupération de l'id d'une équipe
{
    $dbh=connexion();
    $requete = "select id_Equipe from salarie where Mdp_Salarie = :mdp and nom_Salarie = :nom";
   
    $resultat = $dbh->prepare($requete);
    $resultat->BindValue(':nom',$nom);
    $resultat->BindValue(':mdp',$mdp);
    $tabResultat = $resultat->execute();
    $tabResultat = $resultat->fetch();
  

    return $tabResultat;

}

function chef() // permet de savoir si c'est un chef d'équipe ou non
{
    $connexion = connexion();
    $requete = "select id_Salarie from equipe where id_Salarie = :id";
    $resultat = $connexion->prepare($requete);
    $resultat->BindValue(':id',$_COOKIE["moncookie"]);
    $execResultat = $resultat->execute();
    $tabResultat = $resultat->fetch();
    if ($tabResultat) return true;else return false;
}

?>