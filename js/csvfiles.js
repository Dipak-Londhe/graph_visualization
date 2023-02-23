
function toggle() {

    let filter = document.getElementsByClassName("graph")[0];

    let info = document.getElementsByClassName("chart")[0];

    let graph = document.getElementsByClassName("filter")[0];

    let chart = document.getElementsByClassName("color")[0];


    if (!chart.classList.contains("toggle")) {
        chart.classList.toggle("toggle");
    }

    if (info.classList.contains("togglecolor")) {
        info.classList.toggle("togglecolor");
    }

    filter.classList.toggle("togglecolor");

    graph.classList.toggle("toggle");

}



function toggle1() {

    let filter = document.getElementsByClassName("graph")[0];

    let info = document.getElementsByClassName("chart")[0];

    let graph = document.getElementsByClassName("filter")[0];

    let chart = document.getElementsByClassName("color")[0];



    if (!graph.classList.contains("toggle")) {
        graph.classList.toggle("toggle");
    }

    if (filter.classList.contains("togglecolor")) {
        filter.classList.toggle("togglecolor");
    }

    info.classList.toggle("togglecolor");
    chart.classList.toggle("toggle");



}
