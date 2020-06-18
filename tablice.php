<?php

include 'init.php';

if (!isset($_SESSION['ulogovaniKorisnik']) || empty($_SESSION['ulogovaniKorisnik'])) {
    header('location: login.php');
    exit;
}

$kontrolor = $_SESSION['ulogovaniKorisnik'];

if ($kontrolor->uloga == "vlasnik") {
    header('location: vlasnici.php');
    exit;
}

$vlasnik = new Korisnik();
$nizVlasnika = $vlasnik->vratiSveVlasnike($mysqli);

$vozilo = new Vozilo();
$nizVozila = $vozilo->vratiSve($mysqli);

$tablica = new Tablica();
$nizTablica = $tablica->vratiSve($mysqli);
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

        <title>Reg Tablice</title>
    </head>

    <body>

        <?php include 'komponente/header.php'; ?>
        <?php include 'komponente/navbar.php'; ?>

        <section class="section-2" data-aos="fade-left" data-aos-delay="300">
        <div class="container">
            <h3 id="msg" class="text-center"><?php if (isset($_GET['msg'])) { echo $_GET['msg']; } ?></h3>                            
        </div>
        </section>

        <section class="section-2" data-aos="fade-left" data-aos-delay="300">
        <div class="container">
            <h3 class="text-center">Unos reg tablice</h3>
            <form method="POST" action="rest/tablice">
                <select id="vlasnik" name="vlasnik" class="form-control">
                    <?php
                        foreach ($nizVlasnika as $vlasnici) {
                            ?>
                        <option value="<?= $vlasnici->id ?>"><?= $vlasnici->ime_prezime ?></option>

                        <?php
                        }
                    ?>
                </select>
                <hr>
                <select name="vozilo" class="form-control">
                    <?php
                        foreach ($nizVozila as $vozila) {
                            ?>
                        <option value="<?= $vozila->id ?>"><?= $vozila->marka . ' ' . $vozila->model ?></option>

                        <?php
                        }
                    ?>
                </select>
                <hr>
                <input type="text" placeholder="Unesi reg tablicu" class="form-control" name="tablica">
                <hr>
                <select name="tipTablica" class="form-control"></select>
                <hr>            
                <input type="submit" class="form-control btn-primary" name="unosTablice" value="Unesi tablicu">
            </form>
            <hr>
            <h4 id="msgPost" class="text-center"></h4>
        </div>
        </section>
        
        
        <section class="section-2" data-aos="fade-left" data-aos-delay="300">
        <div class="container">
            <h3 class="text-center">Izmena reg tablice</h3>
            <form method="PUT" action="rest/tablice">
            <select name="idTablice" class="form-control">
                <?php
                    foreach ($nizTablica as $tablice) {
                        ?>
                    <option value="<?= $tablice->id ?>"><?= $tablice->tablica  ?></option>

                    <?php
                    }
                ?>
            </select>
            <hr>
            <input type="text" placeholder="Unesi novu reg tablicu" class="form-control" name="novaTablica">
            <hr>
            <input type="submit" class="form-control btn-primary" name="izmenaTablice" value="Izmeni tablicu">
            </form>
            <hr>
            <h4 id="msgPut" class="text-center"></h4>
        </div>
        </section>

        <section class="section-2" data-aos="fade-left" data-aos-delay="300">
        <div class="container">
            <h3 class="text-center">Brisanje reg tablice</h3>
            <br>
            <table id="tabelaTablica" class="table table-hover">
                <thead>
                    <tr>
                        <th>Vlasnik</th>
                        <th>Marka</th>
                        <th>Model</th>
                        <th>Tablica</th>
                        <th>Datum izdavanja</th>
                        <th>Cena</th>
                        <th>Obrisi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($nizTablica as $tbl) {
                        ?>
                        <tr>
                            <td><?= $tbl->vlasnik->ime_prezime ?></td>
                            <td><?= $tbl->vozilo->marka  ?></td>
                            <td><?= $tbl->vozilo->model  ?></td>
                            <td><?= $tbl->tablica ?></td>
                            <td><?= $tbl->datum ?></td>
                            <td><?= $tbl->cena ?></td>
                            <td><a href="db/obrisiTablicu.php?id=<?= $tbl->id ?>" class="btn btn-danger">Obrisi</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </section>

        <script src="js/jquery.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
        <script src="js/animate.js"></script>
        <script src="js/custom.js"></script>
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>

        <script>
            $(document).ready( function () {
                $('#tabelaTablica').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5 ]
                            }
                        }
                    ]
                });
            });
        </script>
        <?php include 'komponente/footer.php'; ?>

        <script>
            $(':input[name=unosTablice]').click(function() {
                // process the form
                $("form").submit(function(event) {

                    // get the form data
                    // there are many ways to get this data using jQuery (you can use the class or id also)
                    var idTipTablice = $(':input[name=tipTablica]').val();
                    var formData = {
                        'idVlasnik'  : $(':input[name=vlasnik]').val(),
                        'idKontrolor': <?php echo json_encode($kontrolor->id); ?>,
                        'idVozilo'   : $(':input[name=vozilo]').val(),
                        'tablica'    : $(':input[name=tablica]').val(),
                        'cena'       : cenovnik[idTipTablice]
                    };
                    
                    $.ajax({
                        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url         : 'rest/tablice', // the url where we want to POST
                        data        : JSON.stringify(formData), // our data object
                        dataType    : 'json', // what type of data do we expect back from the server
                        encode      : true,
                        contentType: "application/json; charset=UTF-8"
                    }).done(function(data) {
                        $('#msgPost').html(data.poruka); 
                    });
                    
                    // stop the form from submitting the normal way and refreshing the page
                    event.preventDefault();
                });
            });

            $(':input[name=izmenaTablice]').click(function() {
                // process the form
                $("form").submit(function(event) {
                    // get the form data
                    var formData = {
                        'idTablice' : $(':input[name=idTablice]').val(),
                        'tablica'   : $(':input[name=novaTablica]').val()
                    };
                    setUrl = 'rest/tablice/' + formData.idTablice;
                    $.ajax({
                        type        : 'PUT', // define the type of HTTP verb we want to use (POST for our form)
                        url         : setUrl, // the url where we want to POST
                        data        : JSON.stringify(formData), // our data object
                        dataType    : 'json', // what type of data do we expect back from the server
                        encode      : true,
                        contentType: "application/json; charset=UTF-8"
                    }).done(function(data) {
                        $('#msgPut').html(data.poruka);  
                    });
                    
                    // stop the form from submitting the normal way and refreshing the page
                    event.preventDefault();
                });
            });

            // Get tip reg tablice
            let dropdown = $(':input[name=tipTablica]');
            dropdown.empty();

            dropdown.append('<option selected="true" disabled>Izaberi tip tablica</option>');
            dropdown.prop('selectedIndex', 0);

            const url = 'https://my-json-server.typicode.com/miloradovic/cenovnik/cenovnik';

            var cenovnik = new Array();
            // Populate dropdown with list of reg tablica
            $.getJSON(url, function (data) {
                $.each(data, function (key, entry) {
                    if (entry.privremena === false) {
                        dropdown.append($('<option></option>').attr('value', entry.id).text(entry.naziv + " - " + entry.cena + " RSD"));
                        cenovnik[entry.id] = entry.cena;
                    }                    
                })
            });
        </script>
    </body>
</html>