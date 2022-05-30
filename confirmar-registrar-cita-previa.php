<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmar Registrar Cita Previa</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
<?php
  include('common/menu.php');
?>
<?php
  include("common/conexion.php");
if(!(empty($_SESSION['username']) && empty($_SESSION['passwd']) && empty($_SESSION['rol'])))
{
  if(!empty($_POST['fecha']))
  {
    $usuario = $_SESSION['username'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $fechaCorrecta = $fecha . " ". $hora .":00";
    $servicio = $_POST['servicio'];
    $peluquero = $_POST['peluquero'];
    if($peluquero == 'peluquero1')
    {
      $peluqueroTexto = 'Angel';
    }
    else
    {
      $peluqueroTexto = 'Vanesa';
    }
    $fechaTexto=explode("-",$fecha);
    $fechaTexto=substr($fecha,8,12)."-".substr($fecha,5,2)."-".substr($fecha,0,4);

    $conector = mysqli_connect($host,$user,$password);
	  if (! $conector)
    { 
  		echo "<p>ERROR: No se ha podido establecer conexion con el servidor.</p>";
    }
    else
    {
		  $resultado = mysqli_select_db($conector, $dbname);
		  if (! $resultado)
      {
  			echo "<p>ERROR: No se ha podido seleccionar la base de datos.</p>";
		  }
      else
      {
        $conexion = mysqli_connect($host, $user, $password, $dbname);

        $sqlSelect = "SELECT * FROM $tablaCitas WHERE peluquero='".$peluquero."' AND fecha='".$fechaCorrecta."';";
        $resultado = mysqli_query($conexion, $sqlSelect);
        $fila = mysqli_fetch_array($resultado);
        if(empty($fila['fecha']))
        {
  			  $sqlInsert = "INSERT INTO $tablaCitas VALUES ";
			    $sqlInsert.= "('".$usuario."', '".$fechaCorrecta."', '".$servicio."', '".$peluquero."');";
          $insert = mysqli_query($conexion, $sqlInsert);
			    if(!$insert)
          {
  				  echo "<p>ERROR: No se ha podido crear la cita previa.</p>";
			    }
			    else
          {
            echo "<p>Se ha creado la cita previa.</p>";
            mysqli_close($conector);
            header('location: ver-citas.php');
          }
        }
        else
        {
          echo "<p>ERROR: La cita previa con fecha: " . $fechaTexto . ", hora: " . $hora . " y peluquero: " . $peluqueroTexto . " ya están escogidas.</p>
                <p>Seleccione otra fecha, hora o peluquero.</p>
                <form action='cita-previa.php'>
                <input type='hidden' name='fecha' value = ".$fecha.">
                <input type='hidden' name='hora' value = ".$hora.">
                <input type='hidden' name='servicio' value = ".$servicio.">
                <input type='hidden' name='peluquero' value = ".$peluquero.">
                <button type='submit'>Volver a Realizar la Cita Previa</button>
                </form>";
        }
      }
    }
  }
  else if($_SESSION['rol']=='peluquero' || $_SESSION['rol']=='admin')
  {
      echo "<p>Los peluqueros o administradores no pueden crear citas previa.</p>
            <p><button><a href='index.php'>Ir al Inicio</a></button></p>";
  }
  else
  {
    echo "<p>Los parámetros para crear una cita no están rellenados.</p>
          <p>Crea una cita previa.</p>
          <p><button><a href='cita-previa.php'>Crear Cita Previa</a></button></p>";
  }
}
else
{
  echo "<p>Debes inicar sesión para crear sesión.</p>
    <p><button><a href='login.php'>Inicia sesión</a></button></p>";
}
?>
<?php
  include('common/footer.php');
?>
</body>
</html>