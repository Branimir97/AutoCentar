<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vozila po sustavu narudžbe</title>

        <!-- CSS stylesheet -->
        <link
        rel="stylesheet" href="css/ordering-vehicles.css">

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
                        <a class="nav-link active" href="ordering-vehicles.php">Vozila po sustavu narudžbe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="policies.php">Police osiguranja</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main>
            <div class="row mt-4">
                <div class="col-sm-6 text-center">
                    <h3>Vozila po sustavu narudžbe</h3>
                    <h6 class="p-3">Imate vozilo koje Vam se sviđa, a nalazi se u EU?</h6>
                    <h6 class="p-3">Nikakav problem, obratite nam se na naš <a href="mailto:support@acbutkovic.hr">email</a>
                        , ili nas posjetite
                        na lokaciji Novska Radnička bb. 
                        U najkraćem mogućem roku obavijestit ćemo Vas o mogućnosti nabavke traženog vozila i ostalim detaljima.</h6>
                    <h6>Procedura i detalji prilikom uvoza vozila iz EU
                        <a href="./files/Uvoz vozila iz EU.pdf" download><img src="./images/pdficon.png" style="cursor: pointer;" title="Preuzmi info katalog" alt="pdficon" width="40" height="40"></a></h6>
                    <h6>S Vama kroz život, <br>Vaš <span>AC Butković</span></h6>
                </p>
                <p></p>
            </div>
            <div class="col-sm-6">
                <div class="fake-img mr-3">
                    <img src="./images/pjimage.jpg" alt="preberina_transporti">
                </div>
            </div>
        </div>
    <?php include 'footer.php'; ?>
    </body>
</html>
