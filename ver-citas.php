<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="uft-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Citas</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
<?php
  include('common/menu.php');
  $hoy = date("Y-m-d");
  if(empty($_POST['fechaActualizar']))
  {
    $fecha = $hoy;
  }
  else
  {
    $fecha = $_POST['fechaActualizar'];
  }
  if(!(empty($_SESSION['username']) && empty($_SESSION['passwd']) && empty($_SESSION['rol'])))
  {
    $usuario = $_SESSION['username'];
    $passwd = $_SESSION['passwd'];
    $rol = $_SESSION['rol'];
  }
  ?>
<?php

if(!(empty($usuario) && empty($passwd)))
{  
  include("common/conexion.php");
    
  $conexion=mysqli_connect($host,$user,$password);
  if (! $conexion)
  {
    echo "<p>No se ha podido establecer conexion con el servidor.</p>";
  }
  else
  {
    $resultado=mysqli_select_db($conexion, $dbname);
    if (! $resultado)
    {
      echo "<p>No se ha podido seleccionar la base de datos.</p>";
    }
    else
    {
      if($rol == 'peluquero')
      {
        $sql= "SELECT citas.username, citas.fecha, serv.nombre, citas.peluquero
        FROM $tablaCitas as citas JOIN servicios as serv ON citas.servicio = serv.codigo
        WHERE peluquero='$usuario' AND fecha LIKE '$fecha%' ORDER BY fecha;";
      }
      else if ($rol == 'registrado')
      {
        $sql= "SELECT citas.username, citas.fecha, serv.nombre, citas.peluquero
        FROM $tablaCitas as citas JOIN servicios as serv ON citas.servicio = serv.codigo
        WHERE username='$usuario' AND fecha LIKE '$fecha%' ORDER BY fecha;";
      }
      else
      {
        $sql= "SELECT citas.username, citas.fecha, serv.nombre, citas.peluquero
        FROM $tablaCitas as citas JOIN servicios as serv ON citas.servicio = serv.codigo
        WHERE fecha LIKE '$fecha%' ORDER BY fecha;";
      }
      $resultadoSelect = mysqli_query($conexion, $sql);
      if(!$resultadoSelect)
      {
        echo "<p>Sentencia Select fallido.</p>";
      }
      else
      {
        $diaAnterior = date('Y-m-d', strtotime('-1 day', strtotime($fecha)));
        echo "<div class='forms'>";
        echo "<form method='POST' action='ver-citas.php' class='formDiaAnterior'>
        <input type='hidden' name='fechaActualizar' value = ".$diaAnterior."> 
        <button type='submit'>Día Anterior</button>
        </form>";
        
        echo "<form method='POST' action='ver-citas.php' class='formSeleccionarDia'>
        <input type='date' name='fechaActualizar' value =" . $fecha . "> 
        <button type='submit'>Seleccionar Día</button>
        </form>";

        
        $diaPosterior = date('Y-m-d', strtotime('+1 days', strtotime($fecha)));
        echo "<form method='POST' action='ver-citas.php' class='formDiaPosterior'>
        <input type='hidden' name='fechaActualizar' value = ".$diaPosterior.">
        <button type='submit'>Día Posterior</button>
        </form>";
        echo "</div>";


        $vectorfecha=explode("-",$fecha);
        $fechacorrecta=substr($vectorfecha[2],0,2)."-".$vectorfecha[1]."-".
        $vectorfecha[0]." ".substr($vectorfecha[2],3,5);
        echo "<p>Se están visualizando las citas previas del día: ".$fechacorrecta."</p>";
        
        $sqlComprobarFila = $sql;
        $resultadoComprobarFila = mysqli_query($conexion, $sqlComprobarFila);
        $filas=mysqli_num_rows($resultadoComprobarFila);
        if($filas==0)
        {
          echo "<p>No hay citas previas en este día.</p>";
        }

        while($fila=mysqli_fetch_array($resultadoSelect))
        { 
          
          // La fecha de esta $fila['fecha'] en formato año-mes-día (mal).
          // Dentro de la fecha, separamos el año, mes y día (por el guión).
          $vectorfecha=explode("-",$fila['fecha']);
          // Reconstruimos la cadena: "día-mes-año hora:minutos:segundos"
          $fechacorrecta=substr($vectorfecha[2],0,2)."-".$vectorfecha[1]."-".
          $vectorfecha[0];
          $hora=substr($vectorfecha[2],3,5);
          echo "<hr>";
          if($rol == 'peluquero' || $rol == 'admin')
          {
            echo "<p><b>Usuario:</b> ". $fila['username'] . "</p>";
          }
          echo "<p><b>Fecha:</b> " . $fechacorrecta . "</p>";
          echo "<p><b>Hora:</b> " . $hora . "</p>";
          echo "<p><b>Servicio:</b> " . $fila['nombre'] . "</p>";
          if($rol == 'registrado' || $rol == 'admin')
          {
            echo "<p><b>Peluquero:</b> " . $fila['peluquero'] . "</p>";
          }
                      
          echo "<form method='POST' action='confirmar-anular-cita-previa.php' class='formAnular'>
          <input type='hidden' value='" . $fila['fecha'] . "' name='fecha'/>
          <input type='submit' value='Anular Cita'/>
          </form>";
          echo "<hr>";         
        }
      }
    }
  mysqli_close($conexion);    
  }
} 
else
{
  echo "<p>No se pueden visualizar citas ya que no has iniciado sesión.</p>
        <p><button><a href='login.php'>Inicia sesión</a></button></p>";
}
?>
<?php
  include('common/footer.php');
?>
</body>
</html>