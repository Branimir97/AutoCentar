<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dodaj novo vozilo</title>

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
    <div class="jumbotron p-3 bg-success text-white mb-0">
        <h2>Administrator sučelje
            <i class="fas fa-user-cog"></i>
        </h2>
        <h6>Prijavljeni ste kao Administrator -----
            <span><?=$_SESSION['fname'];?></span>
            <div class="spinner-grow text-danger spinner-grow-sm"></div>
        </h6>
        <h6>Korištena e-mail adresa -----
            <span><?=$_SESSION['email'];?></span>
        </div>


        <h4 class="text-center bg-light p-3">Forma za dodavanje novog vozila</h4>
        <a class="ml-2" href="./adminpanel.php">
            <i style="font-size:30px" class="fas fa-long-arrow-alt-left"></i>
            Povratak u izbornik</a>

        <main class="container mt-3">
            <form action="./php_scripts/add_new_vehicle.php" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-6">
                        <h6 class="text-center">Obavezni parametri za unos</h6>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Vrsta vozila</span>
                            </div>
                            <select class="form-control" id="type" name="type" required>
                                <option value="Osobno vozilo">Osobno vozilo</option>
                                <option value="Gospodarsko vozilo">Gospodarsko vozilo</option>
                            </select>
                        </div>

                        <div class="form-check-inline ml-3">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="Vozilo na lageru" required />Vozilo na lageru
                            </label>
                        </div>
                        <div class="form-check-inline ml-3 mb-3">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" value="Vozilo u dolasku" required />Vozilo u dolasku
                            </label>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Naziv vozila</span>
                            </div>
                            <input class="form-control" type="text" id="title" name="title" placeholder="npr. Golf 6 2.0 TDI GTD, webasto, full oprema" required />
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="mark">Marka vozila</label>
                                    <input class="form-control" type="text" id="mark" name="mark" placeholder="npr. Volkswagen" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="model">Model vozila</label>
                                    <input class="form-control" type="text" id="model" name="model" placeholder="npr. Golf VI" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="manufacture_year">Godina proizvodnje</label>
                                    <input class="form-control" type="number" min="1950" max="2020" id="manufacture_year" name="manufacture_year" placeholder="npr. 2010" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="model_year">Godina modela</label>
                                    <input class="form-control" type="number" min="1950" max="2020" id="model_year" name="model_year" placeholder="npr. 2008" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="kilometers">Kilometri</label>
                                    <input class="form-control" type="number" min="0" max="1000000" id="kilometers" name="kilometers" placeholder="npr. 195000" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="motor_power">Snaga motora [kW]</label>
                                    <input class="form-control" type="number" min="0" max="1000" id="motor_power" name="motor_power" placeholder="npr. 77" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="transmission">Mjenjač</label>
                                    <select class="form-control" id="transmission" name="transmission" required>
                                        <option value="Ručni">Ručni</option>
                                        <option value="Automatski">Automatski</option>
                                        <option value="Poluautomatski">Poluautomatski</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gears">Broj stupnjeva prijenosa</label>
                                    <input class="form-control" type="number" min="4" max="9" id="gears" name="gears" placeholder="npr. 5" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">

                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="motor_capacity">Kubikaža motora [cm3]</label>
                                    <input class="form-control" type="number" min="500" max="5000" id="motor_capacity" name="motor_capacity" placeholder="npr. 1598" required />
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="consumption">Potrošnja goriva [L/100km]</label>
                                    <input class="form-control" type="number" min="0" max="30" id="consumption" name="consumption" placeholder="npr. 6" required />
                                </div>
                            </div>
                        </div>
                        <h6>Dodatno</h6>
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="abs" name="additional_equipment[]" value="ABS" />
                                        ABS
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="esp" name="additional_equipment[]" value="ESP" />
                                        ESP
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="remote_lock" name="additional_equipment[]" value="Daljinsko zaključavanje" />
                                        Daljinsko zaključavanje
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="airbag" name="additional_equipment[]" value="Zračni jastuci (vozač + suvozač)" />
                                        Zračni jastuci (vozač + suvozač)
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="side_airbag" name="additional_equipment[]" value="Bočni zračni jastuci" />
                                        Bočni zračni jastuci
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="isofix" name="additional_equipment[]" value="Isofix (sustav vezanja sjedalice za dijete)" />
                                        Isofix
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="folding_rear_bench" name="additional_equipment[]" value="Djeljiva stražnja klupa" />
                                        Djeljiva stražnja klupa
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="electronic_motor_block" name="additional_equipment[]" value="Elektronska blokada motora" />
                                        Elektronska blokada motora
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="start_stop" name="additional_equipment[]" value="Start/Stop" />
                                        Start/Stop
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="rain_sensors" name="additional_equipment[]" value="Senzori za kišu" />
                                        Senzori za kišu
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="alarm" name="additional_equipment[]" value="Alarm" />
                                        Alarm
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="mf_steering_wheel" name="additional_equipment[]" value="Multifunkcionalni volan" />
                                        Multifunkcionalni volan
                                    </label>
                                </div>

                                <div class="form-check pl-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="park_sensors" name="additional_equipment[]" value="Parking senzori" />
                                        Parking senzori
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="alu_rims" name="additional_equipment[]" value="Aluminijski naplatci" />
                                        Aluminijski naplatci
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="clima" name="additional_equipment[]" value="Klima" />
                                        Klima
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="third_stop_light" name="additional_equipment[]" value="3. štop svjetlo" />
                                        3. štop svjetlo
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="cruise_control" name="additional_equipment[]" value="Tempomat" />
                                        Tempomat
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="electric_front_lifters" name="additional_equipment[]" value="El. podizači stakala (prednji)" />
                                        El. podizači stakala (prednji)
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="electric_rear_lifters" name="additional_equipment[]" value="El. podizači stakala (stražnji)" />
                                        El. podizači stakala (stražnji)
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="folding_mirrors" name="additional_equipment[]" value="El. sklopivi retrovizori" />
                                        El. sklopivi retrovizori
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="heated_folding_mirrors" name="additional_equipment[]" value="Grijanje el. retrovizora" />
                                        Grijanje el. retrovizora
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="tinted_glass" name="additional_equipment[]" value="Zatamnjena stakla"/>
                                        Zatamnjena stakla
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="fog_lights" name="additional_equipment[]" value="Maglenke" />
                                        Maglenke
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="roof_window" name="additional_equipment[]" value="Šiber (krovni prozor)" />
                                        Šiber (krovni prozor)
                                    </label>
                                </div>

                                <div class="form-check pl-0 pb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="touch_radio" name="additional_equipment[]" value="Radio na touch" />
                                        Radio na touch
                                    </label>
                                </div>

                                <div class="form-check pl-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" id="seven_seats" name="additional_equipment[]" value="7 sjedala" />
                                        7 sjedala
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="photos">Odabir fotografija (max 10 / podržani jpg, jpeg i png formati)</label>
                    <input class="form-control" type="file" id="photos" name="images[]" multiple="" required />
                </div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="price">Cijena vozila [kn]</label>
                            <input class="form-control" type="number" min="0" max="500000" id="price" name="price" placeholder="npr. 15000" required />
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-success mb-4" type="submit" name="submit">Spremi vozilo</button>
                    <button class="btn btn-danger mb-4" type="reset">Resetiraj formu</button>
                </div>
            </form>
        </main>
    </body>
    <script>
        /*$(document).ready(function () {
            let select_option = $("select option[value='$row['transmission']']");
            select_option.attr('selected', 'selected');
        });*/
    </script>
</html>
