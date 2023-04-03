<div class="navbar-header">
    <nav class="horizontal-menu navbar navbar-expand-md navbar-light " style="width: auto;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link active" href="<?= base_url("backoffice/") ?>">Inicio</a></li>
                <?php if (strtolower(session()->get("rol")) == 'administrador') { ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url("backoffice/horarios/crear") ?>">Gestionar Horarios</a></li>
                <?php } ?>
                <li class="nav-item"><a class="nav-link" href="<?= base_url("login/logout") ?>">Cerrar Sesión</a></li>
            </div>
        </div>
    </nav>
    <!--logo end-->
    <div class="top-nav">
    </div>
</div>