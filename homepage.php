<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Auto Centar Butković</title>

        <!-- CSS stylesheet -->
        <link 
        rel="stylesheet" href="css/homepage.css">

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
        <main>
            <div
                class="row">
                <!--Left part of main-->
                <div
                    class="col-sm-6">
                    <!--Image slider-->
                    <div
                        id="demo" class="carousel slide" data-ride="carousel">

                             <?php 
                                include './admin/php_scripts/db.php';
                                $ids = "SELECT COUNT(*) FROM vehicles WHERE status = 'Vozilo na lageru'";
                                $result = $pdo->prepare($ids);
                                $result->execute();
                                $rows = $result->fetchColumn();
                            ?>

                            <!--Indicators-->
                            <ul class="carousel-indicators">
                                <?php for($i = 0; $i < $rows; $i++):?>
                                <li id="indicator" data-target="#demo" data-slide-to="<?=$i;?>"></li>
                                <?php endfor;?>
                            </ul>
                            
                        <!--The slideshow-->
                        <div class="carousel-inner">

                            <?php
                                $query = "SELECT * FROM vehicles WHERE status = 'Vozilo na lageru'";
                                $stmt = $pdo->query($query);

                                if($stmt->rowCount()==0) {
                                    echo "<h6 class='mt-3 text-center' id='no_vehicles'>- Trenutno nemamo niti jedno objavljeno vozilo na web stranici!</h6>";
                                }
                                
                                if($stmt->rowCount()>0):
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                                    $images = json_decode($row['images'], true);
                                    $formattedPriceKn = number_format($row['price'],2, ",", ".");
                            ?>

                            <div class="carousel-item" id="vehicle_image">
                                <img title="<?=$row['title'];?>" src="./admin/php_scripts/<?=$images[0];?>" onclick="openVehicleDetails(<?=$row['id'];?>)" alt="veh_img<?=$row['id'];?>">
                            </div>
                                <?php endwhile;?>
                            <?php endif;?>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>

                <!--Right part of main-->
                <div class="col-sm-6 text-center">
                    <h3 class="text-center p-3">Dobrodošli na stranicu Auto Centra Butković!</h3>
                    <a href="used-vehicles.php"><h6 class="services p-3">Uvoz i prodaja rabljenih vozila</h6></a>
                    <a href="ordering-vehicles.php"><h6 class="services p-3">Usluga savjetovanja i posredovanja pri uvozu iz EU u HR</h6></>
                    <a href="policies.php"><h6 class="services p-3">Prodaja polica obaveznog auto-osiguranja</h6></a>
                    <a href="incoming-vehicles.php"><h6 class="services p-3">Mogućnost uvida i prednaružbe za vozila u dolasku</h6></a>
                </div>
            </div>
        </main>

    <?php include 'footer.php'; ?>
    </body>

    <script>
        $(document).ready(function() {
            $("div#vehicle_image:first").addClass('active');
            $("li#indicator:first").addClass('active');
        })

        function openVehicleDetails(id) {
            window.location.href = "vehicle-details.php?id="+id;
        }
    </script>
</html>
