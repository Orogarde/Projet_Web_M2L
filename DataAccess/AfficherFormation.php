<?php    

  

 
   function AfficherFormation()
   {

    $data= SelectFormation();

        foreach ($data as $valeur) {
          
       

            echo 
            "<a class='list-group-item list-group-item-action' id='listF' data-toggle='collapse' href='#".$valeur['id_Formation']."
            'aria-expanded='false' aria-controls='collapseExample'>".
            "  Formation ".$valeur['id_Formation']." : ".$valeur['intitule_formation']."
              <i class='fa fa-arrow-circle-o-down' aria-hidden='true'></i></a>";



            echo "<div class='collapse' id='".$valeur['id_Formation']."'>
                <div class='card card-body'>"."Texte explicatif : </span>".$valeur['contenu_formation'].
                "<div class='espace'>La formation commence le :".$valeur['Date_formation']."</div>
                <div class='espace'> La formation a lieu à :  ".$valeur['lieu_formation']."</div>
                <div class='espace'> La durée de la formation est :  ".$valeur['Duree_formation']."</div>
                <div class='espace'> La formation à lieu pendant :  ".$valeur['NbrJour_formation']." jours </div>
                <div class='espace'> Autre (prérequis) :  ".$valeur['prerequis_formation']."</div>
                
            
                <button type='button' class='btn btn-secondary'>Imprimer</button>
                </div>
            </div>";	
                             }
 
      
 
     
    }

  



  
     
 
 
 
 ?> 