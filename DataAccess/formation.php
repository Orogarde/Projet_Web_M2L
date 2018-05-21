<?php 
  function connexion() { // fonction permettant la connexion à la base de données 
    
    $host="localhost";
    $dbname="M2L";
    $utilisateur="root";
    $mdp="";
	// fonction pour automatiser la connexion à un serveur de base de données
	$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $utilisateur, $mdp,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'))
            or die ("Attention, problème de connexion serveur");
            
	
	return $pdo;
	
}

function SelectFormation()  // récupération d'une liste de toutes les formations
// fonction permettant de retourner une phrase avec l'id et le nom d'une formation 
// dans chaque ligne de la liste ainsi que l'affichage à l'aide d'un collapse de la description de la formation
{

    $pdo = connexion();
    $requete = " select * from formation where Date_formation > CURDATE();";
    $prepReq = $pdo->prepare($requete);
    
    $execPrepReq = $prepReq->execute();
    $data = $prepReq->fetchAll();
    return $data;
}
function SelectFormationEquipe($id)  // liste des salarie en fonction de l'id de l'equipe dans le cadre de la validation de formation(s)
// fonction permettant de retourner une phrase avec l'id et le nom d'une formation 
// dans chaque ligne de la liste ainsi que l'affichage à l'aide d'un collapse de la description de la formation
{

    $pdo = connexion();
    $requete = "select * from salarie natural join participer natural join formation where statuts='2' and salarie.Id_Equipe = :id ";
    $prepReq = $pdo->prepare($requete);
    $prepReq->BindValue(':id',$id);
    $execPrepReq = $prepReq->execute();
    $data = $prepReq->fetchAll();
    return $data;
}

/*function requprep($cont)
{   

    $dbh = connexion();
    $sql = "select id_Formation from formation where :id_Formation = id_Formation order by id_Formation ;";
    $stmt = $dbh->prepare($sql);
    $stmt->BindValue(':id_Formation',$cont);
    $retour=$stmt->execute();
    $retour=$stmt->fetchAll();
    $dbh=null;
    print_r($retour);
    return $retour;


}
*/
function nomFormationV($id) // récupération d'une liste des formations validées
{
    $pdo = connexion();
    $requete = "select * from participer join formation on participer.id_Formation=Formation.id_Formation where statuts=1 and participer.id_Salarie = :id";
    $prepReq = $pdo->prepare($requete);
    $prepReq->BindValue(':id',$id);
    $execPrepReq = $prepReq->execute();
    $data = $prepReq->fetchAll();
    return $data;
} 
function nomFormationEnatt($id) // récupération d'une liste des formations en attentes de validations
{
    $pdo = connexion();
    $requete = "select * from participer join formation on participer.id_Formation=Formation.id_Formation where statuts=2 and participer.id_Salarie = :id";
    $prepReq = $pdo->prepare($requete);
    $prepReq->BindValue(':id',$id);
    $execPrepReq = $prepReq->execute();
    $data = $prepReq->fetchAll();
    return $data;
} 

function nomEquipe($id) // récupération du nom de l'équipe
{
    $pdo = connexion();
    $requete = "select Nom_Equipe from equipe where id_Equipe = :id";
    $prepReq = $pdo->prepare($requete);
    $prepReq->BindValue(':id',$id);
    $data = $prepReq->execute();
    $data = $prepReq->fetch();
    return $data;
}
function nomSalarie($id) // récupération du nom du salarie
{
    $pdo = connexion();
    $requete = "SELECT nom_Salarie from salarie where id_Salarie= :id";
    $prepReq = $pdo->prepare($requete);
    $prepReq->BindValue(':id',$id);
    $data = $prepReq->execute();
    $data = $prepReq->fetch();
    return $data;
}
function verifetat($nomformation) // fonction qui vérifie l'état des formations
{
    $pdo = connexion();
    $requete = "SELECT intitule_formation from formation inner join participer on formation.id_Formation = participer.id_Formation inner join salarie on participer.id_Salarie=salarie.id_Salarie
     where salarie.id_Salarie =:id and (statuts=1 or statuts=2 or statuts=4) and Date_formation>CURDATE() and intitule_formation=:formation";
     $prepReq = $pdo->prepare($requete);
     $prepReq->BindValue(':id',$_COOKIE["moncookie"]);
     $prepReq->BindValue(':formation',$nomformation);
     $data = $prepReq->execute();
     $data = $prepReq->fetchAll();
     if ($data) return true;else return false;

}

