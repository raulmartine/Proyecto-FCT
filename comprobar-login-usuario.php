<?php
  session_start();
	
	include("conexion.php");
	
	$conector = mysqli_connect($host,$user,$password);
	if (! $conector)
  {
		echo "ERROR: Imposible establecer conexion con el servidor.";
	}
  else
  {
		$resultado = mysqli_select_db($conector, $dbname);
		if (! $resultado)
    {
			echo "ERROR: Imposible seleccionar la base de datos.";
		}
    else
    {
			if ($_POST['username'] == 'peluquero1' || $_POST['username'] == 'peluquero2')
			{
				$sql = "SELECT * FROM $tablaPeluqueros WHERE (username='".$_POST['username']."'";
				$sql.= "and password='".$_POST['passwd']."');";
			}
			else
			{
			$sql = "SELECT * FROM $tablaClientes WHERE (username='".$_POST['username']."'";
			$sql.= "and password='".$_POST['passwd']."');";
			}
			$resultado = mysqli_query($conector, $sql);
			if(!$resultado)
      { // Si no pudo realizarse la consulta
				echo "ERROR: Imposible ejecutar la consulta.";
			}
			else
      {
				$numeroregistros = mysqli_num_rows($resultado);
				if($numeroregistros<1)
        { // Si no se encontró un usuario con esa clave.
					echo "ERROR: Usuario no registrado o clave incorrecta.";
					echo "<a href='login.php'>Volver a intentarlo</a>";
				}
				else
        {
  				$_SESSION['username'] = $_POST['username'];
					$_SESSION['passwd'] = $_POST['passwd'];
					
					if($_POST['username'] == 'peluquero1' || $_POST['username'] == 'peluquero2')
					{
						$_SESSION['rol'] = "peluquero";
					}
					else
					{
						$_SESSION['rol'] = "registrado";
					}
          header('location: index.php');
				}
      }	
		}
		mysqli_close($conector);
	}
?>