<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>O nama</title>

        <!-- CSS stylesheet -->
        <link
        rel="stylesheet" href="css/about_us.css">

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
                        <a class="nav-link" href="policies.php">Police osiguranja</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="container-fluid mt-3">
            <div class="row">
                <div class="col-sm-4">
                    <h6 class="p-2 bg-light">
                        Radno vrijeme:
                        <span>Pon-Sub: 08:00 - 16:00</span>
                    </h6>
                    <h6 class="p-2 bg-light">
                        Lokacija:
                        <span>Novska, Radnička bb</span>
                    </h6>

                    <h6 class="p-2 bg-light">
                        Puni naziv firme:
                        <span>Autocentar Butković d.o.o.</span>
                    </h6>
                    <h6 class="p-2 bg-light">
                        Početni kapital:
                        <span>50.000,00 EUR</span>
                    </h6>
                    <h6 class="p-2 bg-light">
                        Oib:
                        <span>24554125759</span>
                    </h6>
                    <h6 class="p-2 bg-light">
                        Kontakt email:
                        <a href="mailto:support@acbutkovic.hr"><span>support@acbutkovic.hr</span></a>
                    </h6>
                    <h6 class="p-2 bg-light">
                        Broj telefona:
                        <span>(+385)958578527</span>
                    </h6>
                </div>

                <div class="col-sm-4">
                    <div class="img-wrapper">
                        <img src="./images/golf6GTD.jpg" alt="ac_butkovic">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="img-wrapper">
                        <img src="./images/golf5.jpg" alt="ac_butkovic">
                    </div>
                </div>
            </div>
        </main>
        <?php include 'footer.php';?>
    </body>
</html>
