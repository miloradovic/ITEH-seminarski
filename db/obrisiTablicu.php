<?php

include '../init.php';

$id = $_GET['id'];

$upit = "DELETE FROM reg_tablica WHERE id = $id";
$mysqli->query($upit);

header("Location: ../tablice.php?msg=Uspesno obrisana reg tablica");

 ?>