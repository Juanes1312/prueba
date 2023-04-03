<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>Administracion de Inventario IT</title>
        <link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet">
        <link href="<?= base_url("css/bootstrap-reset.css") ?>" rel="stylesheet">
        <link href="<?= base_url("assets/font-awesome/css/font-awesome.css") ?>" rel="stylesheet" />
        <link href="<?= base_url("css/style.css") ?>" rel="stylesheet">
        <link href="<?= base_url("css/style-responsive.css") ?>" rel="stylesheet" />
        <link href="<?= base_url("css/table-responsive.css") ?>" rel="stylesheet" />
        <script src="<?= base_url("js/jquery.js") ?>"></script>
        <script src="<?= base_url("js/bootstrap.bundle.min.js") ?>"></script>
        <script src="<?= base_url("js/sweetalert2@10.js") ?>" /></script>
        <script src="<?= base_url("js/axios.min.js") ?>" /></script>
        <script class="include" type="text/javascript" src="<?= base_url("js/jquery.dcjqaccordion.2.7.js") ?>"></script>
        <script type="text/javascript" src="<?= base_url("js/hover-dropdown.js") ?>"></script>
        <script src="<?= base_url("js/jquery.scrollTo.min.js") ?>"></script>
        <script src="<?= base_url("js/jquery.nicescroll.js") ?>" type="text/javascript"></script>
        <script src="<?= base_url("js/respond.min.js") ?>" ></script>
        <script src="<?= base_url("js/app_request.js") ?>" ></script>
        <script src="<?= base_url("js/validador.js") ?>" ></script>
        <script>
            axios.defaults.baseURL = "<?= base_url() ?>/";
            var UrlGlobal = "<?= base_url("backoffice") ?>/";
        </script>
    </head>
    <body class="full-width">
        <section id="container" class="">
            <!--header start-->
            <header class="header white-bg">
                <?= $this->include('app/layout_include/menu') ?>
            </header>
            <section id="main-content">
                <section class="wrapper">
                    <?= $this->renderSection('content') ?>
                </section>
            </section>
            <!--footer start-->
            <footer class="site-footer" style="position: absolute; width: 100%; height: 40px;">
                <div class="text-center">
                    <?= date("Y") ?> - Virtual Llantas
                    <a href="#" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
            <!-- footer end -->
        </section>
        <div id="loader_proceso" class="loader_proceso">
            <img style="margin: 25% 50%;" src="<?= base_url("img/load.gif"); ?>" />
        </div>
    </body>
</html>
