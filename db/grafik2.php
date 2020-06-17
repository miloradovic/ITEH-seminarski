<?php
include '../init.php';

$upit = "SELECT YEAR(datum) as godina, MONTH(datum) as mesec, SUM(cena) AS ukupno FROM tablica GROUP BY YEAR(datum), MONTH(datum) ORDER BY YEAR(datum), MONTH(datum) ";

$rez = $mysqli->query($upit);

$niz = [];

    while($r = $rez->fetch_assoc()){
      $niz [] = $r;
    }

echo json_encode($niz);
?>
