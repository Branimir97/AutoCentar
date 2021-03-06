<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vozila u dolasku</title>

        <!-- CSS stylesheet -->
        <link
        rel="stylesheet" href="css/incoming-vehicles.css">

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
                        <a class="nav-link active" href="incoming-vehicles.php">Vozila u dolasku</a>
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
        <main>
            <div class="main_wrapper"></div>
            <div class="container">
                <h4 class="mt-3 mb-4">Osobna i gospodarska vozila na putu do budućih kupaca</h4>
                <div class="row">

                    <?php
                        include './admin/php_scripts/db.php';

                        $query = "SELECT * FROM vehicles WHERE status = 'Vozilo u dolasku'";
                    
                        $stmt = $pdo->query($query);

                        if($stmt->rowCount()==0) {
                            echo "<h6 class='text-center' id='no_vehicles'>- Trenutno nemamo niti jedno vozilo na putu</h6>";
                        }
                        
                        if($stmt->rowCount()>0):
                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)):

                            $images = json_decode($row['images'], true);
                    ?>

                    <div class="col-sm-4 mb-4">
                        <div class="one_incoming_vehicle bg-primary" title="Uskoro više informacija...">
                            <div class="fake-img">
                                <img src="./admin/php_scripts/<?=$images[0];?>" alt="incoming_veh<?=$row['id'];?>">
                            </div>
                            <h6 class="text-center text-white p-2"><?=$row['title'];?></h6>
                        </div>
                    </div>
                    <?php endwhile;?>
                    <?php endif;?>
                </div>
            </div>
        </main>
    <?php include 'footer.php'; ?>
    </body>
</html>
