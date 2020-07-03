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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css">
    
    <title>Izvestaj</title>
</head>
<body>
    <?php include 'komponente/header.php'; ?>
    <?php include 'komponente/navbar.php'; ?>
    
    <section class="section-2" data-aos="fade-left" data-aos-delay="300">
        <div class="container">
            <h4 id="msg" class="text-center"><?php if (isset($_GET['msg'])) { echo $_GET['msg']; } ?></h4>                            
        </div>
    </section>

    <section class="section-2" data-aos="fade-left" data-aos-delay="300">
      <div class="container">
         <h3 class="text-center">Graficki prikaz podataka</h3>
         <div id="grafik"></div>

         <select onchange="crtajGrafik(this.value)" class="form-control">
           <option value="1">Ucinak po kontroloru</option>
           <option value="2">Zarada po mesecu</option>
         </select>
      </div>
    </section>
    <br>

    <section class="section-2" data-aos="fade-left" data-aos-delay="300">
      <div class="container">
        <h4>Posalji dnevni izvestaj: </h4>
        <a href="db/dnevni_izvestaj.php" class="btn btn-primary">Posalji</a>
      </div>
    </section>
    <br>
    <?php include 'komponente/footer.php'; ?>

    <script src="js/jquery.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(crtajGrafik1);

        function crtajGrafik(opcija){
          if(opcija == 1){
            crtajGrafik1();
          }
          if(opcija == 2){
            crtajGrafik2();
          }
        }

        function crtajGrafik1() {
          var niz = [];
          var kolone = [];
          kolone.push("Kontrolor");
          kolone.push("Broj registracija");
          niz.push(kolone);
          $.ajax({
            url: 'db/grafik1.php',
            success: function(data){
              $.each(JSON.parse(data),function(i,podatak){
                var imePrezime = podatak.ime_prezime;
                var broj = parseInt(podatak.brojRegistracija);
                var red = [];
                red.push(imePrezime);
                red.push(broj);
                niz.push(red);
              })
              var podaci = google.visualization.arrayToDataTable(niz);

              var options = {
                title: 'Broj registracija po kontroloru',
                height: 600
              };

              var chart = new google.visualization.PieChart(document.getElementById('grafik'));

              chart.draw(podaci, options);
            }
          })
        }

        function crtajGrafik2() {
          var niz = [];
          var kolone = [];
          kolone.push("Ukupno");
          kolone.push("Datum");
          niz.push(kolone);
          $.ajax({
            url: 'db/grafik2.php',
            success: function(data){
              $.each(JSON.parse(data),function(i,podatak){
                var ukupno = parseInt(podatak.ukupno);
                var datum = new Date(parseInt(podatak.godina), parseInt(podatak.mesec), 1);
                var red = [];
                red.push(datum);
                red.push(ukupno);
                niz.push(red);
              })
              var podaci = google.visualization.arrayToDataTable(niz);

              var options = {
                title: 'Zarada po mesecu',
                height: 600
              };

              var chart = new google.visualization.ColumnChart(document.getElementById('grafik'));

              chart.draw(podaci, options);
            }
          })
        } 
      </script>
</body>
</html>