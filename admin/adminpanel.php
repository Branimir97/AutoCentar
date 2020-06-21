<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin panel</title>

        <!-- Icon -->
        <link 
        rel="icon" href="../images/icon2.png">

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
        <div class="jumbotron p-3 bg-danger text-white">
            <h2>Administrator sučelje
                <i class="fas fa-user-cog"></i>
            </h2>

            <h6>Prijavljeni ste kao Administrator -----
                <span><?=$_SESSION['fname'];?></span>
                <div class="spinner-grow text-success spinner-grow-sm"></div>
            </h6>
            <h6>Korištena e-mail adresa -----
                <span><?=$_SESSION['email'];?></span>
            </div>

            <main class="container">
                <a href="./new_vehicle_form.php" class="btn btn-success mt-2">Dodaj novo vozilo</a>
                <a href="./register_admin_form.php" class="btn btn-primary mt-2">Dodaj novog administratora</a>
                <a href="./php_scripts/logout.php" class="btn btn-secondary mt-2">Odjava iz admin panela</a>

                <h5 class="mt-5">Lista trenutno aktivnih vozila</h5>

                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Fotografija</th>
                                <th>Tip</th>
                                <th>Marka</th>
                                <th>Model</th>
                                <th>Godina</th>
                                <th>Kilometraža</th>
                                <th>Cijena</th>
                                <th>Lager/U dolasku</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </main>

            <script>
                $(document).ready(function () {

                    $.post("./php_scripts/getCars.php", {}, // ono što se šalje PHP skripti
                            function (carsJSON) {
                        var carsList = JSON.parse(carsJSON);

                        for (let i = 0; i < carsList.length; i++) {
                            var imagesParse = JSON.parse(carsList[i].images)
                            let tableRow = "<tr><td>";
                            tableRow += "<img src='" + "./php_scripts/" + imagesParse[0] + "' width = '100px' height = '70px'";
                            tableRow += "</td><td>";
                            tableRow += carsList[i].type;
                            tableRow += "</td><td>";
                            tableRow += carsList[i].mark;
                            tableRow += "</td><td>";
                            tableRow += carsList[i].model;
                            tableRow += "</td><td>";
                            tableRow += carsList[i].manufacture_year;
                            tableRow += "</td><td>";
                            tableRow += carsList[i].kilometers;
                            tableRow += "</td><td>";
                            tableRow += carsList[i].price;
                            tableRow += "</td><td>";
                            tableRow += carsList[i].status;
                            tableRow += "</td><td>";
                            tableRow += "<button class='btn btn-warning mr-1' id='btn" + carsList[i].id + "' onclick='editCar(" + carsList[i].id + ")'>Uredi"
                            tableRow += "</td></tr>";
                            $("#table").append(tableRow);
                        }
                    })
                })

                function editCar(id) {
                    return location.href = "./php_scripts/edit_vehicle.php?id=" + id;
                }

                function deleteCar(id) {
                    return location.href = "./php_scripts/delete_vehicle.php?id=" + id;
                }
            </script>
        </body>
    </body>
</html>
