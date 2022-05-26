<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cita Previa</title>
</head>
<body>
<?php
  include('common/menu.php');
?>
<?php

if (!(empty($_SESSION['username']) && empty($_SESSION['passwd']) && 
		empty($_SESSION['rol'])) && !(empty($_POST['fecha'])))
{
	if (!(empty($_POST['fecha'])))
  {
		include("common/conexion.php");

		$fecha = $_POST['fecha'];

		$sql = "DELETE FROM $tablaCitas WHERE fecha='" . $fecha . "';";
		
		if (! $conector)
    {
			echo "<p>ERROR: No se ha podido establecer conexión con el servidor</p>";
		}
		else
    {
			$resultado=mysqli_select_db($conector, $dbname);
			if (! $resultado)
      {
				echo "<p>ERROR: No se ha podido seleccionar la base de datos</p>";
			}
      else
      {
				
				$resultado = mysqli_query($conector, $sql);
				if(!$resultado)
        {
					echo "<p>ERROR: No se ha podido anular la cita previa</p>";
				}
				else
        {
				 	echo "<p>Cita previa anulada</p>";
				}
			}	
			mysqli_close($conector);
		}
		echo"<p><button><a href='ver-citas.php'>Volver a ver las Citas</a></button></p>";
	}
} 
else 
{
	if(!empty($_SESSION['username']))
	{
		echo "<p>No has seleccionado una cita a anular.</p> 
  <p><button><a href='ver-citas.php'>Ver Citas Previas</a></button></p>";
	}
	else
	{
		echo "<p>No hay iniciada una sesión.</p> 
  <p><button><a href='login.php'>Inicia sesión</a></button></p>";
	}
}
?>
<?php
  include('common/footer.php');
?>
</body>
</html>