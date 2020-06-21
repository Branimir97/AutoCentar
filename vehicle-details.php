<?php
    include './admin/php_scripts/db.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM vehicles WHERE id='{$id}'";

    $stmt = $pdo->query($query);
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $additional_equipment = json_decode($row['additional_equipment'], true);
    $images = json_decode($row['images'], true);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$row['title'];?></title>

        <!-- CSS stylesheet -->
        <link
        rel="stylesheet" href="./css/vehicle-details.css">

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

        <main class="container-fluid">
            <h2 style="color:red;" class="mt-3 text-center bg-light p-3"><?=$row['title'];?></h2>
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mt-2">Fotografije vozila</h4>
                    <div class="row">

                        <?php
                            foreach($images as $image):
                        ?>

                        <div class="col-sm-6">
                            <div class="img_wrapper mb-3">
                                <a href="<?="./admin/php_scripts/".$image;?>" target="_blank"><img class="center-cropped" src="<?="./admin/php_scripts/".$image;?>" alt="veh_img<?=$row['id']?>"></a>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>

                <?php
                    $kilometersFormatted = number_format($row['kilometers'], 0, ",", ".");
                    $motorCapacityFormatted = number_format($row['motor_capacity'], 0, ",", ".");
                    $priceKnFormatted = number_format($row['price'], 2, ",",".");
                    $roundPriceEur = round($row['price']/(7.55), 2);
                    $priceEurFormatted = number_format($roundPriceEur, 2, ",",".");
                ?>

                <div class="col-sm-6">
                    <h4 class="mt-2">Podaci o vozilu</h4>
                    <p class="bg-light p-3">Status:<span class="ml-3" style="color: limegreen;"><?=$row['status'];?>
                        </span>
                    </p>
                    <p class="bg-light p-3">Vrsta:<span class="ml-3"><?=$row['type'];?></span>
                    </p>
                    <p class="bg-light p-3">Marka:<span class="ml-3"><?=$row['mark'];?></span>
                    </p>
                    <p class="bg-light p-3">Model:<span class="ml-3"><?=$row['model'];?></span>
                    </p>
                    <p class="bg-light p-3">Godina proizvodnje:<span class="ml-3"><?=$row['manufacture_year'];?>.</span>
                    </p>
                    <p class="bg-light p-3">Godina modela:<span class="ml-3"><?=$row['model_year'];?>.</span>
                    </p>
                    <p class="bg-light p-3">Kilometraža:<span class="ml-3"><?=$kilometersFormatted;?>
                            km</span>
                    </p>
                    <p class="bg-light p-3">Snaga motora:<span class="ml-3"><?=$row['motor_power'];?>
                            kW</span>
                    </p>
                    <p class="bg-light p-3">Mjenjač:<span class="ml-3"><?=$row['transmission'];?></span>
                    </p>
                    <p class="bg-light p-3">Broj brzina:<span class="ml-3"><?=$row['gears'];?></span>
                    </p>
                    <p class="bg-light p-3">Zapremnina motora:<span class="ml-3"><?=$motorCapacityFormatted;?>
                            cm<sup>3</sup>
                        </span>
                    </p>
                    <p class="bg-light p-3">Potrošnja:<span class="ml-3"><?=$row['consumption'];?>
                            L/100km</span>
                    </p>
                    <p class="bg-danger text-white p-3">Cijena :<span class="ml-3"><?=$priceKnFormatted;?>
                            <sub>KN</sub>
                            ~
                            <?=$priceEurFormatted;?>
                            <sub>EUR</sub>
                        </span>
                    </p>
                </div>
            </div>

            <div class="text-center">
                <h4 class="mt-5">Oprema vozila:</h4><br>

                <?php
                    foreach($additional_equipment as $item):
                ?>

                <h6 class="bg-light p-3"><?=$item;?></h6>
                <?php endforeach;?>
            </div>
        </main>
        <?php include 'footer.php';?>
    </body>
</html>
