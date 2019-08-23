<?php include APP_PATH.'Views/partes/header.php'; ?>
<?php
    if(!empty($variables) ){
        echo $variables;
    }
?>
<form action="<?php echo PUBLIC_PATH?>autorcrear" method="POST">
    <div>
        <label for="nombre">Nombre del autor</label>
        <input type="text" name="nombre" placeholder="Nombre del autor" required>
    </div>

    <input type="submit" value="Guardar">
</form>


<?php include APP_PATH.'Views/partes/footer.php'; ?>
