<?php

include '../init.php';
require('../vendor/autoload.php');
use SheetDB\SheetDB;

$sheetdb = new SheetDB('g0r0vnv7qnz9f');

$datum = date("Y-m-d");

$day = date("d");
$month = date("m");
$year = date("Y"); 

$upit = "SELECT SUM(cena) AS suma FROM `tablica` WHERE datum='$datum'";

$rezultat = $mysqli->query($upit);
$suma;
while ($red = $rezultat->fetch_object()) {
    $suma = $red->suma;
}
if ($suma == null) {
    $suma = 0;
}
$response = $sheetdb->create(['godina'=>$year, 'mesec'=>$month, 'dan'=>$day, 'profit'=>$suma]);

if ($response == 1) {
    $msg = "Poslat izvestaj.";
} else {
    $msg = "Greska prilikom slanja izvestaja.";
}

header("Location: ../izvestaj.php?msg=" . $msg);