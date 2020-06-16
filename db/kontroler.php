<?php
  include '../init.php';
  // TODO
  if(isset($_POST['izmenaEmail'])){
    $id = $_SESSION['ulogovaniKorisnik']->id;
    $email = $mysqli->real_escape_string(trim($_POST['noviEmail']));

    $upit = "UPDATE korisnik SET email = '$email' WHERE id = $id";
    if($mysqli->query($upit)){
      $poruka = "Izmenjena je email adresa";
    }else{
      $poruka = "Greska pri izmeni email adrese";
    }

    header("Location: ../vlasnici.php?msg=$poruka");
  }
 ?>
