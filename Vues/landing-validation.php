<?php if(chef()) { ?>

<div class="container"> <!-- création d'un container pour les listes de formations   -->
	
<div class="row" id="landing" >

	  
      <div class="col-md-12 " id="FS"> <!-- liste des formations en attentes de validations -->
		<?php	$nn = nomEquipe($_COOKIE["moncookie"]); ?>

			<section ><h3 id="bb"> Formations de l'equipe  <?php echo $nn['Nom_Equipe']; ?>  en attentes de validation : </h3>
			
			<div class="list-group" id="lg">
            	 <?php      
                            
							AfficherFormationE();
					
					 ?>
				
			</section>
				
	</div>
<div class="col-md-2">
  
</div>


							

</div>
</div>
 <?php } ?>