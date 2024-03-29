<?php

if (!isset($_SESSION["user_email"])) {
    echo "<p>Debes estar identificado para ver esta información</p>";
} else {
    $user = \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"]);
    $transactions = $user->getTransactions();

    if (sizeof($transactions) != 0) { ?>


        <canvas id="transaction_graph_canvas"></canvas>
        <button class="small-button c-h-b-blue" onclick="all_time()">all time</button>
        <button class="small-button c-h-b-blue" onclick="one_month()">1 mes</button>
        <button class="small-button c-h-b-blue" onclick="one_year()">1 año</button>

        <br>
        <br>

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
                render(0);
            }

            function one_month() {
                render(new Date().getTime() - 30 * 24 * 60 * 60 * 1000);
            }

            function one_year() {
                render(new Date().getTime() - 30 * 24 * 60 * 60 * 1000 * 12);
            }

            function custom() {

            }

            function render(start_time) {
                canvas.width = 900;
                canvas.height = 450;
                ctx.fillStyle = "#403f4a"; // BG color

                ctx.fillRect(0, 0, canvas.width, canvas.height);

                while (transactions[0].time < start_time) {
                    transactions.slice(1);
                }

                let max_quantity = transactions.map(({ balance }) => balance).reduce((max, curr) => Math.max(max, curr), 0)

                let points = transactions.map((transaction, i) => {
                    return {
                        x: i / transactions.length * canvas.width,
                        y: (1 - (transaction.balance / (max_quantity * 1.1))) * canvas.height
                    }
                });

                console.log(points);

                // Create path
                let i = 0;

                let region = new Path2D();

                region.moveTo(0, canvas.height);
                region.lineTo(0, points[0].y);

                for (let { x, y } of points) {
                    region.lineTo(x, y);
                }

                region.lineTo(canvas.width, points[points.length - 1].y);
                region.lineTo(canvas.width, canvas.height);

                region.closePath();

                ctx.fillStyle = "#5181FFAA";
                ctx.fill(region);
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
            all_time()
        </script>
    <?php } else { ?>
        <p>No hay transaciones todavía</p>
    <?php }
} ?>