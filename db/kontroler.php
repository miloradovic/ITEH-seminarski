<?php
  include '../init.php';

  if(isset($_POST['unosTablice'])){
    $id_vlasnik = $mysqli->real_escape_string(trim($_POST['vlasnik']));
    $id_vozilo = $mysqli->real_escape_string(trim($_POST['vozilo']));
    $tablica = $mysqli->real_escape_string(trim($_POST['tablica']));
    $datum = date("Y-m-d");
    $upit = "INSERT INTO reg_tablica(id, id_vlasnik, id_vozilo, tablica, datum) VALUES (null, $id_vlasnik, $id_vozilo, '$tablica', '$datum')";
    if($mysqli->query($upit)){
      $poruka = "Uneta je reg tablica";
    }else{
      $poruka = "Greska pri unosu reg tablice";
    }

    header("Location: ../tablice.php?msg=$poruka");
  }

  if(isset($_POST['izmenaTablice'])){
    $id = $mysqli->real_escape_string(trim($_POST['idTablice']));
    $tablica = $mysqli->real_escape_string(trim($_POST['tablica']));
    $datum = date("Y-m-d");

    $upit = "UPDATE reg_tablica SET tablica = '$tablica', datum = '$datum' WHERE id = $id";
    if($mysqli->query($upit)){
      $poruka = "Izmenjena je reg tablica";
    }else{
      $poruka = "Greska pri izmeni reg tablice";
    }

    header("Location: ../tablice.php?msg=$poruka");
  }
  
 ?>
