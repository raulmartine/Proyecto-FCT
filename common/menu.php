<?php
  session_start();
?>

<header>
    <nav>
      <li><a href="index.php">Inicio</a></li>
  <?php
    if (!(empty($_SESSION['rol'])))
    {
      if (!($_SESSION['rol'] == 'peluquero' || $_SESSION['rol'] == 'admin'))
      {
  ?>
      <li><a href='cita-previa.php'>Cita Previa</a></li>
  <?php  
      }
    }
    if(empty($_SESSION['username']) && empty($_SESSION['passwd']))
    {
  ?>  
    <li><a href="login.php">Iniciar Sesión</a></li>
  <?php
    }
    else
    {
  ?>
    <li><a href="ver-citas.php">Ver Citas Previas</a></li>
    <li><a href="cerrar-sesion.php">Cerrar Sesión</a></li>
  <?php
      if($_SESSION['rol'] == 'admin')
      {
  ?>
    <li><a href="login.php">Registrar Usuarios</a></li>
  <?php
      }
  ?>
    <li><?php
        echo "Usuario: ".$_SESSION['username']." Rol: ".$_SESSION['rol'];
    }
  ?>
    </li>
    </nav>
  </header>