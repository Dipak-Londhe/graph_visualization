<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>


    <link rel="stylesheet" href="css/csvfiles.css">




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

        $sql = " show tables ;";
        $data = $con->query($sql);

        while ($result = $data->fetch_assoc()) {


            $sql2 = " SELECT count(*) as `count` FROM `wsn`.`" . $result['Tables_in_wsn'] . "`; ";
            $data1 = $con->query($sql2);
            $count = 1;

            while ($result1 = $data1->fetch_assoc()) {

                $count = $result1['count'];
            }

            

            echo "

                    <div class='d_con'>
            <h3 class='h3'>
            <i class='fa-solid fa-file-csv'></i>
             &nbsp

               " . $result['Tables_in_wsn'] . "
            </h3>
        
            <h4>
          " . $count . "  nodes 
            <h4>
            <a href='datad.php?dd=" . $result['Tables_in_wsn'] . "'>
            <button> Next &nbsp <i class='fa-solid fa-arrow-right'></i> </button>
            </a>
            </div>
                    
                    ";
        }

        $con->close();




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

        let containerd = document.getElementsByClassName("d_con");

        let navd = document.getElementsByClassName("nav")[0];

        let graphd = document.getElementsByClassName("graph")[0];

        let chartd = document.getElementsByClassName("chart")[0];

        let filterd = document.getElementsByClassName("filter")[0];

        let color = document.getElementsByClassName("color")[0];

        let ad = document.getElementsByClassName("item");

        let h3 = document.getElementsByClassName("h3");



        let active = document.getElementsByClassName("active")[0];


        let color_array = [];

        function colord() {



            color_array = [...JSON.parse(localStorage.getItem('color'))];

            if ((color_array[0] == "rgb(251, 251, 250)" && color_array[1] == "white" && color_array[2] == "white" &&
                    color_array[3] == "rgb(130, 130, 130)") || (color_array[0] == "rgb(61, 61, 61)" && color_array[1] == "rgb(113, 113, 113)" && color_array[2] == "rgb(194, 194, 194)" &&
                    color_array[3] == "rgb(47, 47, 47)")) {


                body.style.background = `${color_array[0]}`;

                navd.style.background = `${color_array[1]}`;
                graphd.style.background = `${color_array[2]}`;
                chartd.style.background = `${color_array[2]}`;
                color.style.background = `${color_array[2]}`;
                filterd.style.background = `${color_array[2]}`;

                console.log("dddddddd");


                for (let i = 0; i < ad.length; i++) {
                    ad[i].style.color = `${color_array[3]}`;
                }




                for (let j = 0; j < containerd.length; j++) {
                    containerd[j].style.background = `${color_array[1]}`;
                }


                for (let j1 = 0; j1 < h3.length; j1++) {
                    h3[j1].style.color = `${color_array[4]}`;
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

        })
    </script>




</body>

</html>