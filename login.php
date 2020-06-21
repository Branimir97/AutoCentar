<?php

    

    if($_SERVER["REQUEST_METHOD"]==="POST"){
        session_start();

        include './admin/php_scripts/db.php';

        $object = json_decode($_POST['object']);
        $email = $object->email;
        $password = $object->password;
        $remember = $object->remember;

        if(empty($email) || empty ($password)){
            $errors[] = 'Unesite oba navedena parametra i pokušajte ponovno.';
        }
       
        else {
            
            $query = "SELECT * FROM admins WHERE email = '{$email}'";
            $stmt = $pdo->query($query);

            if($stmt->rowCount()>0){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                   
                $fname = $row['firstName'];

                if(!password_verify($password, $row['password'])) {
                    $errors[] = "Lozinka nije ispravna.";
                }
            }
            else{
                $errors[] = "Korisnički račun ne postoji.";
            }
        }

        if(isset($errors))  {
            foreach($errors as $error) {
                echo $error;        
            } 
        } 
        else {
            if($remember) {
                setcookie('email', $email, time() + 60 * 60 * 2); //2h
                setcookie('password', $password, time() + 60 * 60 * 2); //2h
            }
            
            $_SESSION['fname'] = $fname;
            $_SESSION['email'] = $email;

            echo "Preusmjeravanje... <div class='spinner-border spinner-border-sm'></div>";
            echo '
                <script>
                    setTimeout(function() {
                        window.location.href = "./admin/adminpanel.php"
                    }, 2000)
                </script>
            ';
        }
        
    }

?>