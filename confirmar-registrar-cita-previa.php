<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cita Previa</title>
</head>
<body>
<?php
  include('menu.php');
?>
<?php
  include("conexion.php");
  $usuario = $_SESSION['username'];
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];
  $fechaCorrecta = $fecha . " ". $hora .":00";
  $servicio = $_POST['servicio'];
  $peluquero = $_POST['peluquero'];

  if(!(empty($_SESSION['username'])))
  {
    $conector = mysqli_connect($host,$user,$password);
	  if (! $conector)
    {
  		echo "<p>No se ha podido establecer conexion con el servidor.</p>";
    }
    else
    {
		  $resultado = mysqli_select_db($conector, $dbname);
		  if (! $resultado)
      {
			  echo "<p>No se ha podido seleccionar la base de datos.</p>";
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
				    echo "<p>No se ha podido crear la cita previa.</p>";
			    }
			    else
          {
            echo "<p>Se ha creado la cita previa.</p>";
            mysqli_close($conector);
          }
        }
        else{
          echo "<p>ERROR: La cita previa con hora: ".$fechaCorrecta." y peluquero: ".$peluquero." ya están escogidas.</p>";
        }
      }
    }
  }
  else
  {
    echo "<p>No puedes crear una cita sin haber inicado sesión.</p>
    <p><button><a href=".'login.php'.">Inicia sesión</a></button></p>";
  }
?>
<?php
  include('footer.php');
?>
</body>
</html>