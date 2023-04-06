let ejecutando = false

let segmento_actual;

function comenzarEjecucion(id) {
    ejecutando = !ejecutando;

    if (ejecutando) {
        set_button_style("Abortar", "red");

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            console.log(this.responseText);
            segmento_actual = JSON.parse(this.responseText);
            console.log("starting execution for ", segmento_actual);

            //TODO aqui to el tema de la ejecución;




        }
        xhttp.open("GET", "includes/src/backend/get_computation_segment.php?id=" + id, true);
        xhttp.send();

    } else {
        set_button_style("Comenzar", "green");

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            console.log("stoped execution for ", segmento_actual);
            segmento_actual = undefined;
        }
        xhttp.open("GET", "includes/src/backend/cancel_segment.php?id=" + id + "&start=" + segmento_actual.start + "&end=" + segmento_actual.end, true);
        xhttp.send();


    }
}



const btn_box = document.getElementById("btn_box");
const btn_text = document.getElementById("btn_text");


function set_button_style(text, color) {
    btn_box.style.backgroundColor = color;
    btn_text.innerHTML = text;
}
set_button_style("Comenzar", "green");
