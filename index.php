<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Últimas entradas</h1>

    <?php
        $cont = 1;
        $entradas = conseguirUltimasEntradas($db);
        while(!empty($entradas) && $entrada= mysqli_fetch_assoc($entradas)):
    ?>

    <article class="entrada dinamico" id="dinamico-<?=$cont?>">
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
    <?php $cont++; endwhile; ?>

    <?php if(!isset($entradas) || mysqli_num_rows($entradas) < 2): ?>
    <article class="entrada">
        <a href="#">
            <h2>Resident Evil</h2>
            <span class="fecha">Deportes | 2019-11-19</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores voluptas a nisi ratione excepturi quidem iusto error aliquid in veritatis temporibus enim, non, iste, at rerum neque nesciunt consequuntur rem...</p>
        </a>
    </article>

    <article class="entrada">
        <a href="#">
            <h2>Super Mario Kart</h2>
            <span class="fecha">Acción | 2019-11-13</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nulla nunc, blandit vel augue ut, ultrices varius magna. Sed tincidunt tincidunt odio ullamcorper auctor...</p>
        </a> </article>
    <article class="entrada" id="anteultimo">
        <a href="#">
            <h2>Naruto Shippuden Ultima Ninja Storm PC</h2>
            <span class="fecha">Rol | 2019-11-11</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque facilisis dui justo, eu ullamcorper tellus fringilla et. Duis cursus leo facilisis consectetur elementum. Duis...</p>
        </a>
    </article>

    <article class="entrada" id="ultimo">
        <a href="#">
            <h2>Fortnite</h2>
            <span class="fecha">Acción | 2019-11-11</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque facilisis dui justo, eu ullamcorper tellus fringilla et. Duis cursus leo facilisis consectetur elementum. Duis...</p>
        </a>
    </article>
    <?php endif; ?>

    <div id="ver-todas">
        <a href="#">Ver todas las entradas</a>
    </div>
</div> <!-- fin principal -->
<div class="clearfix"></div>
</div>

<?php require_once 'includes/pie.php' ?>
