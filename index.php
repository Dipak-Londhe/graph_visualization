<?php

$con = mysqli_connect("localhost", "root", "", "wsn");

global $notification1, $colord,  $bgcolord, $time, $filename;

$notification = "";
$colord = "black";
$bgcolor = "white";
$time = 10;


$filename = "nope";
if (isset($_POST["check"])) {


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $time = 3000;

    if (file_exists($target_file)) {
        $notification = " file alredy exist ";
        $colord = "#ffa200";
        $bgcolord = "rgb(255,246,206)";
    } else {

        if ($imageFileType != "csv") {

            $notification = " please upload csv file only ";
            $bgcolord = "red";

            $colord = "red";
            $bgcolord = "rgba(255,0,0,0.2)";
        } else {

            if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
                $notification = "The file " . htmlspecialchars(basename($_FILES["fileupload"]["name"])) . " has been uploaded.";

                $bgcolord = "rgb(198, 250, 198)";
                $colord = "#00c300c9";


                $filename = basename(htmlspecialchars(basename($_FILES["fileupload"]["name"])), '.csv');
               $table = " CREATE TABLE `$filename`( `id` INT,  `device_type` VARCHAR(144) ,  `mac_address` VARCHAR(144) ,  `reg_time` VARCHAR(144) ,  `name` VARCHAR(144) ,  `location` VARCHAR(144) , `config_time` VARCHAR(144) ,  `update_time` VARCHAR(144), `repeater_id` VARCHAR(144) ,`d_c_id` VARCHAR(144));";

                $con->query($table);
             
                $file = fopen("uploads/" . htmlspecialchars(basename($_FILES["fileupload"]["name"])) . "", "r");
              

                while ($result = fgetcsv($file)) {
                    if ($result[1] != "devicetype" || $result[2] != "macaddress") {

                        $sqlcsv = " INSERT INTO `$filename`(`id`, `device_type`, `mac_address`, `reg_time`, `name`, `location`, `config_time`, `update_time`, `repeater_id`, `d_c_id`) VALUES ('" . $result[0] . "','" . $result[1] . "','" . $result[2] . "','" . $result[3] . "','" . $result[4] . "','" . $result[5] . "','" . $result[6] . "','" . $result[7] . "','" . $result[8] . "','" . $result[9] . "'); ";

                        $con->query($sqlcsv);
                    }
                }


                $con->close();
            } else {
                $notification = "Sorry, there was an error uploading your file.";
                $colord = "red";
                $bgcolord = "rgba(255,0,0,0.2)";
            }
        }
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css">
</head>

<body>



    <div class="nav">



        <div class="graph" onclick="toggle();">

            <i class="fa-solid fa-bars-staggered"></i>
            Filter

        </div>


        <div class="img">
            Graph
        </div>

        <div class="graph chart" onclick="toggle1();">
            <i class="fa-solid fa-signal"></i>
            Info

        </div>


    </div>



    <div class="filter toggle">


        <a href="csvfiles.php">
            <div class="item ">
                <i class="fa-solid fa-diagram-project"></i>
                graph from db
            </div>
        </a>
        <a href="datad.php">
            <div class="item">
                <i class="fa-solid fa-database"></i>

                data from db
            </div>
        </a>



        <a href="index.php">
            <div class="item i active">
                <i class="fa-solid fa-folder-open"></i>
                select csv
            </div>
        </a>

        <a href="csv.php">
            <div class="item ">
                <i class="fa-solid fa-diagram-project"></i>

                graph from csv
            </div>
        </a>


        <div class="item toggle1 light">
            <i class="fa-solid fa-moon"></i>
            light / dark mode
        </div>


    </div>

    <div class="color toggle">
        <div class="item">

            Coordinator
            <i class="fa-solid fa-circle"></i>
        </div>
        <div class="item">

            Repeater&nbsp&nbsp&nbsp&nbsp&nbsp
            <i class="fa-solid fa-circle"></i>
        </div>
        <div class="item">

            Sensor&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp
            <i class="fa-solid fa-circle"></i>
        </div>

    </div>


    <div class="container">

        <?php



        echo " 

      <div class='notification' style='background-color:" . $bgcolord . ";color:" . $colord . ";'> " . $notification . " . </div>

      <script>  
    

    let container=document.getElementsByClassName('notification')[0];

    setTimeout(() => {

        container.style.opacity='0';
        
    },  " . $time . " );
      
      </script>

      "

        ?>



        <h3 class="h3"> Select your csv file </h3>



        <form action="index.php" method="post" onsubmit="return validate();" enctype="multipart/form-data">

            <label for="fileupload"> <i class="fa-solid fa-file-csv"></i> </label>
            <input type="file" name="fileupload" id="fileupload">
            <h4 id="h4"> Please fill this field </h4>

            <div>
                <input type="checkbox" name="check" id="check" value="yes" checked>
            </div>

            <div class="file"></div>

            <button type="submit"> &nbsp Next &nbsp
                <i class="fa-solid fa-arrow-right"></i>
            </button>

        </form>

    </div>

    <script src="js/index.js"> </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>



</body>

</html>