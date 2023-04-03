<?= $this->extend('app/layout') ?>
<?= $this->section('content') ?>

<?php 
    $id_usuario = $datos[0]['id_usuario'];
    $nombre = $datos[0]['nombre'];
    $correo = $datos[0]['email'];
    $rol = $datos[0]['rol'];
?>

<div class="row">
    <h4 class="my-4">Crear Cliente</h4>

    <div class="mx-auto my-5 p-5 border col-md-3">

        <h1 class="text-5xl text-center font-bold">Editar</h1>

        <form id="formulario" method="POST" class="mt-4" novalidate>

            <div class="form-group">
            <label for="nombre">Nombre</label>
                <input type="text" class="text-center mw-100 px-2 my-2" placeholder="Nombre" id="nombre" name="nombre" style="width: 400px;" value="<?php echo $nombre?>" required>
            </div>

            <div class="form-group">
            <label for="nombre">Correo</label>
                <input type="email" class="text-center mw-100 px-2 my-2" placeholder="Correo" id="email" name="email" style="width: 400px;" value="<?php echo $correo?>" required>
            </div>

            <div class="form-group">
                <select name="rol" id="rol" value="<?php echo $rol?>" class="text-center mw-100 px-2 my-2">
                @if(rol == user)
                    <option value="user">Usuario</option>
                @endif    
                    <option value="admin">Administrador</option>
                </select>
            </div>

            <button type="button" class="my-4 btn btn-outline-dark boton-e" style="width: 243px;">Guardar</button>

        </form>

    </div>

</div>

<script>
    var boton = document.querySelectorAll('button.boton-e');
    boton.forEach(function(item, id) {
        item.addEventListener('click', function() {
            data(item.dataset.id)
        });
        document.querySelectorAll('button.boton-e').innerHTML = mensaje;

        async function data() {
            var formulario = document.getElementById('formulario');
            const formi = new FormData(formulario);
            
            let datos = await axios.post('cliente/actualizar?id=<?php echo $id_usuario ?>', formi)
            
            console.log(datos);

            if (datos.data.error == 1) {
                
                alert("Complete todos los campos")
                // window.location.replace(base_url("backoffice/cliente/listado"))
            } else {
                if (datos.data.error == 0) {
                    window.location.replace("<?= base_url("backoffice/cliente/listado")?>")
                }
            }

        }
        data();
    });
</script>

<?= $this->endSection() ?>