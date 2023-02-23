<?php

$con = mysqli_connect("localhost", "root", "", "wsn");
global $table;
$table="";

global $n_count , $e_count , $c_count , $r_count , $s_count ;
    // session_start();
    if(isset($_GET['dd']))
    {
        $table=$_GET['dd'];

        $sql="SELECT count(*) as count FROM `$table`;";

       $dd=$con->query($sql);

       while($result=$dd->fetch_assoc())
       {
          $n_count=$result['count'];
       }

       $sql1="SELECT count(*) as count FROM `$table` WHERE `repeater_id`<>-1;";

       $dd1=$con->query($sql1);

       while($result1=$dd1->fetch_assoc())
       {
          $e_count=$result1['count'];
       }

       $sql="SELECT count(*) as count FROM `$table` WHERE `device_type`='coordinator-node';";

       $dd=$con->query($sql);

       while($result=$dd->fetch_assoc())
       {
          $c_count=$result['count'];
       }

       $sql="SELECT count(*) as count FROM `$table` WHERE `device_type`='repeater-node';";

       $dd=$con->query($sql);

       while($result=$dd->fetch_assoc())
       {
          $r_count=$result['count'];
       }

       $sql="SELECT count(*) as count FROM `$table` WHERE `device_type`='sensor-node';";

       $dd=$con->query($sql);

       while($result=$dd->fetch_assoc())
       {
          $s_count=$result['count'];
       }
    }
else
{
    
  
    header('location:index.php');
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
   

    <link rel="stylesheet" href="css/chart.css">

   
</head>

<body>



    <div class="nav">

      

        <div class="graph" onclick="toggle();">

        <i class="fa-solid fa-bars-staggered"></i>
         Filter

        </div>
        

        <div  class="img" onclick="download()">
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

        <a href="chart.php">
            <div class="item active">
            <i class="fa-solid fa-chart-pie"></i>
                Analysis of data 
            </div>
        </a>

        <a href="datad.php">
            <div class="item i ">
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
          light / dark  mode
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

        <div class="div">
            <div>
                <h3> Analysis of Edges and Nodes</h3>
            
            <canvas id="myChart"></canvas>

            </div>
        </div>

        <div class="div">
            <div>
                <h3>Analysis of Nodes</h3>
            
            <canvas id="myChart2"></canvas>

            </div>
        </div>

        <div class="div div1">
            <div>
                <h3>Analysis of Edges and sensor , repeater , coordinator </h3>
            
            <canvas id="myChart3"></canvas>

            </div>
        </div>
        

    </div>

   

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['edge', 'node'],
      datasets: [{
        label: ' total no ',
        data: <?php echo '['.$n_count.','.$e_count.']' ?>,
        borderWidth: 0,
        opacity:1
      }]
    },
    options: {
        options: {
                scales: {

                    xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
                }
            }
    }
  });

  const ctx2 = document.getElementById('myChart2');

new Chart(ctx2, {
  type: 'pie',
  data: {
    labels: ['sensor', 'repeater', 'coordinator'],
    datasets: [{
      label: ' nodes ',
      data: <?php echo '['.$s_count.','.$r_count.','.$c_count.']' ?>,
      borderWidth: 0,
      opacity:1
    }]
  },
  options: {
      options: {
              scales: {

                  xAxes: [{
                      gridLines: {
                          color: "rgba(0, 0, 0, 0)",
                      }
                  }],
                  yAxes: [{
                      gridLines: {
                          color: "rgba(0, 0, 0, 0)",
                      }
                  }]
              }
          }
  }
});

const ctx3 = document.getElementById('myChart3');

new Chart(ctx3, {
  type: 'bar',
  data: {
    labels: ['edges', 'sensor', 'repeater', 'coordinator'],
    datasets: [{
      label: ' total  no ',
      data:  <?php echo '['.$e_count.','.$s_count.','.$r_count.','.$c_count.']' ?>,
      backgroundColor: [

            'rgb(255, 99, 132)',
            '#f8c471',
            '#d6eaf8',
            'lightgreen'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            '#f8c471',
            '#d6eaf8',
            'lightgreen'

            ],
      borderWidth: 0,
      opacity:1
    }]
  },
  
});


let light_color=['rgb(251, 251, 250)','white','white','rgb(130, 130, 130)','black','silver'];
          let dark_color=['rgb(61, 61, 61)','rgb(113, 113, 113)','rgb(194, 194, 194)','rgb(47, 47, 47)','white','rgb(113, 113, 113)'];
          



let body=document.getElementsByTagName("body")[0];

let containerd=document.getElementsByClassName("div");

let navd=document.getElementsByClassName("nav")[0];

let graphd=document.getElementsByClassName("graph")[0];

let chartd=document.getElementsByClassName("chart")[0];

let filterd=document.getElementsByClassName("filter")[0];

let color=document.getElementsByClassName("color")[0];  

let ad=document.getElementsByClassName("item");

let h3=document.getElementsByTagName("h3");



    let active=document.getElementsByClassName("active")[0];


let color_array=[];

function colord()
{

    

color_array=[...JSON.parse(localStorage.getItem('color'))];

  if((color_array[0]=="rgb(251, 251, 250)" && color_array[1]=="white" && color_array[2]=="white"
     && color_array[3]=="rgb(130, 130, 130)") || (color_array[0]=="rgb(61, 61, 61)" && color_array[1]=="rgb(113, 113, 113)" && color_array[2]=="rgb(194, 194, 194)"
     && color_array[3]=="rgb(47, 47, 47)") )
     {


body.style.background=`${color_array[0]}`;

navd.style.background=`${color_array[1]}`;
graphd.style.background=`${color_array[2]}`;
chartd.style.background=`${color_array[2]}`;
color.style.background=`${color_array[2]}`;
filterd.style.background=`${color_array[2]}`;

console.log("dddddddd");


for(let i=0;i<ad.length;i++)
{
    ad[i].style.color=`${color_array[3]}`;
}




for(let j=0;j<containerd.length;j++)
{
    containerd[j].style.background=`${color_array[1]}`;
}


for(let j1=0;j1<h3.length;j1++)
{
    h3[j1].style.color=`${color_array[4]}`;
}


}

else
{
    alert("locastorage error");
}


active.style.color="rgb(255, 61, 93)"; 


}


if(localStorage.getItem('mode')=="dark")
{

            localStorage.setItem('color',JSON.stringify(dark_color));
        localStorage.setItem('mode','dark');
        colord();


}
else if (localStorage.getItem('mode')=="light")
{

        localStorage.setItem('color',JSON.stringify(light_color));
    localStorage.setItem('mode','light');
    colord();
    
}
else
{

            localStorage.setItem('color',JSON.stringify(light_color));
        localStorage.setItem('mode','light');
        colord()   

}

let lighttoggle=document.getElementsByClassName("toggle1")[0];

lighttoggle.addEventListener('click',()=>{

if(lighttoggle.classList.contains("light"))
{
    lighttoggle.classList.toggle("light");
    
localStorage.setItem('color',JSON.stringify(dark_color));
localStorage.setItem('mode','dark');
colord();

    
}
else
{
    lighttoggle.classList.toggle("light");
    localStorage.setItem('color',JSON.stringify(light_color));
    localStorage.setItem('mode','light');
    colord();
}

})

</script>


   
    <script src="js/graph.js"></script>
    

</body>

</html>