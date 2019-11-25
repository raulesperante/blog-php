<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<?php
$categoria_actual = conseguirUnaCategoria($db, $_GET['id']);
if(!isset($categoria_actual['id'])){
    header('Location:index.php');
}
?>
<?php require_once 'includes/cabecera.php'; ?>

<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Entradas de <?=$categoria_actual['nombre'];?></h1>

    <?php
        $entradas = conseguirUltimasEntradas($db, null);
        while(!empty($entradas) && $entrada= mysqli_fetch_assoc($entradas)):
    ?>

    <article class="entrada">
        <a href="">
            <h2><?=$entrada['titulo']?></h2>
            <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
            <?php
                // Lógica para mostrar 24 palabras
                $palabras = explode(" ", $entrada['descripcion']);
                $palabras = array_chunk($palabras, 24);
                $palabras = array_slice($palabras, 0, 1)[0];
                $palabras = trim(implode(' ', $palabras));
            ?>
            <p><?=$palabras . '...'?></p>
        </a>
    </article>
    <?php endwhile; ?>


</div> <!-- fin principal -->


<?php require_once 'includes/pie.php' ?>
