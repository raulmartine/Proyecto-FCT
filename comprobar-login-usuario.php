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
			$sql = "SELECT * FROM $tablaUsuarios WHERE (username='".$_POST['username']."'";
			$sql.= "and password='".$_POST['passwd']."');";
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
					while($fila=mysqli_fetch_array($resultado))
        	{
						if($fila['rol'] == 'admin')
						{
							$_SESSION['rol'] = "admin";
						} 
						else if($fila['rol'] == 'peluquero')
						{
							$_SESSION['rol'] = "peluquero";
						}
						else if ($fila['rol'] == 'registrado')
						{
							$_SESSION['rol'] = "registrado";
						}
						else
						{
							$_SESSION['rol'] = "anonimo";
						}
					}
          header('location: index.php');
				}
      }	
		}
		mysqli_close($conector);
	}
?>