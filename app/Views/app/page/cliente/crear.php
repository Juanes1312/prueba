<?= $this->extend('app/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Gestionar Cliente
            </div>
            <div class="card-body">
                <div class="row p-1">
                    <div class="col-12">
                        <form id="form-cliente">
                            <input name="id_cliente" type="hidden" value="">
                            <div class="row mb-2">
                                <div class="col">
                                    Documento:
                                </div>
                                <div class="col-8">
                                    <input name="documento" type="text" class="form-control system_validador_vacio" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    Email:
                                </div>
                                <div class="col-8">
                                    <input name="email" type="email" class="form-control system_validador_vacio" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    Nombre:
                                </div>
                                <div class="col-8">
                                    <input name="nombre" type="text" class="form-control system_validador_vacio" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <button type="button" id="btn-guadar" class="btn btn-success btn-sm">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).on('click', '#btn-guadar', function () {
        if (system_validarcampos("form-cliente")) {
            axios.post('ajax/cliente', getDataJson("form-cliente"))
                    .then((resp) => {
                        if (resp.data.error) {
                            notificarUsuario(resp.data.mensaje);
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Operación exitosa'
                            }).then(() => {
                                location.href = UrlGlobal + 'cliente/listado'
                            })
                        }
                    })
        }
    });
</script>
<?= $this->endSection() ?>