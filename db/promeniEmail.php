<?php
include '../init.php';

$noviEmail = $_GET['noviEmail'];
$id = $_SESSION['ulogovaniKorisnik']->id;
$poruka = "";

$upit = "UPDATE korisnik SET email = '$noviEmail' WHERE id = $id";

if ($mysqli->query($upit) && $noviEmail != null) {
    $poruka = "Izmenjena je email adresa";
    $_SESSION['ulogovaniKorisnik']->email = $noviEmail;
} else {
    $poruka = "Greska pri izmeni email adrese";
}

?> 

<p>Nova email adresa: <b><?php echo $_SESSION['ulogovaniKorisnik']->email; ?></b></p>