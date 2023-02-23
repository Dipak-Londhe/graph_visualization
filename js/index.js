          //body container+nav button+menu color
          let light_color=['rgb(251, 251, 250)','white','white','rgb(130, 130, 130)','black','silver'];
          let dark_color=['rgb(61, 61, 61)','rgb(113, 113, 113)','rgb(194, 194, 194)','rgb(47, 47, 47)','white','rgb(113, 113, 113)'];
          
          



let body=document.getElementsByTagName("body")[0];

let container1=document.getElementsByClassName("container")[0];

let nav=document.getElementsByClassName("nav")[0];

let graph=document.getElementsByClassName("graph")[0];

let chart=document.getElementsByClassName("chart")[0];

let filter=document.getElementsByClassName("filter")[0];

let color=document.getElementsByClassName("color")[0];  

let a=document.getElementsByClassName("item");

let label =document.getElementsByTagName("label")[0];
let i=label.getElementsByTagName("i")[0];

let h3=document.getElementsByClassName("h3")[0];  
let color_array=[];


let active=document.getElementsByClassName("active")[0];


function colord()
{

    
color_array=[...JSON.parse(localStorage.getItem('color'))];

  if((color_array[0]=="rgb(251, 251, 250)" && color_array[1]=="white" && color_array[2]=="white"
     && color_array[3]=="rgb(130, 130, 130)") || (color_array[0]=="rgb(61, 61, 61)" && color_array[1]=="rgb(113, 113, 113)" && color_array[2]=="rgb(194, 194, 194)"
     && color_array[3]=="rgb(47, 47, 47)") )
     {


body.style.background=`${color_array[0]}`;
container1.style.background=`${color_array[1]}`;
nav.style.background=`${color_array[1]}`;
graph.style.background=`${color_array[2]}`;
chart.style.background=`${color_array[2]}`;
color.style.background=`${color_array[2]}`;
filter.style.background=`${color_array[2]}`;

label.style.background=`${color_array[2]}`;
i.style.color=`${color_array[5]}`;

h3.style.color=`${color_array[4]}`;


for(let i=0;i<a.length;i++)
{
    a[i].style.color=`${color_array[3]}`;
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






let checkd=document.getElementById("check");
function checkdd()
{
    if(checkd.value=="")
    {
        checkd.value="yes";
    }
    else{

        checkd.value="";

    }

}


function validate()
{


    let csv=document.getElementById("fileupload");
    let label=document.getElementsByTagName("label")[0];
let h4=document.getElementById("h4");
if(csv.files.length ==0)
{
    
    label.style.boxShadow="red 0px 0px 0px 1px";
    h4.style.display="block";
    setTimeout(() => {

        h4.style.display="";
        label.style.boxShadow="rgba(0, 0, 0, 0.05) 0px 0px 0px 1px";
        
    }, 3000);
    
    return false;
}

return true;

}

let file=document.getElementById("fileupload");

file.addEventListener('input',()=>{

if(file.files.length)
{
    let filename=file.files[0].name;
    let file_d=document.getElementsByClassName("file")[0];
    file_d.innerHTML=filename;
}
})


                    

function toggle()
{ 

let filter=document.getElementsByClassName("graph")[0];

let info=document.getElementsByClassName("chart")[0];

let graph=document.getElementsByClassName("filter")[0];

let chart=document.getElementsByClassName("color")[0];   



if(!chart.classList.contains("toggle"))
{
    chart.classList.toggle("toggle");
}

if(info.classList.contains("togglecolor"))
{
    info.classList.toggle("togglecolor");
}

filter.classList.toggle("togglecolor");

graph.classList.toggle("toggle");

}



function toggle1()
{

    let filter=document.getElementsByClassName("graph")[0];

let info=document.getElementsByClassName("chart")[0];

let graph=document.getElementsByClassName("filter")[0];

let chart=document.getElementsByClassName("color")[0];   



if(!graph.classList.contains("toggle"))
{
    graph.classList.toggle("toggle");
}

if(filter.classList.contains("togglecolor"))
{
    filter.classList.toggle("togglecolor");
}

info.classList.toggle("togglecolor");
chart.classList.toggle("toggle");

}



