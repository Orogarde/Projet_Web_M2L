<div class="container-fluid"> <!-- création d'un container pour les listes de formations   -->
	
<div class="row" id="landing" >
  <!--    <div class="col-md-1">
        <div class="row" >--> <!--  bouton pour imprimer une formation -->
        
		 <!--<input class="btn btn-primary" type="submit" value="Imprimer">-->
    <!--  </div>
	  </div>-->
	  
      <div class="col-md-5 " id="FS"> <!-- liste des formations suivies -->
 
			<section ><h3 id="bb"> Formations Suivies : </h3>
			
			<div class="list-group" id="lg">
            	 <?php 

													AfficherFormationS();

													?>
				
			</section>
				
	</div>
<div class="col-md-2">
  
</div>

<div class="col-md-5 " id="AF">
  
			<section><h3 id="bb">Autre Formations :</h3> <!-- liste des formations  -->
				
					
					
				<div class="list-group" id="lg">
            	 <?php 

													AfficherFormation();
							
						//	$tab = requprep(2);
						//	foreach ($tab as $lign ) {
						//		echo $lign["id_Formation"];}

							 // appel de la fonction qui renvoie une phrase dans une ligne de la liste
									 // l'id et le nom d'une formation			
													?>
                            
                    
               
        
			</section>

        

       
</div>
        

       
</div>
</div>
</div>