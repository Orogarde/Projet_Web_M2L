<?php    

  

 
   function AfficherFormationE()
   {
    $data= SelectFormationEquipe($_COOKIE["moncookie"]);
   

        foreach ($data as $valeur) {
          
             
            echo 
            "<a class='list-group-item list-group-item-action view overlay' id='listF' data-toggle='collapse' 
                href='#".$valeur['id_Formation']."
                'aria-expanded='false' aria-controls='collapseExample'>".
                "  Formation ".$valeur['id_Formation']." : ".$valeur['intitule_formation']."
                <i class='fa fa-arrow-circle-o-down' aria-hidden='true'></i>
                <div class='mask flex-center rgba-black-strong'>
                <p>Voir la formation ".$valeur['intitule_formation']."</p>
            </div></a>"
                ;



            echo "<div class='collapse ' id='".$valeur['id_Formation']."'>
           
                    <div class='card card-body espace'>"."<p class='font-weight-bold'>Texte explicatif :</p> ".$valeur['contenu_formation']."
                        <span class='spanou'> </span>
                        <div class='espace'><p class='font-weight-bold'>La formation commence le :</p> ".$valeur['Date_formation']."</div>
                        <span class='spanou'> </span>
                        <div class='espace'><p class='font-weight-bold'> La formation a lieu à :</p>   ".$valeur['lieu_formation']."</div>
                        <span class='spanou'> </span>
                        <div class='espace'><p class='font-weight-bold'> La durée de la formation est : </p>  ".$valeur['Duree_formation']."</div>
                        <span class='spanou'> </span>
                        <div class='espace'> <p class='font-weight-bold'>La formation à lieu pendant : </p>  ".$valeur['NbrJour_formation']." jours </div>
                        <span class='spanou'> </span>
                        <div class='espace'> <p class='font-weight-bold'>Autre (prérequis) : </p>  ".$valeur['prerequis_formation']."</div>";
                
                ?>
                        <form action="vues/up.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                        <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                                <input type="submit" class="btn btn-outline-white waves-effect" value="S'inscrire à cette formation">
                        </form>
              <?php                                     
                   echo "</div>
                </div>";

                             }
 
        
                             
 
     
    }


    function AfficherFormationS()
    {
 
        $data= nomFormation($_COOKIE["moncookie"]);
 
        foreach ($data as $valeur) {
            
               
              echo 
              "<a class='list-group-item list-group-item-action view overlay' id='listF' data-toggle='collapse' 
                  href='#".$valeur['id_Formation']."
                  'aria-expanded='false' aria-controls='collapseExample'>".
                  "  Formation ".$valeur['id_Formation']." : ".$valeur['intitule_formation']."
                  <i class='fa fa-arrow-circle-o-down' aria-hidden='true'></i>
                  <div class='mask flex-center rgba-black-strong'>
                  <p>Voir la formation ".$valeur['intitule_formation']."</p>
              </div></a>";
  
  
  
              echo "<div class='collapse' id='".$valeur['id_Formation']."'>
                      <div class='card card-body espace'>"."<p class='font-weight-bold'> Texte explicatif : </p>".$valeur['contenu_formation']."
                        <span class='spanou'> </span>
                          <div class='espace '><p class='font-weight-bold'>La formation commence le :</p> ".$valeur['Date_formation']."</div>
                          <span class='spanou'> </span>
                          <div class='espace'><p class='font-weight-bold'> La formation a lieu à :</p>  ".$valeur['lieu_formation']."</div>
                          <span class='spanou'> </span>
                          <div class='espace'> <p class='font-weight-bold'>La durée de la formation est : </p> ".$valeur['Duree_formation']."</div>
                          <span class='spanou'> </span>
                          <div class='espace'><p class='font-weight-bold'> La formation à lieu pendant : </p> ".$valeur['NbrJour_formation']." jours </div>
                          <span class='spanou'> </span>
                          <div class='espace'> <p class='font-weight-bold'>Autre (prérequis) : </p> ".$valeur['prerequis_formation']."</div>";
                  
                  ?>
                          <form action="vues/up.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                          <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                                <input type="submit" class="btn btn-outline-white waves-effect" value="Imprimer le Pdf">
                          </form>
                <?php                                     
                     echo "</div>
                  </div>";
  
                               }
         
                              
  
      
     }

  



  
     
 
 
 
 ?> 