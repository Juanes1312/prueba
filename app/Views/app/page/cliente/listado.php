<?= $this->extend('app/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Listado de clientes
                <a href="<?= base_url("backoffice/cliente/crear") ?>" class="btn btn-success btn-sm float-right">Nuevo</a>
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Acciones</th>
                                <th>Documento</th>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listado as $cliente) : ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('backoffice/cliente/editar?id=' . $cliente["id_cliente"]) ?>" class="btn btn-success btn-sm">Editar</a>
                                        <a href="<?= base_url('backoffice/cliente/editar?id=' . $cliente["id_cliente"]) ?>" class="btn btn-success btn-sm">Detallar Prestamos</a>
                                    </td>
                                    <td><?= $cliente["documento"] ?></td>
                                    <td><?= $cliente["email"] ?></td>
                                    <td><?= $cliente["nombre"] ?></td>
                                    <td><?= $cliente["registro"] ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>