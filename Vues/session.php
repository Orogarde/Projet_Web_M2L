


<div class="container-fluid" > <!-- création d'un container pour l'header du site qui contient le logo ainsi que différents boutons -->
    <div class="row justify-content-center align-items-center" id="session"  >
    <div class="col "> <!-- logo de la maison des ligues -->
   
<?php 

$nom = nomSalarie($_COOKIE["moncookie"]); 
echo "session de ". $nom["nom_Salarie"] ;


?>


</div>
    </div>
  
</div>
<hr id="hr-">

