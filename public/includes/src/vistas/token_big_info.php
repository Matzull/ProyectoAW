<div class="lateral-info">
    <h3 class="title">TUS TOKENS</h3>
    <div class="flex-between">
        <button class="circular-button button c-h-blue" onclick="location.href='token_transaction.php'">
            <img src="<?= RUTA_SVG ?>/Plus_i.svg" alt="">
        </button>
        <h3 class="t-big no-margin">
            <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->gettokens() ?>
        </h3>
    </div>
</div>
<img src="<?= RUTA_SVG ?>/Token_i.svg" alt="" width="100" height="100">