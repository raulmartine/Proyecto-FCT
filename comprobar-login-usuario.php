<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comprobar Login</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
<?php
  include('common/menu.php');
?>
<?php
if(!(empty($_POST['username']) && empty($_POST['passwd'])))
{
	include("common/conexion.php");
	$conector = mysqli_connect($host,$user,$password);
	if (! $conector)
  {
		echo "<p>ERROR: No se ha podido establecer conexión con el servidor.</p>";
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
			$sql = "SELECT * FROM $tablaUsuarios WHERE (username='".$_POST['username']."'";
			$sql.= "and password='".$_POST['passwd']."');";
			$resultado = mysqli_query($conector, $sql);
			if(!$resultado)
      { // Si no pudo realizarse la consulta
				echo "<p>ERROR: No se ha podido ejecutar la consulta.</p>";
			}
			else
      {
				$numeroregistros = mysqli_num_rows($resultado);
				if($numeroregistros<1)
        { // Si no se encontró un usuario con esa clave.
					echo "<p>No existe un usuario con ese username o clave incorrecta.</p>
					<button><a href='login.php'>Volver a Iniciar Sesión</a></button>";
				}
				else
        {
  				$_SESSION['username'] = $_POST['username'];
					$_SESSION['passwd'] = $_POST['passwd'];
					while($fila=mysqli_fetch_array($resultado))
        	{
						if($fila['rol'] == 'admin')
						{
							$_SESSION['rol'] = "admin";
						} 
						else if($fila['rol'] == 'peluquero')
						{
							$_SESSION['rol'] = "peluquero";
							header('Location: ver-citas.php');
						}
						else if ($fila['rol'] == 'registrado')
						{
							$_SESSION['rol'] = "registrado";
							header('Location: cita-previa.php');
						}
						else
						{
							$_SESSION['rol'] = "anonimo";							
						}						
					}
					if($_SESSION['rol'] == 'peluquero')
					{
						header('Location: ver-citas.php');
					}
					else if($_SESSION['rol'] == 'registrado')
					{
						header('Location: cita-previa.php');
					}
					else{
						header('Location: index.php');
					}
				}
      }	
		}
		mysqli_close($conector);
	}
}
else if (!(empty($_SESSION['username']) && empty($_SESSION['passwd']) && empty($_SESSION['rol'])))
{
	echo "<p>Ya has iniciado sesión con un usuario</p>
				<button><a href='index.php'>Ir al Inicio</a></button>";
}
else
{
	echo "<p>Los datos del formulario iniciar sesión están vacíos</p>
				<button><a href='login.php'>Volver a Iniciar Sesión</a></button>";
}
?>
<?php
  include('common/footer.php');
?>
</body>
</html>