<?php

include 'init.php';

if (!isset($_SESSION['ulogovaniKorisnik']) || empty($_SESSION['ulogovaniKorisnik'])) {
    header('location: login.php');
    exit;
}

$vlasnik = $_SESSION['ulogovaniKorisnik'];

if ($vlasnik->uloga == "kontrolor") {
    header('location: tablice.php');
    exit;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

    <title>Lista mojih vozila</title>
</head>

<body>

    <?php include 'komponente/header.php'; ?>
    <?php include 'komponente/navbar.php'; ?>
    
    <br>
    <div class="container">
        <!-- Nav tabs -->

        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#mojavozila" role="tab" data-toggle="tab">Moja Vozila</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#nalog" role="tab" data-toggle="tab">Nalog</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active in" id="mojavozila">
                <section class="section-2">
                <div class="container">
                    <h4 class="text-center">Lista mojih vozila</h4>

                    <div id="podaci">
                        
                    </div>
                </div>
                </section>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="nalog">
            <section class="section-2">
            <div class="container">
                <!-- <div class="alert alert-primary" role="alert" style="display:none;">
                    <p id="porukaEmail"></p> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->

                <br>
                <h3 class="text-center">Nalog</h3>
                <p>Trenutna email adresu: <b><?php echo $vlasnik->email; ?></b></p>
                <div id="novaAdresa"></div>
                <br />
                <label for="noviMail">Unesite novu email adresu: </label>
          <input type="text" id="noviEmail" class="form-control">
          <hr>
          <button onclick="promeniEmailAdresu()" class="form-control btn-primary">Promeni</button>
            </div>
            </section>
            </div>
        </div>
    </div>
    

    <?php include 'komponente/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>
        $.ajax({            
            url: 'db/pretraziMojaVozila.php',
            data: {
                id_vlasnika: <?php echo json_encode($vlasnik->id); ?>
            },
            success: function(data){
                $("#podaci").html(data);
            }
        });

        function promeniEmailAdresu() {
            $.ajax({
                url: 'db/promeniEmail.php',
                data: {
                    noviEmail: $("#noviEmail").val()
                },
                success: function(response){
                    $("#novaAdresa").html(response);
                }
            });
        }
    </script>
</body>
</html>