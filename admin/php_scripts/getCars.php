<?php

    include "db.php";

    $carList = [];
    $query = "SELECT * FROM vehicles";
    $stmt = $pdo->query($query);

    if($stmt->rowCount()>0) {
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($carList, $row);
        }
        echo json_encode($carList, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    } 
    else {
        echo "Error";
    }
      
?>