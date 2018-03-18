
<?php    

function AfficherFormationE()
{
 $data= SelectFormationEquipe($_COOKIE["moncookie"]);


     foreach ($data as $valeur) {
       
          
         echo 
         "<a class='list-group-item list-group-item-action view overlay' id='listF' data-toggle='collapse' 
             href='#".$valeur['id_Salarie'].$valeur['id_Formation']."
             'aria-expanded='false' aria-controls='collapseExample'>".
             $valeur['nom_Salarie']." veut suivre la ".
             "  Formation ".$valeur['id_Formation']." : ".$valeur['intitule_formation']."
             <i class='fa fa-arrow-circle-o-down' aria-hidden='true'></i>
             <div class='mask flex-center rgba-black-strong'>
             <p>changer le statut de la formation ".$valeur['intitule_formation']." de ". $valeur['nom_Salarie']."</p>
         </div></a>"
             ;



         echo "<div class='collapse ' id='".$valeur['id_Salarie'].$valeur['id_Formation']."'>
        
                 <div class='card card-body espace'>";
             
             ?>
                     <form action="vues/up-statut-1.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                     <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                     <input type="hidden" name="idS" value="<?php echo $valeur['id_Salarie'];?>">
                             <input type="submit" class="btn btn-outline-white waves-effect" value="Accepter cette formation">
                     </form>
                     <form action="vues/delete-statut.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                     <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                     <input type="hidden" name="idS" value="<?php echo $valeur['id_Salarie'];?>">
                             <input type="submit" class="btn btn-outline-white waves-effect" value="Refuser cette formation">
                     </form>
           <?php                                     
                echo "</div>
             </div>";

                          }

     
                          

  
 }

 
   function AfficherFormation()
   {
    $data= SelectFormation();
   
   
        foreach ($data as $valeur) {
            if (!verifetat($valeur['intitule_formation'])) 
            
          {
             
            echo 
            "<a class='list-group-item list-group-item-action view overlay' id='listF' data-toggle='collapse' 
                href='#".$valeur['id_Formation']."
                'aria-expanded='false' aria-controls='collapseExample' >".
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
                        <form action="vues/insert-statut.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                        <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                        <input type="hidden" name="idS" value="<?php echo $_COOKIE["moncookie"];?>">
                              <input type="submit" class="btn btn-outline-white waves-effect" onclick="toastr.success('Hi! I am success message.')" value="S'inscrire à cette formation">
                                

                        </form>
              <?php                                     
                   echo "</div>
                </div>";

                             }
                            }
 
        
             
 
     
    }
    function AfficherFormationAdmin()
    {
     $data= SelectFormation($_COOKIE["moncookie"]);
    
 
         foreach ($data as $valeur) {
          if (!verifetat($valeur['intitule_formation'])) 
          {
              
            echo 
            "<a class='list-group-item list-group-item-action view overlay' id='listF' data-toggle='collapse' 
                href='#".$valeur['id_Formation']."
                'aria-expanded='false' aria-controls='collapseExample' ".">".
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
                         <form action="vues/insert-statut-chef.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                         <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                         <input type="hidden" name="idS" value="<?php echo $_COOKIE["moncookie"]?>">
                                 <input type="submit" class="btn btn-outline-white waves-effect" value="S'inscrire à cette formation">
                         </form>
               <?php                                     
                    echo "</div>
                 </div>";
 
                              }
                            }
         
                              
  
      
     }


    function AfficherFormationSAdmin()
    {
 
        $data= nomFormationV($_COOKIE["moncookie"]);
 
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
                             <form action="pdf.php" method="POST">
                             <button type="submit" name="id_forma" id='idFormation' class="btn btn-outline-white waves-effect" value=<?php echo $valeur['id_Formation'] ?>>PDF</button>
                       </form>
                          <form action="vues/up-historique-chef.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                          <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                          <input type="hidden" name="idS" value="<?php echo $valeur['id_Salarie'];?>">
                                <input type="submit" class="btn btn-outline-white waves-effect" value="Classer la Formation">
                          </form>
                <?php                                     
                     echo "</div>
                  </div>";
  
                               }
                
        $data= nomFormationEnatt($_COOKIE["moncookie"]);
        
               foreach ($data as $valeur) {
                   
                      
                     echo 
                     "<a class='list-group-item list-group-item-action view overlay' id='listF' data-toggle='collapse' 
                         href='#".$valeur['id_Formation']."
                         'aria-expanded='false' aria-controls='collapseExample'>".
                         "  Formation ".$valeur['id_Formation']." : ".$valeur['intitule_formation']."<span class='att'> en attente de validation </span>"."
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
                           
                       <?php                                     
                            echo "</div>
                         </div>";
         
                                      }
         
                              
  
      
     }

     function AfficherFormationS()
     {
  
         $data= nomFormationV($_COOKIE["moncookie"]);
  
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
                               <form action="pdf.php" method="POST">
                               <button type="submit" name="id_forma" id='idFormation' class="btn btn-outline-white waves-effect" value=<?php echo $valeur['id_Formation'] ?>>PDF</button>
                         </form>
                           <form action="vues/up-historique.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                           <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                           <input type="hidden" name="idS" value="<?php echo $valeur['id_Salarie'];?>">
                                 <input type="submit" class="btn btn-outline-white waves-effect" value="Classer la Formation">
                           </form>
                 <?php                                     
                      echo "</div>
                   </div>";
   
                                }
                                $data= nomFormationEnatt($_COOKIE["moncookie"]);
                                
                                       foreach ($data as $valeur) {
                                           
                                              
                                             echo 
                                             "<a class='list-group-item list-group-item-action view overlay' id='listF' data-toggle='collapse' 
                                                 href='#".$valeur['id_Formation']."
                                                 'aria-expanded='false' aria-controls='collapseExample'>".
                                                 "  Formation ".$valeur['id_Formation']." : ".$valeur['intitule_formation']."<span class='att'> en attente de validation </span>"."
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
                                                   
                                               <?php                                     
                                                    echo "</div>
                                                 </div>";
                                 
                                                              }
                                 

                            }
                            function historique()
                            {
                         
                                $data= Selecthisto($_COOKIE["moncookie"]);
                         
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
                         <form action="./pdf.php" method="POST">
                         <button type="submit" name="id_forma" id='idFormation' class="btn btn-outline-white waves-effect" value=<?php echo $valeur['id_Formation'] ?>>PDF</button>
                   </form>
                                                 
                                        <?php                                     
                                             echo "</div>
                                          </div>";
                          
                                                       }

                                                    }
                                                  
  
     
 
 
 
 ?> 