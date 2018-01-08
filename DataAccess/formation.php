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

function SelectFormation()  // fonction permettant de retourner une phrase avec l'id et le nom d'une formation 
// dans chaque ligne de la liste ainsi que l'affichage à l'aide d'un collapse de la description de la formation
{

$pdo = connexion();

$requete = "select * from formation order by id_Formation";


$execRequete = $pdo->query($requete);


$data = $execRequete->fetchAll();

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
function nomFormation($id)
{
    $pdo = connexion();
    $requete = "select * from salarie natural join participer natural join formation where salarie.id_Salarie = participer.id_salarie and salarie.id_Salarie = :id";
    $prepReq = $pdo->prepare($requete);
    $prepReq->BindValue(':id',$id);
    $execPrepReq = $prepReq->execute();
    $data = $prepReq->fetchAll();
    return $data;
}

?>