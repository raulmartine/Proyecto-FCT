<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="uft-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Citas</title>
</head>
<body>
<?php
  include('menu.php');
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
  include("conexion.php");
    
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
        $sql = "SELECT * FROM $tablaCitas WHERE peluquero='$usuario' AND fecha LIKE '$fecha%' ORDER BY fecha;";
      }
      else
      {
        $sql = "SELECT * FROM $tablaCitas WHERE username='$usuario' AND fecha LIKE '$fecha%' ORDER BY fecha;";
      }
      
      $resultadoSelect = mysqli_query($conexion, $sql);
      if(!$resultadoSelect)
      {
        echo "<p>Sentencia Select fallido.</p>";
      }
      else
      {
        $diaAnterior = date('Y-m-d', strtotime('-1 day', strtotime($fecha)));
        echo "<form method='POST' action='ver-citas.php'>
        <input type='hidden' name='fechaActualizar' value = ".$diaAnterior."> 
        <button type='submit'>Día Anterior</button>
        </form>";
        
        echo "<form method='POST' action='ver-citas.php'>
        <input type='date' name='fechaActualizar'> 
        <button type='submit'>Seleccionar Día</button>
        </form>";

        
        $diaPosterior = date('Y-m-d', strtotime('+1 days', strtotime($fecha)));
        echo "<form method='POST' action='ver-citas.php'>
        <input type='hidden' name='fechaActualizar' value = ".$diaPosterior.">
        <button type='submit'>Día Posterior</button>
        </form>";

        echo "<p>Se están visualizando las citas del día: ".$fecha."</p>";

        while($fila=mysqli_fetch_array($resultadoSelect))
        { 
          //Si no hay registros (No funciona todavía)
          if($fila==array(4))
          {
            echo "<p>No hay citas previas en este día.</p>";
          }
          else
          {
            // La fecha de esta $fila['fecha'] en formato año-mes-día (mal).
            // Dentro de la fecha, separamos el año, mes y día (por el guión).
            $vectorfecha=explode("-",$fila['fecha']);
            // Reconstruimos la cadena: "día-mes-año hora:minutos:segundos"
            $fechacorrecta=substr($vectorfecha[2],0,2)."-".$vectorfecha[1]."-".
            $vectorfecha[0]." ".substr($vectorfecha[2],3,5);
            echo "<hr>";
            if($rol == 'peluquero')
            {
              echo "<p><b>Usuario:</b> ". $fila['username']. "</p>";
            }
            echo "<p><b>Fecha:</b> " . $fechacorrecta. "</p>";
            echo "<p><b>Servicio:</b> " . $fila['servicio'] . "</p>";
            if($rol == 'registrado')
            {
              echo "<p><b>Peluquero:</b> " . $fila['peluquero'] . "</p>";
            }
            echo "<form method='POST' action='confirmar-anular-cita-previa.php'>
            <input type='hidden' value='" . $fila['fecha'] . "' name='fecha'/>
            <input type='submit' value='Anular Cita'/>
            </form>";
            echo "<hr>";         
          }
        }
      }
    }
  mysqli_close($conexion);    
  }
} 
else
{
  echo "<p><button><a href='login.php'>Inicie sesion primero</a></button></p>";
}
?>
<?php
  include('footer.php');
?>
</body>
</html>