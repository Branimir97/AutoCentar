<?php

if($_SERVER["REQUEST_METHOD"]==="POST"){

    include 'db.php';

    $object = json_decode($_POST['object']);

    $fname = $object->fname;
    $lname = $object->lname;
    $email = $object->email;
    $password = $object->password;

    if(empty($fname) || empty($lname) || empty($email) || empty($password)) {
        $errors[] = "Potrebno je unesti sve parametre.<br>";
    } else {
        $fname = filter_var($fname, FILTER_SANITIZE_STRING);
        $lname = filter_var($lname, FILTER_SANITIZE_STRING);

        $sql = "SELECT email FROM admins WHERE email = '{$email}'";
        $stmt = $pdo->query($sql);
        if($stmt->rowCount()>0) {
            $errors[] = "Administrator s navedenom e-mail adresom već postoji.<br>";
        }
        else {
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                echo "<span style='color:green'>$email je validna e-mail adresa.</span><br>";
            } else {
                $errors[] = "$email nije validna e-mail adresa.<br>";
            }
        }

        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $upperCase = preg_match("@[A-Z]@", $password);
        $lowerCase = preg_match("@[a-z]@", $password);
        $number = preg_match("@[0-9]@", $password);

        if(strlen($password)<8) {
            $errors[] = "<span style='color:purple'>Lozinka mora sadržavati min. 8 znakova.</span><br>";
        } 
        else if(!$upperCase || !$lowerCase || !$number) {
            $errors[] = "<span style='color:purple'>Lozinka mora sadržavati min. 1 veliko slovo, 1 malo slovo i 1 broj</span><br>";
        }
    }
    
    if(isset($errors)) {
        foreach($errors as $error) {
            echo $error;
        }
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO admins (firstName, lastName, email, password)
            VALUES (:firstName, :lastName, :email, :password)";

        $stmt = $pdo->prepare($query);
        $stmt->execute(array(
            'firstName' => $fname,
            'lastName' => $lname,
            'email' => $email,
            'password' => $hashed_password
        ));

        echo "Registracija u toku... <div class='spinner-border spinner-border-sm text-primary'></div>";
        echo '
            <script>
                setTimeout(function() {
                    window.location.href = "./adminpanel.php";
                }, 2000)
            </script>
        ';
    }
}

?>