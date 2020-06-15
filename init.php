<?php
include 'db/greske.php';
include 'db/konekcija.php';
include 'domen/Tablica.php';
include 'domen/Korisnik.php';
include 'domen/Vozilo.php';

session_start();

if (!isset($_SESSION['ulogovaniKorisnik'])) {
    $_SESSION['ulogovaniKorisnik'] = null;
}
