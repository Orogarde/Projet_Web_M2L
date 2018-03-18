<?php

include 'DataAccess/formation.php';
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$id=$_POST['id_forma'];
$ok=test_pdf($id);

foreach ($ok as $mb)
{
    $variable="<hr><table class='table'>
<tbody>

<tr>
    <th scope='row'>Description de la formation</th>
    <td>".$mb['contenu_formation']."</td>
</tr>
<tr>
    <th scope='row'>Début de la formation</th>
    <td>".$mb['Date_formation']."</td>
</tr>
<tr>
    <th scope='row'>Nombre d'heures</th>
    <td>".$mb['Duree_formation']."</td>
</tr>
<tr>
    <th scope='row'>Nombre de jours de formation</th>
    <td>".$mb['NbrJour_formation']."</td>
</tr>
<tr>
    <th scope='row'>Lieu de formation</th>
    <td>".$mb['lieu_formation']."</td>
</tr>
<tr>
    <th scope='row'>Prérequis pour la formation</th>
    <td>".$mb['prerequis_formation']."</td>
</tr>
</tbody>
</table>
<hr>";

}

$pdf = new Dompdf();
$pdf->loadHtml($variable);
$pdf->render();
$pdf->stream("Formation");

?>