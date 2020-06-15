<?php include 'init.php'; ?>
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
    
    <title>O nama</title>
</head>
<body>
    <?php include 'komponente/header.php'; ?>
    <?php include 'komponente/navbar.php'; ?>
    
    <div class="container">
    <br>
    <h3 class="text-center">Ukratko o nama</h3>
        <div class="row">
            <div class="col-md-6 themed-grid-col">
            <section class="section-2" data-aos="fade-left" data-aos-delay="300">
                <p><b>DUNAV AUTO d.o.o.</b> je ovlašćeno lice koje u prometu sa trećim licima zaključuje sve vrste ugovora u okviru svoje delatnosti. Preduzeće je osnovano 1999. godine od strane Kompanije Dunav osiguranje sa osnovnim ciljem pružanja usluga osiguranicima u oblasti tehničkog pregleda.</p>
                <br>
                <p>Tokom svih godina postojanja, Dunav auto je beležio konstatan rast u pogledu mreže svojih poslovnica i u pogledu kvaliteta pruženih usluga, tako da je opravdano stekao poziciju lidera na polju tehničkog ispitivanja i analize motornih vozila. Posluje na teritoriji cele Republike Srbije i u svojoj strukturi ima preko 350 zaposlenih različitih profila.</p>
                <br>
                <p>Vodeći se svojom vizijom o bezbednom učešću svih učesnika u saobraćaju, Dunav auto nizom svojih akcija doprinosi povećanju svesti kod vozača.</p>
                <br>
                <p>Pored osnovne delatnosti – tehnički pregled vozila, Dunav auto je registrovan za obavljanje sledećih delatnosti:</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Iznajmljivanje lakih motornih vozila (Ogranak „Dunav auto RENT“)</li>
                    <li class="list-group-item">Platni promet</li>
                    <li class="list-group-item">Prijem zahteva za izdavanje tahografskih kartica</li>
                    <li class="list-group-item">Popravka i održavanje vozila </li>
                    <li class="list-group-item">Prodaja i ugradnja auto-stakala</li>
                    <li class="list-group-item">Prodaja i zamena pneumatika</li>
                </ul>
            </section>
            </div>
            <div class="col-md-6 themed-grid-col">
            <section class="section-2" data-aos="fade-left" data-aos-delay="300">
                <img src="/images/servis.jpg" alt="">
            </section>
            </div>
        </div>
        <br>
    </div>

    <?php include 'komponente/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
</body>
</html>