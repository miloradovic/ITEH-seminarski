<?php include 'init.php'; ?>
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

    <title>Lista vozila</title>
</head>

<body>

    <?php include 'komponente/header.php'; ?>
    <?php include 'komponente/navbar.php'; ?>
    <br>
    <section class="section-2" data-aos="fade-left" data-aos-delay="300">
      <div class="container">
         <h3 class="text-center">Lista vozila</h3>

         <label for="naziv">Unesite marku ili njen deo</label>
          <input type="text" id="marka" class="form-control">
          <hr>
          <button onclick="pretraziVozila()" class="form-control btn-primary">Pretrazi</button>
          <br>
          <br>
          <div id="podaci">

          </div>

      </div>
    </section>

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
    <script>
      function pretraziVozila(){
        $.ajax({
          url: 'db/pretraziVozila.php',
          data: {
            marka: $("#marka").val()
          },
          success: function(data){
            $("#podaci").html(data);
          }
        });
      }
      pretraziVozila();
    </script>
</body>

</html>