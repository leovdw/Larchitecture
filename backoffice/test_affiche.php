<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 17/05/2017
 * Time: 18:34
 */


session_start();

require_once 'connect.php';


$sql = "SELECT
  `id_region`,
  `region`
FROM
  `region`
INNER JOIN 
  `revues/region`
  ON 
  region.id_region = revues/region.id_region
  
  ";

$stmt = $pdo->prepare($sql);
$stmt->execute();


while ($data = $stmt->fetch(PDO::FETCH_ASSOC)):

    echo $data['region'];

endwhile; ?>
