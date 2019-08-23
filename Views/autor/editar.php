<?php include APP_PATH.'Views/partes/header.php'; ?>
<?php
    if(!empty($error) ){
        echo $error;
    }
?>
<h1>Vista editar Autor</h1>

<form action="<?php echo PUBLIC_PATH?>autoreditar" method="POST">
    <input type="hidden" name="idautor" value="<?php echo $autor->getIdAutor() ?>" >
    <div>
        <label for="nombre">Nombre del autor</label>
        <input type="text" name="nombre" value="<?php echo $autor->getNombre() ?>" 
            placeholder="Nombre del autor" required>
    </div>
    <input type="submit" value="Editar">
</form>


<?php include APP_PATH.'Views/partes/footer.php'; ?>
