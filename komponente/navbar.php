<span class="position-absolute trigger"></span>
<nav class="navbar navbar-expand-sm sticky-top navbar-dark">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" 
                type="button" data-toggle="collapse" data-target="#navbar1">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Pocetna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vozila.php">Lista vozila</a>
                </li>
                <?php
                  if ($_SESSION['ulogovaniKorisnik'] != null) {
                      if ($_SESSION['ulogovaniKorisnik']->uloga == 'kontrolor') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="tablice.php">Tablice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="izvestaj.php">Izvestaj</a>
                        </li>
                      <?php 
                        } 
                        if ($_SESSION['ulogovaniKorisnik']->uloga == 'vlasnik') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="vlasnici.php">Moja Vozila</a>
                            </li>
                        <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="registracija.php">Registracija</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="onama.php">O nama</a>
                </li>
            </ul>
        </div>
    </div>
</nav>