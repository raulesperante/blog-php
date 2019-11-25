<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Mis datos</h1>
    
         <!-- Mostrar errores -->
         <?php if(isset($_SESSION['completado'])): ?>
         <div class='alerta alerta-exito'>
             <?=$_SESSION['completado']?></div>
         <?php elseif(isset($_SESSION['errores']['general'])): ?>
         <div class='alerta alerta-exito'>
             <?=$_SESSION['errores']['general']?></div>
         <?php endif; ?>
         
         <form action="actualizar-usuario.php" method="post">
             <label for="nombre">Nombre</label>
             <input type="text" id="nombre" name="nombre" value="<?=$_SESSION['usuario']['nombre']; ?>">

             <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>


             <label for="apellidos">Apellidos</label>
             <input type="text" id="apellidos" name="apellidos" value="<?=$_SESSION['usuario']['apellidos']; ?>">

             <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

             <label for="email">Email</label>
             <input type="email" name="email" id="email" value="<?=$_SESSION['usuario']['email']; ?>">

             <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

             <input type="submit" value="Actualizar" name="submit">
         </form>
         <?php borrarErrores(); ?>
    
    
</div> <!-- FIN PRINCIPAL -->


<?php require_once 'includes/pie.php'; ?>