<?php
function Connex($nom,$mdp) 
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


function redirection($cible) {
    
    header('Location:'.$cible, false);
}

function deco()
{
    setcookie("moncookie","",time()-3600);
}


function recupid($nom,$mdp)
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

function recupidEquipe($nom,$mdp)
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

?>