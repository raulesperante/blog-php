<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Crear entradas</h1>
    <p>Añade nuevas entradas al blog para que los usuarios
        puedan leerlas y disfrutar de nuestro contenido</p>
    <br>
    <form action="guardar-entrada.php" method="post">
        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo">

       <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
       
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
        
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
        
        <label for="categoria">Categoría</label>
        <select name="categoria" id="categoria">
            <?php $categorias = conseguirCategorias($db);
            while(!empty($categorias) && $categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>">
                <?=$categoria['nombre']?>
            </option>
            
            <?php endwhile;
            ?>
            
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>
        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?>
</div>


<?php require_once 'includes/pie.php'; ?>
