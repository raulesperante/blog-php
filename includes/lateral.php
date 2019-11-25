 <!-- BARRA LATERAL -->


 <aside id="sidebar">
     <?php if(isset($_SESSION['usuario'])): ?>
     <div id="usuario-logueado" class="bloque">
         <h3>Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'];?></h3>
         <!-- botones -->
         <a class='boton boton-verde' href="crear-entradas.php">Crear entradas</a>
         <a class='boton' href="crear-categoria.php">Crear categoría</a>
         <a class='boton boton-naranja' href="mis-datos.php">Mis datos</a>
         <a class='boton boton-rojo' href="cerrar.php">Cerrar sesión</a>
     </div>
     <?php endif; ?>

    <?php 
     // Mostrar si la sesion todavia no está iniciada
     if(!isset($_SESSION['usuario'])): ?>
     <div id="login" class="bloque">
         <h3>Identificate</h3>
         <?php if(isset($_SESSION['error_login'])): ?>
         <div class="alerta alerta-error">
             <h3><?=$_SESSION['error_login'];?></h3>
         </div>
         <?php endif; ?>
         <form action="login.php" method="post">
             <label for="email">Email</label>
             <input type="email" name="email" id="email">

             <label for="password">Contraseña</label>
             <input type="password" id="password" name="password">

             <input type="submit" value="Entrar">
         </form>
     </div>

     <div id="register" class="bloque">
         <h3>Registrate</h3>

         <!-- Mostrar errores -->
         <?php if(isset($_SESSION['completado'])): ?>
         <div class='alerta alerta-exito'>
             <?=$_SESSION['completado']?></div>
         <?php elseif(isset($_SESSION['errores']['general'])): ?>
         <div class='alerta alerta-exito'>
             <?=$_SESSION['errores']['general']?></div>
         <?php endif; ?>
         <form action="registro.php" method="post">
             <label for="nombre">Nombre</label>
             <input type="text" id="nombre" name="nombre">

             <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>


             <label for="apellidos">Apellidos</label>
             <input type="text" id="apellidos" name="apellidos">

             <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

             <label for="email">Email</label>
             <input type="email" name="email" id="email">

             <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

             <label for="password">Contraseña</label>
             <input type="password" id="password" name="password">

             <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

             <input type="submit" value="Registrar" name="submit">
         </form>
         <?php borrarErrores(); ?>
     </div>
     <?php endif; ?>
 </aside>
