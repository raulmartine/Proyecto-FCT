<?php
  session_start();
?>

<header>
    
      <ul>
      <img class="favicon" src="images/favicon.ico"/>
      <a href="index.php">Inicio</a>
  <?php
    if (!(empty($_SESSION['rol'])))
    {
      if (!($_SESSION['rol'] == 'peluquero' || $_SESSION['rol'] == 'admin'))
      {
  ?>
      <a href='cita-previa.php'>Cita Previa</a>
  <?php  
      }
    }
    if(empty($_SESSION['username']) && empty($_SESSION['passwd']))
    {
  ?>  
    <a href="login.php">Iniciar Sesión</a>
  <?php
    }
    else
    {
  ?>
    <a href="ver-citas.php">Ver Citas Previas</a>
    <a href="cerrar-sesion.php">Cerrar Sesión</a>
  <?php
      if($_SESSION['rol'] == 'admin')
      {
  ?>
    <a href="login.php">Registrar Usuarios</a>
  <?php
      }
  ?>
    <?php
        echo "<a>Usuario: ".$_SESSION['username']."</a>";
        // Rol: ".$_SESSION['rol']."
    }
  ?>
    </ul>
</header>