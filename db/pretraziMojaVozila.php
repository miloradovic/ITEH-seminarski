<?php
include '../init.php';

$tablica = new Tablica();
$tablica->vlasnik = new Korisnik();
$tablica->vlasnik->id = $_GET['id_vlasnika'];

$nizTablica = $tablica->vratiSve($mysqli);

if(empty($nizTablica)) {
    echo "Nema registrovanih automobila.";
} else {
 ?>

 <table class="table table-hover">
    <thead>
        <tr>
            <th>Marka</th>
            <th>Model</th>
            <th>Tablica</th>
            <th>Datum</th>
            <th>Cena</th>
        </tr>
    </thead>
    <tbody>

    <?php
        foreach ($nizTablica as $tablice) {
            ?>
        <tr>
            <td><?= $tablice->vozilo->marka ?></td>
            <td><?= $tablice->vozilo->model ?></td>
            <td><?= $tablice->tablica ?></td>
            <td><?= $tablice->datum ?></td>
            <td><?= $tablice->cena ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
 </table>
<?php } ?> 