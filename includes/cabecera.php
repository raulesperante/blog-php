<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Blog de Videojuegos</title>
    <link rel="stylesheet" href=".\assets\fonts\fonts.css">
    <link rel="stylesheet" type="text/css" href=".\assets\css\style.css">
</head>

<body>
    <div id="content">
        <!-- CABECERA -->
        <header id="cabecera">
            <!-- Logo -->
            <div id="logo">
                <a href="#">
                    Blog de Videojuegos
                </a>
            </div>
            <div class="menu-bar">
                <a href="#" class="icon-menu"></a>
                <div id="word-menu">Menu</div>
            </div>
            <nav id="menu-flex">
                <a href="index.php">Inicio</a>

                <?php $categorias = conseguirCategorias($db);
                  while(!empty($categorias) && $categoria = mysqli_fetch_assoc($categorias)): ?>
                <a href="categoria.php?id=<?=$categoria['id']?>"><?= $categoria['nombre']?></a>
                <?php endwhile; ?>

                <?php if(!isset($categorias) || mysqli_num_rows($categorias) < 2): ?>
                   <?php var_dump($categorias); die();?>
                    <a href="index.php">Acción</a>
                    <a href="index.php">Rol</a>
                    <a href="index.php">Deportes</a>
                    <a href="index.php">Plataformas</a>
                    <a href="index.php">MMO RPG</a>
                <?php endif; ?>
                <a href="index.php">Sobre mí</a>
                <a href="index.php">Contacto</a>
            </nav>
            <div class="clearfix"></div>
        </header>
