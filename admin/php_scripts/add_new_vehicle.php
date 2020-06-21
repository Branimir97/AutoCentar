<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {

    include "db.php";

   //dohvat svih elemenata forme
   $type = $_POST['type'];
   $status = $_POST['status'];
   $title = $_POST['title'];
   $mark = $_POST['mark'];
   $model = $_POST['model'];
   $manufacture_year = $_POST['manufacture_year'];
   $model_year = $_POST['model_year'];
   $kilometers = $_POST['kilometers'];
   $motor_power = $_POST['motor_power'];
   $transmission = $_POST['transmission'];
   $gears = $_POST['gears'];
   $motor_capacity = $_POST['motor_capacity'];
   $consumption = $_POST['consumption'];
   $price = $_POST['price'];

   $images = $_FILES['images'];

   $phpFileUploadErrors = array(
    0 => "There is no error, the file uploaded with success",
    1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
    2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
    3 => "The uploaded file was only partially uploaded",
    4 => "No file was uploaded",
    6 => "Missing a temporary folder",
    7 => "Failed to write file to disk",
    8 => "A PHP extension stopped the file upload"
);
   
   if(isset($_POST['submit'])){

    if(!isset($_POST['additional_equipment'])) {
        $equipment = 0;
    } else {
        $equipment = json_encode($_POST['additional_equipment'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); //zastavica za kodiranje višebajtnih znakova, bilo potrebno zbog array to string conversiona i ne ispisivanja specijalnih znakova č ć š 
    }

    $image_urls = array();
    $image_tmp_names = array();

   if(!empty($_FILES['images']['name'][0])) {
       $reArrayedImages = reArrayImages($images);
       //pre_r($reArrayedImages);

       for($i = 0; $i < count($reArrayedImages); $i++) {
            if($reArrayedImages[$i]['error']) {
                echo $reArrayedImages[$i]['name'] ."-> ".$phpFileUploadErrors[$reArrayedImages[i]['error']];
            }
            else {
                $allowed_extensions = array('jpg', 'jpeg', 'png');
                $explodedName = explode(".", $reArrayedImages[$i]['name']);
                $current_extension = strtolower(end($explodedName));

                if(!in_array($current_extension, $allowed_extensions)) {
                    echo $reArrayedImages[$i]['name'] . " -> invalid file extension";
                }
                else {
                    $destination_folder = "uploaded_images/";
                    array_push($image_tmp_names, $reArrayedImages[$i]['tmp_name']);
                    array_push($image_urls, $destination_folder . $reArrayedImages[$i]['name']);

                     echo '<div class="bg-primary">';
                         echo '<p>'. $reArrayedImages[$i]['name'] ." ----> ".$phpFileUploadErrors[$reArrayedImages[$i]['error']].'</p>';
                     echo '</div>';
                    }  
                }
            }

            if(count($image_urls)>=3 && count($image_urls) <=10) {
                $query = "INSERT INTO vehicles (type, status, title, mark, model, manufacture_year, model_year, 
                    kilometers, motor_power, transmission, gears, motor_capacity, consumption, additional_equipment, price, images)
                        VALUES (:type, :status, :title, :mark, :model, :manufacture_year, :model_year, 
                    :kilometers, :motor_power, :transmission, :gears, :motor_capacity, :consumption, :additional_equipment, :price, :images)";
    
            $stmt = $pdo->prepare($query);
            $stmt->execute(array(
                'type' => $type, 
                'status' => $status,
                'title' => $title, 
                'mark' => $mark, 
                'model' => $model,
                'manufacture_year' => $manufacture_year,
                'model_year' => $model_year,
                'kilometers' => $kilometers,
                'motor_power' => $motor_power,
                'transmission' => $transmission,
                'gears' => $gears,
                'motor_capacity' => $motor_capacity,
                'consumption' => $consumption,
                'additional_equipment' => $equipment,
                'price' => $price,
                'images' => json_encode($image_urls, JSON_UNESCAPED_SLASHES)
            ));
    
            for($i = 0; $i< count($image_urls); $i++) {
                move_uploaded_file($image_tmp_names[$i], $image_urls[$i]);
            }
    
            echo "Preusmjeravanje... <div class='spinner-border spinner-border-sm'></div>";
                    echo '
                        <script>
                            setTimeout(function() {
                                window.location.href = "../adminpanel.php"
                            }, 5000)
                        </script>
                    ';
           } else {
                echo "Min 3. slike, max 10 slika";
           } 
       } 
    }
}

function pre_r($array) {
       echo "<pre>"; // radi lakše vizualizacije polja
       print_r($array);
       echo "</pre>";
}

function reArrayImages($array) {
    $new_array = array();
    $image_count = count($array['name']);
    $image_keys = array_keys($array);
    
    for($i = 0; $i < $image_count; $i++) {
        foreach($image_keys as $key) {
            $new_array[$i][$key] = $array[$key][$i];
        }
    }

    return $new_array;
}

?>