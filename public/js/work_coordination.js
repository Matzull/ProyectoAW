let ejecutando = false

let segmento_actual;

function comenzarEjecucion(id) {
    if (kernel.finished) return;
    ejecutando = !ejecutando;

    if (ejecutando) {
        set_button_style("Abortar", "red");

        pedir_trabajo(id);

    } else {
        set_button_style("Comenzar", "green");
    }
}


function pedir_trabajo(id) {
    set_state("pidiendo trabajo");
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        console.log(this.responseText);
        segmento_actual = JSON.parse(this.responseText);
        set_state("trabajando...");

        if (segmento_actual) {
            let res = exec(segmento_actual.start, segmento_actual.end);
            console.log(res);

            mandar_resultado(res, id);
        } else {
            set_button_style("Terminado", "#8DA900");
            kernel.finished = true;
            set_state("");

        }

    }
    xhttp.open("GET", "includes/src/backend/get_computation_segment.php?id=" + id, true);
    xhttp.send();
}

function mandar_resultado(res, id) {
    set_state("enviando resultado");

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        set_state("resultado enviado");
        console.log(this.responseText);
        if (ejecutando) {
            pedir_trabajo(id);
        }
    }
    xhttp.open("POST", "includes/src/backend/submit_results.php?id=" + id + "&start=" + segmento_actual.start + "&end=" + segmento_actual.end, true);
    xhttp.send(res.join(","));
}


const btn_box = document.getElementById("btn_box");
const btn_text = document.getElementById("btn_text");
const state_text = document.getElementById("state_text");

function set_button_style(text, color) {
    btn_box.style.backgroundColor = color;
    btn_text.innerHTML = text;
}


if (kernel.finished) {
    set_button_style("Terminado", "#8DA900");

} else {
    set_button_style("Comenzar", "green");

}


function set_state(text) {
    state_text.innerHTML = text;
}
