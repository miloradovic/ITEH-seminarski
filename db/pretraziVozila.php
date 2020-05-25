<?php
include '../init.php';

$vozilo = new Vozilo();
$vozilo->marka = $_GET['marka'];

$nizVozila = $vozilo->vratiSve($mysqli);
 ?>

 <table class="table table-hover">
 <thead>
   <tr>
     <th>Marka</th>
     <th>Model</th>
   </tr>
 </thead>
 <tbody>

   <?php
     foreach ($nizVozila as $vozila) {
         ?>
       <tr>
         <td><?= $vozila->marka ?></td>
         <td><?= $vozila->model ?></td>
        </tr>
       <?php
     }

    ?>

 </tbody>
 </table>