function insertstatut() // creation d'une ligne dans la table participer reliant un salarie et  à une formation
{
    $connexion = connexion();
    
     $requete = 'INSERT INTO `participer` (`id_Salarie`, `id_Formation`, `statuts`) VALUES (:id, :forma, 2)';       
     $PrepRequete = $connexion->prepare($requete);
     $PrepRequete->bindValue(':forma',$_POST["idFormation"]);
     $PrepRequete->bindValue(':id',$_POST["idS"]);
    
    $execPrepRequete = $PrepRequete->execute();
}

function deletestatut() // suppression d'une ligne reliant un salarie à une formation
{
    
    $connexion = connexion();
    
     $requete = 'DELETE FROM `participer` WHERE `participer`.`id_Salarie` = :id AND `participer`.`id_Formation` = :forma';        
     $PrepRequete = $connexion->prepare($requete);
     $PrepRequete->bindValue(':forma',$_POST["idFormation"]);
     $PrepRequete->bindValue(':id',$_POST["idS"]);
    
    $execPrepRequete = $PrepRequete->execute();
}

function gotohistorique() // changement de statut d'une formation pour l'intégrer dans l'historique
{
    $connexion = connexion();
    
     $requete = "update participer set statuts = '4' where participer.id_Salarie = :nom and participer.id_Formation = :id";        
     $PrepRequete = $connexion->prepare($requete);
     $PrepRequete->bindValue(':id',$_POST["idFormation"]);
     $PrepRequete->bindValue(':nom',$_POST["idS"]);
    
    $execPrepRequete = $PrepRequete->execute();
 
}

function statut1() // changement de statut pour validation d'une formation
{
    $connexion = connexion();
    
     $requete = "update participer set statuts = '1' where participer.id_Salarie = :nom and participer.id_Formation = :id";        
     $PrepRequete = $connexion->prepare($requete);
     $PrepRequete->bindValue(':id',$_POST["idFormation"]);
     $PrepRequete->bindValue(':nom',$_POST["idS"]);
    
    $execPrepRequete = $PrepRequete->execute();
}
   
function ajout($format) // ajout dans la table participer d'une ligne reliant par un statut un salarie à une formation
{
	$pdo=connexion();
	$req='INSERT INTO `participer` (`id_Salarie`, `id_Formation`, `statuts`) VALUES (:id, :forma, 2)';
   
	$prep=$pdo->prepare($req);
	$resultat=$prep->execute(array('id' => $_COOKIE["moncookie"],'forma'=>$format));
	$pdo=NULL;
    
}
function Selecthisto($id)  // sélection des formation de l'historique
{

    $pdo = connexion();
    $requete = "select * from salarie natural join participer natural join formation where statuts='4' and salarie.Id_Salarie = :id ";
    $prepReq = $pdo->prepare($requete);
    $prepReq->BindValue(':id',$id);
    $execPrepReq = $prepReq->execute();
    $data = $prepReq->fetchAll();
    return $data;
}

function test_pdf($id) // test du pdf avec une  formation en fonction de l'id de cette dernière
{
    $pdo=connexion();
    $req="select * from formation where id_Formation= :id";
    $prep=$pdo->prepare($req);
    $resultat=$prep->execute(array('id'=>$id));
    $resultat=$prep->fetchAll();
    return $resultat;
}
function SelectinfosSalarie($id)  // récupération des informations de compte par rapport à l'id du salarie
{

    $pdo = connexion();
    $requete = "SELECT `nom_Salarie`,`Prenom`,Nom_Equipe FROM `salarie` join equipe on equipe.Id_Equipe = salarie.Id_Equipe WHERE salarie.id_Salarie= :id ";
   
    $prepReq = $pdo->prepare($requete);
    $prepReq->BindValue(':id',$id);
    $execPrepReq = $prepReq->execute();
    $data = $prepReq->fetch(PDO::FETCH_ASSOC);
    return $data;
}
?>