<button onclick="all_time()">all time</button>
<button onclick="one_month()">1 mes</button>
<button onclick="one_year()">1 año</button>
<button onclick="custom()">custom</button>

<canvas id="transaction_graph_canvas"></canvas>

<script>
    /*
     return "{ 
                'transaction_timestamp': '$this->transaction_timestamp',
                'quantity': '$this->quantity',
                'description': '$this->description',
                'user_email': '$this->user_email',
            }";
    
    */

    let transactions = <?= "[" . implode(
        ",",
        array_map(
            function ($t) {
                    return $t->getJson();
                },
            \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->getTransactions()
        )
    ) . "]" ?>.map(tr => {
        tr.time = new Date(tr.transaction_timestamp).getTime();
        return tr;
    }).sort((a, b) => a.time - b.time);

    console.log(transactions)

    const canvas = document.getElementById("transaction_graph_canvas");
    const ctx = canvas.getContext("2d");

    function all_time() {
        render(1678987767000, new Date().getTime());
    }

    function one_month() {
        render(new Date().getTime() - 30 * 24 * 60 * 60 * 1000, new Date().getTime());
    }

    function one_year() {
        render(new Date().getTime() - 30 * 24 * 60 * 60 * 1000 * 12, new Date().getTime());
    }

    function custom() {

    }

    function render(start_time, end_time) {
        ctx.fillStyle = "#FFFFFF"; // BG color
        canvas.ctx.fillRect(x, y, canvas.width, canvas.height);


        while (transactions[1].time < start_time) { // nos quitamos la parte inicial mientras que el segundo elemento este fuera del rango que deseamos pintar
            transactions.slice(1);
        }

        let points = transactions.map((transaction) => {
            return {
                x: (transaction.time - start_time) / (end_time - start_time),
                y: transaction.quantity / max_quantity * canvas_height
            }
        });

        console.log(points);

    }

    function lineFromTo(x1, y1, x2, y2, c) {
        ctx.strokeStyle = c + "11";
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.stroke();
    }

    function drawXYrect(x, y, grosor, color) {
        if (color)
            ctx.fillStyle = color;
        else
            ctx.fillStyle = "#555555";
        ctx.fillRect(x, y, grosor, grosor);
    }
    function rgb(r, g, b) {
        let r_ = check(decToHex(r));
        let g_ = check(decToHex(g));
        let b_ = check(decToHex(b));
        return "#" + r_ + g_ + b_;
    }

    function decToHex(n) {
        if (n < 0) {
            n = 0xFFFFFFFF + n + 1;
        }
        return Math.round(n).toString(16).toUpperCase();
    }

    function check(n) {
        //console.log(n)
        if (n.length > 2) {
            return "FF";
        } else if (n.length < 2) {
            return "0" + n;

        } else return n
    }
</script>