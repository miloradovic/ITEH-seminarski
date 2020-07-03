
<?php
    include 'init.php';
    $poruka = "";
    if (isset($_POST['registracija'])) {
        $ime = $mysqli->real_escape_string(trim($_POST['ime']));
        $email = $mysqli->real_escape_string(trim($_POST['email']));
        $password = $mysqli->real_escape_string(trim($_POST['password']));

        $korisnik = new Korisnik();
        $korisnik->ime_prezime = $ime;
        $korisnik->email = $email;
        $korisnik->sifra = $password;

        if ($korisnik->save($mysqli)) {
            $poruka ="Uspesno ste se registrovali";
        } else {
            $poruka ="Neuspesno ste se registrovali";
        }
    }

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

        <title>Registracija vozila</title>
    </head>
    <body>

    <?php include 'komponente/header.php'; ?>
    <?php include 'komponente/navbar.php'; ?>
    <br>

    <section class="section-2">
      <div class="container">
        <?php if($poruka != null) { ?>
        <div class="alert alert-primary" role="alert">
            <?= $poruka; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>

         <h3 class="text-center">Registraciona forma</h3>

         <form method= "POST" action="">
           <label for="ime">Ime i prezime</label>
           <input type="text" name="ime" class="form-control" id="ime">
           <label for="email">Email</label>
           <input type="email" name="email" class="form-control" id="email">
           <label for="password">Sifra</label>
           <input type="password" name="password" class="form-control" id="password" required>
           <br>
           <hr>
           <input type="submit" name="registracija" value="Registracija korisnika" class="form-control btn-primary" id="registracija">
         </form>         
      </div>
    </section>

    <?php include 'komponente/footer.php'; ?>
    
    <script src="js/jquery.js"></script>
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
