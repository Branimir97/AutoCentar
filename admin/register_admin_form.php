<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dodaj novog administratora</title>

        <!-- CSS stylesheet -->
        <link
        rel="stylesheet" href="../css/register_admin_form.css">

        <!-- Icon -->
        <link 
        rel="icon" href="../images/icon2.png">

        <!-- FontAwesome library-->
        <script src="https://kit.fontawesome.com/6aa1bd9ffa.js" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link
        rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="jumbotron p-3 bg-primary text-white mb-0">
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

            <h4 class="text-center bg-light p-3">Forma za dodavanje novog administratora</h4>
            <a class="ml-2" href="./adminpanel.php">
                <i style="font-size:30px" class="fas fa-long-arrow-alt-left"></i>
                Povratak u izbornik</a>

            <div id="msg"></div>
            <main class="container mt-3 d-flex justify-content-center">

                <form action="./php_scripts/register_admin.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Ime</span>
                        </div>
                        <input type="text" class="form-control" placeholder="" name="firstname" id="fname" />
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Prezime</span>
                        </div>
                        <input type="text" class="form-control" placeholder="" name="lastname" id="lname" />
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">E-mail adresa</span>
                        </div>
                        <input class="form-control" placeholder="" name="email" id="email" />
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Lozinka</span>
                        </div>
                        <input type="password" class="form-control" placeholder="" name="password" id="password" />
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit" name="submit">Dodaj novog administratora</button>
                    </div>
                </form>
            </main>
            <script>
                var obj = {};
                var objJSON;
                function createObject() {
                    obj.fname = $("#fname").val();
                    obj.lname = $("#lname").val();
                    obj.email = $("#email").val();
                    obj.password = $("#password").val();

                    objJSON = JSON.stringify(obj);
                }

                $(document).ready(function () {

                    var form = $("form");

                    form.on("submit", function (event) {
                        event.preventDefault();

                        var formData = form.serialize();
                        createObject();

                        $.ajax({
                            url: form.attr("action"),
                            method: form.attr("method"),
                            data: {
                                'object': objJSON
                            },
                            success: function (msg) {
                                $("#msg").html("<h5 class='text-center p-3'>" + msg + "</h5>")
                            }
                        })
                    })
                })
        </script>
    </body>
</html>
