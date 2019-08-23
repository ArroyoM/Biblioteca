<?php include APP_PATH.'Views/partes/header.php'; ?>
<?php
    if(!empty($error) ){
        echo $error;
    }
?>
<h1>Vista editar</h1>

<form action="<?php echo PUBLIC_PATH?>usuarioeditar" method="POST">
    <input type="hidden" name="idusuario" value="<?php echo $usuario->getIdUsuario() ?>" >
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $usuario->getNombre() ?>" placeholder="Su nombre" required>
    </div>
    <div>
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido"  value="<?php echo $usuario->getApellido() ?>" 
                placeholder="Su apellido" required>
    </div>
    <div>
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" value="<?php echo $usuario->getUserName() ?>" 
                 placeholder="Su nombre de usuario" readonly>
    </div>
    <div>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" placeholder="*******" required>
    </div>

    <input type="submit" value="Editar">

</form>


<?php include APP_PATH.'Views/partes/footer.php'; ?>
