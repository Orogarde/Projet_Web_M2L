<?php
function Connex($id,$mdp) 
{   $dbh=connexion();
    $requete = "select count(*) from salarie where id_Salarie = :id and Mdp_Salarie = :mdp";
   
    $resultat = $dbh->prepare($requete);
    $resultat->BindValue(':id',$id);
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
?>