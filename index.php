<?php require_once 'includes/cabecera.php'; ?>


<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Últimas entradas</h1>

    <?php
        $entradas = conseguirUltimasEntradas($db);
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


    <div id="ver-todas">
        <a href="entradas.php">Ver todas las entradas</a>
    </div>
</div> <!-- fin principal -->


<?php require_once 'includes/pie.php' ?>
