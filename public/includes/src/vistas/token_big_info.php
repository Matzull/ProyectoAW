<div class="lateral-info">
    <h3 class="title">TUS TOKENS</h3>
    <div class="flex-between">
        <button class="circular-button button c-h-blue" onclick="location.href='token_transaction.php'">
            <img src="svg/Plus_i.svg" alt="">
        </button>
        <h3 class="t-big no-margin">
            <?= \parallelize_namespace\Usuario::buscaUsuario($_SESSION["user_email"])->gettoekns() ?>
        </h3>
    </div>
</div>
<img src="svg/Token_i.svg" alt="" width="100" heigh="100">