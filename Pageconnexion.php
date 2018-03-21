<?php include_once ("DataAccess/connexionSite.php") ?>
<?php include_once ("DataAccess/formation.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://use.fontawesome.com/b8a3d61bd6.js"></script>
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<link rel="stylesheet" href="Style\css\bootstrap.css" >
<link rel="stylesheet" href="Style\css\row.css" > 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="Style/css/mdb.min.css" rel="stylesheet"> 
<script src="Javascript\js\bootstrap.js"></script>

<title>Connexion M2L</title>
</head>
<body>
<?php

setcookie("moncookie","",time()-3600);

include_once("Vues\header-connexion.php");
?>
<div class="container">
    <div class="row d-flex justify-content-center">
    <div class="col-md-12  d-flex justify-content-center">
    </div>
        <div class="col-md-12  d-flex justify-content-center">
    <form id="form1" name="form1" action="" method="POST" enctype="multipart/form-data" >
            <table id="cox" >
                            <tr>
								<td><label for="prenom">Votre Login : </label></td>
								<td><input type="text" id="prm" name="identifiant" size="25" placeholder="Login..." maxlength="50" /></td>
							</tr>							
							<tr>
								<td><label for="nom">Votre mdp : </label></td>
								<td><input type="password" id="nm" name="motdepasse" size="25" placeholder="mdp..." maxlength="50" required /></td>
							</tr>
                </table>
                            <div class="row justify-content-md-center">
                                <div class="col-12  d-flex justify-content-center" id="ich">
            <input  type="submit" id="smbt" name="oki" value=" connexion "/>
                </div>
            </div>
            
            </form>

         


     </div>
      </div>   
      <?php
				
                if (isset($_POST['oki']))
                {
                    $nom = $_POST['identifiant'];
                    $mdp = $_POST['motdepasse'];
                    if(Connex($nom, $mdp))
                        {
                            $id=recupid($nom,$mdp);
                           // $ud=recupidEquipe($nom,$mdp);
                           // echo $id['id_Salarie'];
                         //   if($id['id_Salarie'] == $ud['id_Equipe'])
                        //    {
                        //        setcookie("moncookie",$ud['id_Equipe']);
                          //      $url = "index-chef-equipe.php";
                          //      redirection($url);
                            //    exit(); 
                          //  }
                            //else
                            
                            setcookie("moncookie", $id['id_Salarie']);
                            $url = "index.php";
			                redirection($url);
                            exit();
                            
                            
                        }
                    else echo "<div class='col-md-5'>Vous avez rentré un mauvais login ou mot de passe.</div>";
	            }
                    ?>      
                    
                    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    
    <script type="text/javascript" src="js/popper.min.js"></script>
   
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="js/mdb.min.js"></script>
	<script>
            new WOW().init();
    </script>  
</body>


</html>