<?php

session_start();
include 'db.php';

$id = $_POST['carsId'];
$sql = "DELETE FROM vehicles WHERE id=".$id;
$pdo->exec($sql);

echo "Brisanje vozila u toku...";
    echo '
        <script>
            setTimeout(function() {
                window.location.href = "../adminpanel.php"
            }, 4000)
        </script>
    ';

?>

