<?php
  include("conexion.php");
	
  $mes = $_POST['mes'];
  $dia = $_POST['dia'];
  $hora = $_POST['hora'];
  $minuto = $_POST['minuto'];
  $servicio = $_POST['servicio'];
  $peluquero = $_POST['peluquero'];
  $anoActual = date("Y");
  $fecha = $anoActual.'-'.$mes.'-'.$dia.' '.$hora.':'.$minuto.':00';

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
			  $sql = "INSERT INTO $tablaCitas VALUES ";
			  $sql.= "('a', '".$fecha."', '".$servicio."', '".$peluquero."');";
        $insert = mysqli_query($conexion, $sql);
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
    }
    echo "<p><button><a href=".'index.php'.">Volver a Inicio</a></button></p>";
?>