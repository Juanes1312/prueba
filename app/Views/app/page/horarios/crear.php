<?= $this->extend('app/layout') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Gestionar horario
            </div>
            <div class="card-body">
                <div class="row p-1">
                    <div class="col-12">
                        <form id="form-horarios">
                            <input name="id_horarios" type="hidden" value="">
                            <div class="row mb-2">
                                <div class="col">
                                    Dia:
                                </div>
                                <div class="col-8">
                                    <select name="dia" id="pet-select">
                                        <option value=""></option>
                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="3">Miercoles</option>
                                        <option value="4">Jueves</option>
                                        <option value="5">Viernes</option>
                                        <option value="6">Sabado</option>
                                        <option value="7">Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    Horario de entrada:
                                </div>
                                <div class="col-8">
                                    <input type="time" id="hora_entrada" name="hora_entrada" value="">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    Horario de salida:
                                </div>
                                <div class="col-8">
                                    <input type="time" id="hora_salida" name="hora_salida" value="">
                                    <input type="text" id="" name="" value="<?= strtotime(date('H:i:s')) ?>">
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

    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Horarios
            </div>
            <div class="card-body">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered" id="tabla">
                        <thead>
                            <tr>
                                <th>Dia</th>
                                <th>Hora entrada</th>
                                <th>Hora salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datosHorarios as $horario) : ?>
                                <tr>
                                    <td><?= $horario["dia"] ?></td>
                                    <td><?= $horario["hora_entrada"] ?></td>
                                    <td><?= $horario["hora_salida"] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).on('click', '#btn-guadar', function() {
        if (system_validarcampos("form-horarios")) {
            axios.post('ajax/horarios', getDataJson("form-horarios"))
                .then((resp) => {
                    if (resp.data.error) {
                        notificarUsuario(resp.data.mensaje);
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Operación exitosa'
                        }).then(() => {
                            location.reload()
                        })
                    }
                })
        }
    });
</script>
<?= $this->endSection() ?>