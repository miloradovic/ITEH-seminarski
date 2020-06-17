<?php
include '../init.php';

$upit = "SELECT k.ime_prezime, COUNT(t.id_kontrolor) AS brojRegistracija FROM tablica t LEFT JOIN korisnik k ON t.id_kontrolor=k.id GROUP BY k.ime_prezime";

$rez = $mysqli->query($upit);

$niz = [];

while ($r = $rez->fetch_assoc()) {
    $niz [] = $r;
}

echo json_encode($niz);
