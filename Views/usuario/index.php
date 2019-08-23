<?php include APP_PATH.'Views/partes/header.php'; ?>

<h1>Panel de control de Clientes</h1>

<div>
    <a href="usuario">Crear nueva persona</a>
</div>


<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>nombre de usuario</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($variables as $usuario): ?>
            <tr>
                <td><?php echo $usuario->getIdUsuario(); ?></td>
                <td><?php echo $usuario->getNombre(); ?> </td>
                <td><?php echo $usuario->getApellido(); ?> </td>
                <td><?php echo $usuario->getUserName(); ?> </td>
                <td>
                    <a href="usuarioeditarview&id=<?php echo $usuario->getIdUsuario() ?>">Editar</a>
                    <a href="<?php echo PUBLIC_PATH ?>usuarioeliminar&id=<?php echo $usuario->getIdUsuario() ?>" 
                   
                     onclick="eliminarUsuario(event, this)">Eliminar</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include APP_PATH.'Views/partes/footer.php'; ?>
