<?php

$con = mysqli_connect("localhost", "root", "", "ceat");
global $table;
$table = "";

// session_start();
if (isset($_GET['dd'])) {
    $table = $_GET['dd'];
} else {


    header('location:datafiles.php');
    die();
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
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>


    <link rel="stylesheet" href="css/data1.css">


    <style>
        .badge {
            /* background-color: rgb(255, 226, 231);
            color: rgb(255, 61, 93); */
            width: fit-content;
            padding: 5px 8px;
            font-size: 16px;
            border-radius: 2px;
        }

        .toggle1:hover {
            cursor: pointer;
        }
    </style>


</head>

<body>



    <div class="nav">



        <div class="graph" onclick="toggle();">

            <i class="fa-solid fa-bars-staggered"></i>
            Filter

        </div>


        <div class="img" onclick="download()">
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

        <?php

        echo '

    <a href="chart.php?dd=' . $table . '">
        <div class="item ">
        <i class="fa-solid fa-chart-pie"></i>
            Analysis of data 
        </div>
    </a>

';


        ?>
        <a href="datad.php">
            <div class="item i active">
                <i class="fa-solid fa-database"></i>

                data from db
            </div>
        </a>



        <a href="index.php">
            <div class="item ">
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

        $con = mysqli_connect("localhost", "root", "", "wsn");

        $sql = " SELECT * FROM `$table` ";
        $data = $con->query($sql);


        while ($result = $data->fetch_assoc()) {

            $dd = $result['device_type'];

            echo '
                    
                    <div class="d_con">
            <div class="badge ' . $dd . '">
                ' . $result['device_type'] . '            </div>
            <div class="name">
                <div class="name1"> ' . $result['name'] . ' . </div>
                <div class="name2"> <i class="fa-solid fa-location"></i>  &nbsp;' . $result['location'] . '  </div>

            </div>
            <div class="info">
                regtime of the wsn is ' . $result['reg_time'] . '  . updateime of the wsn is ' . $result['update_time'] . ' . configutime of the wsn is ' . $result['config_time'] . ' . macaddress of the wsn is ' . $result['mac_address'] . ' .
        </div>
            <div class="id">

                <div class="id1">
                    <div class="d1">
                        <div>
                        ' . $result['id'] . '
                        </div>
                    </div>
                    <div class="d2"> &nbsp; node id </div>
                </div>

                <div class="id1">
                    <div class="d1">
                        <div>
                        ' . $result['repeater_id'] . '
                        </div>
                    </div>
                    <div class="d2"> repeater id </div>

                </div>

                <div class="id1">
                    <div class="d1">
                        <div>
                        ' . $result['d_c_id'] . '
                        </div>
                    </div>
                    <div class="d2"> device id </div>

                </div>

            </div>
        </div>
                    
                    
                    
                    
                    
                    
                    ';
        }




        ?>






    </div>

    <script src="js/csvfiles.js"> </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        let light_color = ['rgb(251, 251, 250)', 'white', 'white', 'rgb(130, 130, 130)', 'black', 'silver'];
        let dark_color = ['rgb(61, 61, 61)', 'rgb(113, 113, 113)', 'rgb(194, 194, 194)', 'rgb(47, 47, 47)', 'white', 'rgb(113, 113, 113)'];





        let body = document.getElementsByTagName("body")[0];

        let container1 = document.getElementsByClassName("d_con");

        let nav = document.getElementsByClassName("nav")[0];

        let graph = document.getElementsByClassName("graph")[0];

        let chart = document.getElementsByClassName("chart")[0];

        let filter = document.getElementsByClassName("filter")[0];

        let color = document.getElementsByClassName("color")[0];

        let a = document.getElementsByClassName("item");


        let name1 = document.getElementsByClassName("name1");

        let info = document.getElementsByClassName("info");




        let color_array = [];

        let active = document.getElementsByClassName("active")[0];


        function colord() {



            color_array = [...JSON.parse(localStorage.getItem('color'))];

            if ((color_array[0] == "rgb(251, 251, 250)" && color_array[1] == "white" && color_array[2] == "white" &&
                    color_array[3] == "rgb(130, 130, 130)") || (color_array[0] == "rgb(61, 61, 61)" && color_array[1] == "rgb(113, 113, 113)" && color_array[2] == "rgb(194, 194, 194)" &&
                    color_array[3] == "rgb(47, 47, 47)")) {


                body.style.background = `${color_array[0]}`;

                nav.style.background = `${color_array[1]}`;
                graph.style.background = `${color_array[2]}`;
                chart.style.background = `${color_array[2]}`;
                color.style.background = `${color_array[2]}`;
                filter.style.background = `${color_array[2]}`;




                for (let i = 0; i < a.length; i++) {
                    a[i].style.color = `${color_array[3]}`;
                }


                for (let i = 0; i < name1.length; i++) {
                    name1[i].style.color = `${color_array[4]}`;
                }


                for (let i = 0; i < info.length; i++) {
                    info[i].style.color = `${color_array[4]}`;
                }



                for (let i = 0; i < container1.length; i++) {
                    container1[i].style.background = `${color_array[1]}`;
                }




            } else {
                alert("locastorage error");
            }


            active.style.color = "rgb(255, 61, 93)";


        }


        if (localStorage.getItem('mode') == "dark") {

            localStorage.setItem('color', JSON.stringify(dark_color));
            localStorage.setItem('mode', 'dark');
            colord();


        } else if (localStorage.getItem('mode') == "light") {

            localStorage.setItem('color', JSON.stringify(light_color));
            localStorage.setItem('mode', 'light');
            colord();

        } else {

            localStorage.setItem('color', JSON.stringify(light_color));
            localStorage.setItem('mode', 'light');
            colord()

        }

        let lighttoggle = document.getElementsByClassName("toggle1")[0];

        lighttoggle.addEventListener('click', () => {

            if (lighttoggle.classList.contains("light")) {
                lighttoggle.classList.toggle("light");

                localStorage.setItem('color', JSON.stringify(dark_color));
                localStorage.setItem('mode', 'dark');
                colord();


            } else {
                lighttoggle.classList.toggle("light");
                localStorage.setItem('color', JSON.stringify(light_color));
                localStorage.setItem('mode', 'light');
                colord();
            }

        });


        active.style.color = "rgb(255, 61, 93)";
    </script>




</body>

</html>