<?php
include '../init.php';

$vlasnik = new Vlasnik();
$vlasnik->termin = $_GET['termin'];

$nizVlasnika = $vlasnik->vratiSve($mysqli);
 ?>

 <table class="table table-hover">
    <thead>
        <tr>
            <th>Ime</th>
            <th>Prezime</th>
        </tr>
    </thead>
    <tbody>

    <?php
        foreach ($nizVlasnika as $vlasnici) {
            ?>
        <tr>
            <td><?= $vlasnici->ime ?></td>
            <td><?= $vlasnici->prezime ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
 </table>