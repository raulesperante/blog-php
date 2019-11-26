<?php
if(!isset($_POST['busqueda'])){
    header('Location.index.php');
}

?>
<?php require_once 'includes/cabecera.php'; ?>

<?php require_once 'includes/lateral.php'; ?>
b
<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Busqueda:  <?=$_POST['busqueda'];?></h1>

    <?php
        $entradas = conseguirUltimasEntradas($db, null, null, $_POST['busqueda']);
        while(!empty($entradas) && $entrada= mysqli_fetch_assoc($entradas)):
    ?>

    <article class="entrada">
        <a href="entrada.php?id=<?=$entrada['id']?>">
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
    <?php if(mysqli_num_rows($entradas) < 1): ?>
    <div class="alerta">No hay entradas en esta categoría</div>
    <?php endif; ?>


</div> <!-- fin principal -->


<?php require_once 'includes/pie.php' ?>
