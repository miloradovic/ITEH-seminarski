<?php

include '../init.php';

$id = $_GET['id'];

$url = "http://seminarski.test/rest/tablice/" . $id;
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
// curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
$odgovor = curl_exec($curl);
$msg = json_decode($odgovor);
curl_close($curl);
/*
$upit = "DELETE FROM reg_tablica WHERE id = $id";
$mysqli->query($upit);
*/
$string = "Location: ../tablice.php?msg=" . $msg->poruka;
header($string);

 ?>