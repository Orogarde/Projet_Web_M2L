<?php include_once ("Vues/connexionSite.php") ?>
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

<script src="Javascript\js\bootstrap.js"></script>

<title>Document</title>
</head>
<body>
<?php

setcookie("moncookie","",time()-3600);

include_once("Vues\header.php");
?>
<div class="container">
    <div class="row">
    <div class="col-md-4">
    </div>
        <div class="col-md-5">
    <form id="form1" name="form1" action="" method="POST" enctype="multipart/form-data" >
            <table id="cox" >
                            <tr>
								<td><label for="prenom">Votre Login : </label></td>
								<td><input type="text" id="prm" name="identifiant" size="25" placeholder="Login..." maxlength="50" /></td>
							</tr>							
							<tr>
								<td><label for="nom">Votre mdp : </label></td>
								<td><input type="text" id="nm" name="motdepasse" size="25" placeholder="mdp..." maxlength="50" required /></td>
							</tr>
                </table>
                            <div class="row justify-content-md-center">
            <input type="submit" id="smbt" name="oki" value=" connexion "/>
            </div>
            
            </form>

         


     </div>
      </div>   
      <?php
				
                if (isset($_POST['oki']))
                {
                    $id = $_POST['identifiant'];
                    $mdp = $_POST['motdepasse'];
                    if(Connex($id, $mdp))
                        {
                            setcookie("moncookie",$id);
                            $url = "index.php";
			                redirection($url);
			                exit();
                        }
                    else echo "<div class='col-md-5'>Vous avez rentré un mauvais login ou mot de passe.</div>";
	            }
					?>       
</body>
</html>