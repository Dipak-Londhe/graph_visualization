<?php

$con = mysqli_connect("localhost", "root", "", "ceat");
global $table;
$table = "";

// session_start();
if (isset($_GET['dd'])) {
    $table = $_GET['dd'];
} else {


    header('location:csvfiles.php');
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <link rel="stylesheet" href="css/graph.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js" integrity="sha512-01CJ9/g7e8cUmY0DFTMcUw/ikS799FHiOA0eyHsUWfOetgbx/t6oV4otQ5zXKQyIrQGTHSmRVPIgrgLcZi/WMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>

    <style>
        .rotate {
            transform: rotate(180deg);
            font-size: 19px;
        }

        .dd {

            font-size: 19px;

        }
    </style>

</head>

<body id="node1">



    <div class="nav" id="nav">



        <div class="graph" onclick="toggle()">

            <i class="fa-solid fa-bars-staggered"></i>
            Filter

        </div>




        <div class="image">
            <a href="" class="ds" download> <span> download </span> <i class="fa-solid fa-download"></i> </a>
        </div>

        <div class="graph chart" onclick="toggle1()">
            <i class="fa-solid fa-signal"></i>
            Info

        </div>

    </div>

    <div class="filter toggle">
        <a href="csvfiles.php">
            <div class="item i active">
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
            <div class="item active">
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



    <div class="container" id="container">
        <div class="dd">
            <i class="fa-solid fa-database"></i> Mysql
        </div>
        <h2> Wireless Sensor Network </h2>
        <div class="nodes">
            <div class="level1">
                <?php

                $con = mysqli_connect("localhost", "root", "", "wsn");

                $sql = " SELECT * FROM `$table` WHERE `device_type`='coordinator-node' ;";
                $data = $con->query($sql);


                while ($result = $data->fetch_assoc()) {
                    $dd = "<span class='cn'>" . $result['id'] . "</span><span class='cnr' >" . $result['repeater_id'] . "</span>";
                    echo '<div class="c div">&nbspC' . $dd . '</div>';
                }




                ?>


            </div>
            <div class="level2">

                <?php

                $con = mysqli_connect("localhost", "root", "", "wsn");

                $sql = " SELECT * FROM `$table` WHERE `device_type`='repeater-node';";
                $data = $con->query($sql);

                while ($result = $data->fetch_assoc()) {


                    $dd = "<span class='rn'>" . $result['id'] . "</span><span class='rnr' >" . $result['repeater_id'] . "</span>";
                    echo '<div class="r div">&nbspR' . $dd . '</div>';
                }




                ?>


            </div>
            <div class="level3">


                <?php

                $con = mysqli_connect("localhost", "root", "", "wsn");

                $sql = " SELECT * FROM `$table` WHERE `device_type`='sensor-node' ;";
                $data = $con->query($sql);

                while ($result = $data->fetch_assoc()) {

                    $dd = "<span class='sn'>" . $result['id'] . "</span><span class='snr' >" . $result['repeater_id'] . "</span>";
                    echo '<div class="s div">&nbspS' . $dd . '</div>';
                }

                ?>
            </div>

        </div>
    </div>


    <script src="js/graph.js"> </script>

    <script>
        //body container+nav button+menu color
        //body container+nav button+menu color
        let light_color = ['rgb(251, 251, 250)', 'white', 'white', 'rgb(130, 130, 130)', 'black', 'silver'];
        let dark_color = ['rgb(61, 61, 61)', 'rgb(113, 113, 113)', 'rgb(194, 194, 194)', 'rgb(47, 47, 47)', 'white', 'rgb(113, 113, 113)'];



        let body = document.getElementsByTagName("body")[0];

        let containerd = document.getElementsByClassName("container")[0];

        let navd = document.getElementsByClassName("nav")[0];

        let graphd = document.getElementsByClassName("graph")[0];

        let chartd = document.getElementsByClassName("chart")[0];

        let filterd = document.getElementsByClassName("filter")[0];

        let color = document.getElementsByClassName("color")[0];

        let ad = document.getElementsByClassName("item");

        let image = document.getElementsByClassName("image")[0];

        let h2 = document.getElementsByTagName("h2")[0];


        let color_array = [];

        let active = document.getElementsByClassName("active")[0];

        function colord() {



            color_array = [...JSON.parse(localStorage.getItem('color'))];

            if ((color_array[0] == "rgb(251, 251, 250)" && color_array[1] == "white" && color_array[2] == "white" &&
                    color_array[3] == "rgb(130, 130, 130)") || (color_array[0] == "rgb(61, 61, 61)" && color_array[1] == "rgb(113, 113, 113)" && color_array[2] == "rgb(194, 194, 194)" &&
                    color_array[3] == "rgb(47, 47, 47)")) {


                body.style.background = `${color_array[0]}`;
                containerd.style.background = `${color_array[1]}`;
                navd.style.background = `${color_array[1]}`;
                graphd.style.background = `${color_array[2]}`;
                chartd.style.background = `${color_array[2]}`;
                image.style.background = `${color_array[2]}`;
                color.style.background = `${color_array[2]}`;
                filterd.style.background = `${color_array[2]}`;

                h2.style.color = `${color_array[4]}`;

                console.log("dddddddd");




                for (let i = 0; i < ad.length; i++) {
                    ad[i].style.color = `${color_array[3]}`;
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








        function linedraw(x1, y1, x2, y2) {
            if (x2 < x1) {
                var tmp;
                tmp = x2;
                x2 = x1;
                x1 = tmp;
                tmp = y2;
                y2 = y1;
                y1 = tmp;
            }

            var lineLength = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));
            var m = (y2 - y1) / (x2 - x1);

            var degree = Math.atan(m) * 180 / Math.PI;

            containerd.innerHTML += "<div class='line' style='transform-origin: top left; transform: rotate(" + degree + "deg); width: " + lineLength + "px; height: 2px; background: rgb(255, 61, 93); position: absolute; top: " + y1 + "px; left: " + x1 + "px;'></div>";
        }

        function refresh() {

            //repeater to coordinator
            let c_array = document.getElementsByClassName("cn").length;
            let r_array = document.getElementsByClassName("rnr").length;

            for (let a = 0; a < r_array; a++) {

                for (let d = 0; d < c_array; d++) {


                    let c = document.getElementsByClassName("cn")[d];
                    let r = document.getElementsByClassName("rnr")[a];

                    if (c.innerText == r.innerText) {


                        let y1 = window.scrollY + c.getBoundingClientRect().top;
                        let x1 = window.scrollX + c.getBoundingClientRect().left;


                        let y2 = window.scrollY + r.getBoundingClientRect().top;
                        let x2 = window.scrollX + r.getBoundingClientRect().left;

                        linedraw(x1, y1, x2, y2);
                    }
                }
            }


            // coordinator to coordinator ;
            let c_array1 = document.getElementsByClassName("cn").length;
            let c_array2 = document.getElementsByClassName("cnr").length;



            for (let a = 0; a < c_array1; a++) {

                for (let d = 0; d < c_array2; d++) {


                    let c = document.getElementsByClassName("cn")[a];
                    let r = document.getElementsByClassName("cnr")[d];

                    if (c.innerText == r.innerText) {


                        let y1 = window.scrollY + c.getBoundingClientRect().top;
                        let x1 = window.scrollX + c.getBoundingClientRect().left;


                        let y2 = window.scrollY + r.getBoundingClientRect().top;
                        let x2 = window.scrollX + r.getBoundingClientRect().left;

                        linedraw(x1, y1, x2, y2);

                    }
                }
            }




            //  sensor to repeater ;
            let s_array = document.getElementsByClassName("snr").length;
            let r2_array = document.getElementsByClassName("rn").length;

            for (let a = 0; a < s_array; a++) {

                for (let d = 0; d < r2_array; d++) {


                    let r = document.getElementsByClassName("rn")[d];
                    let s = document.getElementsByClassName("snr")[a];

                    if (r.innerText == s.innerText) {


                        let y1 = window.scrollY + r.getBoundingClientRect().top;
                        let x1 = window.scrollX + r.getBoundingClientRect().left;


                        let y2 = window.scrollY + s.getBoundingClientRect().top;
                        let x2 = window.scrollX + s.getBoundingClientRect().left;


                        linedraw(x1, y1, x2, y2);

                    }
                }
            }



            //  sensor to coordinator ;
            let s_array5 = document.getElementsByClassName("snr").length;
            let c_array5 = document.getElementsByClassName("cnr").length;



            for (let a = 0; a < s_array5; a++) {


                for (let d = 0; d < c_array5; d++) {


                    let r = document.getElementsByClassName("cnr")[d];
                    let s = document.getElementsByClassName("snr")[a];

                    if (r.innerText == s.innerText) {

                        let y1 = window.scrollY + r.getBoundingClientRect().top;
                        let x1 = window.scrollX + r.getBoundingClientRect().left;


                        let y2 = window.scrollY + s.getBoundingClientRect().top;
                        let x2 = window.scrollX + s.getBoundingClientRect().left;

                        linedraw(x1, y1, x2, y2);
                    }
                }
            }

            //  repeater to repeater ;
            let r_array1 = document.getElementsByClassName("rnr").length;
            let r_array2 = document.getElementsByClassName("rn").length;

            for (let a = 0; a < r_array1; a++) {

                for (let d = 0; d < r_array2; d++) {


                    let r = document.getElementsByClassName("rn")[d];
                    let s = document.getElementsByClassName("rnr")[a];

                    if (r.innerText == s.innerText) {


                        let y1 = window.scrollY + r.getBoundingClientRect().top;
                        let x1 = window.scrollX + r.getBoundingClientRect().left;


                        let y2 = window.scrollY + s.getBoundingClientRect().top;
                        let x2 = window.scrollX + s.getBoundingClientRect().left;


                        linedraw(x1, y1, x2, y2);

                    }
                }
            }




        }



        refresh();
        window.addEventListener('resize', () => {

            let div1 = document.getElementsByClassName("line").length;


            for (let i = 0; i < div1; i++) {
                let dd = document.getElementsByClassName("line")[i];
                dd.style.display = 'none';
            }
            refresh();
            divtocanvas();

        });


        // target elements with the "draggable" class
        interact('.div').draggable({
            // enable inertial throwing
            inertia: true,
            // keep the element within the area of it's parent
            modifiers: [
                interact.modifiers.restrictRect({
                    // restriction: 'parent',
                    endOnly: true
                })
            ],
            // enable autoScroll
            autoScroll: true,

            listeners: {
                // call this function on every dragmove event
                move: dragMoveListener,

                // call this function on every dragend event
                end(event) {
                    var textEl = event.target.querySelector('p')

                    textEl && (textEl.textContent =
                        'moved a distance of ' +
                        (Math.sqrt(Math.pow(event.pageX - event.x0, 2) +
                            Math.pow(event.pageY - event.y0, 2) | 0))
                        .toFixed(2) + 'px')

                    let div1 = document.getElementsByClassName("line").length;
                    // setTimeout( () => {

                    for (let i = 0; i < div1; i++) {
                        let dd = document.getElementsByClassName("line")[i];
                        dd.style.display = 'none';
                        // dd.remove();

                    }
                    refresh();

                    divtocanvas();



                }
            }
        })

        function dragMoveListener(event) {
            var target = event.target
            // keep the dragged position in the data-x/data-y attributes
            var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
            var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy

            // translate the element
            target.style.transform = 'translate(' + x + 'px, ' + y + 'px)'

            // update the posiion attributes
            target.setAttribute('data-x', x)
            target.setAttribute('data-y', y)
            let div1 = document.getElementsByClassName("line").length;

        }

        // this function is used later in the resizing and gesture demos
        window.dragMoveListener = dragMoveListener;






        function divtocanvas() {

            let dd = document.getElementsByTagName("html")[0];
            let nav = document.getElementById("nav");
            let container = document.getElementById("container");
            let ds = document.querySelector(".ds");


            nav.style.transition = "2s";
            nav.style.opacity = "0";

            html2canvas(dd).then(function(canvas) {

                nav.style.opacity = "1";
                nav.style.transition = "";

                canvas.style.position = "absolute";
                canvas.style.top = "44px";
                canvas.style.left = "0";
                canvas.style.transform = "scale(0.8)";
                canvas.style.overflow = "hidden";
                canvas.style.zIndex = "-3";
                document.body.appendChild(canvas);

                domtoimage.toPng(canvas).then((data) => {
                    canvas.style.transform = "scale(0.1)";
                    let nav = document.getElementById("nav");
                    ds.href = data;
                    // canvas.style.display="none";
                    canvas.remove();

                });

                nav.style.transition = "";
            nav.style.opacity = "1";






            });



        }

          let nav = document.getElementById("nav");
          


            nav.style.transition = "";
            nav.style.opacity = "1";

        divtocanvas();
        nav.style.transition = "";
            nav.style.opacity = "1";

    </script>


</body>

</html>