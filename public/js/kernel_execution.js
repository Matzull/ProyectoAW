let ejecutando = false

function comenzarEjecucion(id) {
    console.log(id)
    ejecutando = !ejecutando;

    if (ejecutando) {
        console.log("A")
        set_button_style("Finalizar", "red");

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            console.log(this.responseText);
            let ranges = JSON.parse(this.responseText);
            console.log(ranges);
        }
        xhttp.open("GET", "includes/src/backend/get_computation_segment.php?id=" + id, true);
        xhttp.send();

    } else {
        console.log("B")
        set_button_style("Comenzar", "green");

    }
}



const btn_box = document.getElementById("btn_box");
const btn_text = document.getElementById("btn_text");


function set_button_style(text, color) {
    btn_box.style.backgroundColor = color;
    btn_text.innerHTML = text;
}
set_button_style("Comenzar", "green");
