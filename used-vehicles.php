<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rabljena vozila</title>

        <!-- CSS stylesheet -->
        <link
        rel="stylesheet" href="css/used-vehicles.css">

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
                        <a class="nav-link active" href="used-vehicles.php">Rabljena vozila</a>
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
            <div class="main_wrapper"></div>
            <div
                class="container">
                <!--Nav tabs-->
                <ul class="nav nav-tabs">
                    <li class="nav-item tab1">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Osobna vozila</a>
                    </li>
                    <li class="nav-item tab2">
                        <a class="nav-link" data-toggle="tab" href="#commercial">Gospodarska vozila</a>
                    </li>
                </ul>

                <!--Tab panes-->
                <div
                    class="tab-content">
                    <!--Osobna vozila-->
                    <div class="tab-pane container active" id="personal">
                        <h4 class="mt-3 mb-3">Dostupna rabljena osobna vozila na lageru</h4>
                        <div class="row">

                            <?php
                                include './admin/php_scripts/db.php';

                                $query = "SELECT * FROM vehicles WHERE type='Osobno vozilo' AND status= 'Vozilo na lageru'";
                                $stmt = $pdo->query($query);

                                if($stmt->rowCount()==0) {
                                    echo "<h6 class='text-center' id='no_vehicles'>- Trenutno ne postoji niti jedno osobno vozilo na lageru</h6>";
                                }

                                if($stmt->rowCount()>0):
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                        
                                    $kilometersFormatted = number_format($row['kilometers'], 0, ",", ".");
                                    $priceKnFormatted = number_format($row['price'], 2, ",",".");
                                    $roundPriceEur = round($row['price']/(7.55), 2);
                                    $priceEurFormatted = number_format($roundPriceEur, 2, ",",".");

                                    $images = json_decode($row['images'], true);
                            ?>

                            <div class="col-sm-4 mb-4">
                                <div class="one_personal_vehicle bg-info text-white " onclick="openVehicleDetails(<?=$row['id'];?>)">
                                    <div class="fake-img">
                                        <img src="./admin/php_scripts/<?=$images[0];?>" alt="personal_img<?=$row['id'];?>">
                                    </div>
                                    <h5 class="text-center p-2 border-bottom border-danger"><?=$row['title'];?></h3>
                                    <div class="row  text-center p-2">
                                        <div class="col-sm-6 border-right border-danger">
                                            <i style="color:cyan" class="fas fa-car"></i>
                                            <?=$row['model_year'];?>.
                                        </div>
                                        <div class="col-sm-6">
                                            <i style="color:cyan" class="fas fa-road"></i>
                                            <?=$kilometersFormatted;?>
                                            km
                                        </div>
                                    </div>
                                    <h5 class="text-center p-2 border border-danger"><?=$priceKnFormatted;?>
                                        <span>HRK</span>
                                        ~
                                        <?=$priceEurFormatted;?>
                                        <span>EUR</span>
                                    </h5>
                                </div>
                            </div>
                            <?php endwhile;?>
                            <?php endif;?>
                        </div>
                    </div>

                    <!--Gospodarska vozila-->
                    <div class="tab-pane container" id="commercial">
                        <h4 class="mt-3 mb-3">Dostupna rabljena gospodarska vozila na lageru</h4>
                        <div class="row">

                            <?php
                                $query2 = "SELECT * FROM vehicles WHERE type='Gospodarsko vozilo' AND status= 'Vozilo na lageru'";
                                $stmt2 = $pdo->query($query2);
                                if($stmt2->rowCount()==0) {
                                    echo "<h6 class='text-center' id='no_vehicles'>- Trenutno ne postoji niti jedno gospodarsko vozilo na lageru</h6>";
                                }

                                if($stmt2->rowCount()>0):
                                    while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)):

                                    $kilometersFormatted2 = number_format($row2['kilometers'], 0, ",", ".");
                                    $priceKnFormatted2 = number_format($row2['price'], 2, ",",".");
                                    $roundPriceEur2 = round($row2['price']/(7.55), 2);
                                    $priceEurFormatted2 = number_format($roundPriceEur2, 2, ",",".");

                                    $images2 = json_decode($row2['images'], true);
                            ?>

                            <div class="col-sm-4 mb-4">
                                <div class="one_commercial_vehicle bg-info text-white" onclick="openVehicleDetails(<?=$row2['id'];?>)">
                                    <div class="fake-img">
                                        <img src="./admin/php_scripts/<?=$images2[0];?>" alt="commercial_img<?=$row['id'];?>">
                                    </div>
                                    <h5 class="text-center p-2 border-bottom border-danger"><?=$row2['title'];?></h3>
                                    <div class="row  text-center p-2">
                                        <div class="col-sm-6 border-right border-danger">
                                            <i style="color:cyan" class="fas fa-car"></i>
                                            <?=$row2['model_year'];?>
                                        </div>
                                        <div class="col-sm-6">
                                            <i style="color:cyan" class="fas fa-road"></i>
                                            <?=$kilometersFormatted2;?>
                                            km
                                        </div>
                                    </div>
                                    <h5 class="text-center p-2 border border-danger"><?=$priceKnFormatted2;?>
                                        <span>HRK</span>
                                        ~
                                        <?=$priceEurFormatted2;?>
                                        <span>EUR</span>
                                    </h5>
                                </div>
                            </div>
                            <?php endwhile;?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'footer.php';?>
        </body>

        <script>
            function openVehicleDetails(id) {
                window.location.href = "vehicle-details.php?id=" + id;
            }
        </script>
</html>
