<?php include APP_PATH.'Views/partes/header.php'; ?>

<h1>Panel de control de Autor</h1>

<div>
    <a href="autor">Crear nueva Autor</a>
</div>


<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($autores as $autor): ?>
            <tr>
                <td><?php echo $autor->getIdAutor(); ?></td>
                <td><?php echo $autor->getNombre(); ?> </td>
                <td>
                    <a href="autoreditarview&id=<?php echo $autor->getIdAutor() ?>">Editar</a>
                    <a href="<?php echo PUBLIC_PATH ?>autoreliminar&id=<?php echo $autor->getIdAutor() ?>" 
                   
                     onclick="eliminarUsuario(event, this)">Eliminar</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include APP_PATH.'Views/partes/footer.php'; ?>
