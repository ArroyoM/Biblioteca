<?php include APP_PATH.'Views/partes/header.php'; ?>
<?php
    if(!empty($variables) ){
        echo $variables;
    }
?>
<form action="<?php echo PUBLIC_PATH?>usuariocrear" method="POST">
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Su nombre" required>
    </div>
    <div>
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" placeholder="Su apellido" required>
    </div>
    <div>
        <label for="username">Nombre de usuario</label>
        <input type="text" name="username" placeholder="Su nombre de usuario" required>
    </div>
    <div>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" placeholder="*******" required>
    </div>

    <input type="submit" value="Guardar">

</form>


<?php include APP_PATH.'Views/partes/footer.php'; ?>
