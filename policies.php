<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Auto Centar Butković</title>

        <!-- CSS stylesheet -->
        <link
        rel="stylesheet" href="css/policies.css">

        <!-- Icon -->
        <link 
        rel="icon" href="./images/icon2.png">

        <!-- Latest compiled and minified CSS -->
        <link
        rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <!-- FontAwesome library-->
        <script src="https://kit.fontawesome.com/6aa1bd9ffa.js" crossorigin="anonymous"></script>

        <!--jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!--Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <!--jQuery CDN-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>


        <!-- Scroll indicator-->
        <div class="progress-container fixed-top">
            <div class="progress-bar" id="myBar"></div>
        </div>
        <script type="module" src="./scripts/scrollIndicator.js"></script>
        <!--End of Scroll Indicator-->

        <?php include 'header.php'; ?>

        <!--Navigation bar-->
        <nav
            class="navbar navbar-expand-md bg-primary navbar-dark sticky-top">
            <!--Brand-->
            <a class="navbar-brand" href="homepage.php">AC Butković</a>

            <!--Toggler/collapsible button-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Navbar links-->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="used-vehicles.php">Rabljena vozila</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="incoming-vehicles.php">Vozila u dolasku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ordering-vehicles.php">Vozila po sustavu narudžbe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="policies.php">Police osiguranja</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="container-fluid mt-3">
            <div class="row">
                <div class="col-sm-6">
                    <div class="wrapper">
                        <img src="images/sava-asistencija-osiguranje.jpg" alt="">
                        <div class="content text-center">
                            <h1>Napravi policu osiguranja na pravom mjestu!</h1>
                            <p class="bg-success p-3">
                                <a class="text-white" target="_blank" alt="polica_osiguranja" title="Saznaj više" href="https://www.sava-osiguranje.hr/hr-hr/osiguranja/motorna-vozila/obavezno/auto-osiguranje/?gclid=CjwKCAjwxLH3BRApEiwAqX9arYdG2nWWBh7Blkz4DIhCXpwqAe_8-oy72ZLQnFrjTTX_50bTnkGHyxoC84YQAvD_BwE">Velebit osiguranje d.o.o.
                                    <i style="color: darkblue;" class="fas fa-car"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 text-center">
                    <h3 class="text-center mt-3">Auto osiguranje u 21. stoljeću</h3>
                    <h6 class="mt-4">
                        <i class="fas fa-exclamation-triangle"></i><br>
                        Glavna prednost je mogućnost online kupovine osiguranja. Nema više čekanja u redovima jer policu možete kupiti online, dobijte Vaš HUO kod i spremni ste za tehnički!
                    </h6>
                    <h6 class="mt-4">
                        <i class="fas fa-exclamation-triangle"></i><br>
                        Na web stranici Sava osiguranja možete pronaći i seriju korisnih tekstova "Nikad sami - dobro je znati". Za Vas smo izdvojili neke od popularnih tekstova.
                    </h6>
                    <h6 class="mt-4">
                        <i class="fas fa-exclamation-triangle"></i><br>
                        Osim spomenutih pokrića, vrlo je popularna i Sava asistencija - pomoć na cesti.
                    </h6>
                </div>
            </div>
        </main>
        <?php include 'footer.php';?>
    </body>
</html>
