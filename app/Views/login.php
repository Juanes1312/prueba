<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>Gestion Inventario IT</title>
        <link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet">
        <link href="<?= base_url("css/bootstrap-reset.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/font-awesome/css/font-awesome.css") ?>" rel="stylesheet" />
        <link href="<?= base_url("css/style.css") ?>" rel="stylesheet">
        <link href="<?= base_url("css/style-responsive.css") ?>" rel="stylesheet" />
        <script src="<?= base_url("js/sweetalert2@10.js") ?>" /></script>
        <script src="<?= base_url("js/axios.min.js") ?>" /></script>
        <script src="<?= base_url("js/jquery.js") ?>"></script>
        <script src="<?= base_url("js/validador.js") ?>"></script>
        <script src="<?= base_url("js/app_request.js") ?>"></script>
        <script src="<?= base_url("js/bootstrap.bundle.min.js") ?>"></script>
</head>
<body class="login-body">
    <div class="container">
        <form class="form-signin" id="loging_form">
            <h2 class="form-signin-heading">Gestion Inventario IT</h2>
            <div class="login-wrap">
                <input name="email" type="text" id="email" placeholder="Email" class="form-control system_validador_vacio">
                <input name="clave" type="password" id="clave" placeholder="Contraseña" class="form-control system_validador_vacio">
                <button class="btn btn-lg btn-login btn-block" id="btn_validar" type="button">Inciar Sesión</button>
            </div>
        </form>
    </div>
    <script>

        jQuery('#clave').keyup(function (e) {
            if (e.keyCode === 13) {
                ValidarUsuario();
            }
        });
        
        jQuery(document).on('click', '#btn_validar', function () {
            validarUsuario();
        });

        axios.defaults.baseURL = "<?= base_url() ?>";

        function validarUsuario() {
            if (system_validarcampos("loging_form")) {
                axios.post('autenticar', getDataJson("loging_form")).then(function (resp) {
                    if (resp.data.error === 0) {
                        window.location.href = "<?= base_url("backoffice") ?>";
                    } else {
                        notificarUsuario(resp.data.mensaje);
                    }
                });
            }
        }
    </script>
</body>
</html>
