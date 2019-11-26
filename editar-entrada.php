<!-- Pagina privada, redireccion, solo la pesona
logueada puede visitar esta pagina -->
<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
$entrada_actual = conseguirEntrada($db, $_GET['id']);
if(!isset($entrada_actual['id'])){
    header('Location:index.php');
}
?>
<?php require_once 'includes/cabecera.php'; ?>

<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Editar entradas</h1>
    <p>Edita tu entrada <?=$entrada_actual['titulo']?></p>
    <br>
    <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="post">
        <label for="titulo">Titulo:</label>
        <input type="text" id="titulo" name="titulo" value="<?=$entrada_actual['titulo']?>">

       <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
       
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?=$entrada_actual['descripcion']?></textarea>
        
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
        
        <label for="categoria">Categoría</label>
        <select name="categoria" id="categoria">
            <?php $categorias = conseguirCategorias($db);
            while(!empty($categorias) && $categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>"
               <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : ''?>>
               
               
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




<?php require_once 'includes/pie.php' ?>
