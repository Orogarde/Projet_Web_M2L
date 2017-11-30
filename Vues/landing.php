<div class="container"> <!-- création d'un container pour les listes de formations   -->
    <div class="row" id="landing" >
      <div class="col-md-1">
        <div class="row" > <!--  bouton pour imprimer une formation -->
        
		 <!--<input class="btn btn-primary" type="submit" value="Imprimer">-->
      </div>
	  </div>
	  
      <div class="col-md-4 " id="FS"> <!-- liste des formations suivies -->
 
			<section ><h3> Formations Suivies : </h3>
			
				<article>
					
					<p>
					Ut enim quisque sibi plurimum confidit et ut quisque maxime virtute et sapientia sic munitus est, ut nullo egeat suaque omnia in se ipso posita iudicet, ita in amicitiis expetendis colendisque maxime excellit. Quid enim? Africanus indigens mei? Minime hercule! ac ne ego quidem illius; sed ego admiratione quadam virtutis eius, ille vicissim opinione fortasse non nulla, quam de meis moribus habebat, me dilexit; auxit benevolentiam consuetudo. Sed quamquam utilitates multae et magnae consecutae sunt, non sunt tamen ab earum spe causae diligendi profectae.
					</p>
					<footer></footer>
        		</article>

			</section>	
	</div>
<div class="col-md-2">
  
</div>

<div class="col-md-4 " id="AF">
  
			<section><h3>Autre Formations :</h3> <!-- liste des formations  -->
				
					
					
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