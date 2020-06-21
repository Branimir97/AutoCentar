<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prijava u Admin Panel</title>

        <!-- CSS stylesheet -->
        <link
        rel="stylesheet" href="../css/login_form.css">

        <!-- Icon -->
        <link 
        rel="icon" href="./images/icon2.png">

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
        <div class="jumbotron bg-info text-center text-white">
            <h2>Prijava u Admin Panel</h2>
        </div>

        <div id="msg"></div>
        <div class="container d-flex justify-content-center">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email adresa:</label>
                    <input type="email" class="form-control" name="email" id="email"/>
                </div>
                <div class="form-group">
                    <label for="password">Lozinka:</label>
                    <input type="password" class="form-control" name="password" id="password"/>
                </div>
                <div class="text-center">
                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember"/>
                        <label for="remember">Zapamti me</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Prijavi se</button>
                </div>
            </form>
        </div>

        <script>
            var obj = {};
            var objJSON;
            function createObject() {
                obj.email = $("#email").val();
                obj.password = $("#password").val();
                obj.remember = $("#remember").prop("checked");
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
                            $("#msg").html("<h5 class='text-center'>" + msg + "</h5>")
                        }
                    });
                });
            });
        </script>


        <?php
        if(isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            $email = $_COOKIE['email'];
            $password = $_COOKIE['password'];

            echo "
            <script>
                document.getElementById('email').value = '{$email}';
                document.getElementById('password').value  = '{$password}';
            </script>
            ";
        } 
    ?>
    </body>
</html>
