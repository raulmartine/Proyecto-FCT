<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Confirmar Registrar Usuario</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
<?php
  include('common/menu.php');
?>
<?php
  include("common/conexion.php");
if(!(empty($_POST['username']) && empty($_POST['passwd'])))
{
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
  $telf = $_POST['telf'];
  if($_SESSION['rol'] == 'admin')
  {    
    if($_POST['rol'] !=null)
    {
      $rol = $_POST['rol'];
    }  
  }
  else
  {
    $rol = "registrado";
  }
  
  if(strlen($telf) > 0 && strlen($telf) < 9 || strlen($telf) > 9)
  {
    echo "<p>El telefono debe ser de 9 digitos. Por favor vuelva a rellenar el formulario.</p>
    <p><button><a href=".'login.php'.">Volver a Registrarse</a></button></p>";
  }
  else
  {
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
			  $sql = "INSERT INTO $tablaUsuarios VALUES ";
			  $sql.= "('".$username."', '".$passwd."', '".$telf."', '".$rol."');";
        $insert = mysqli_query($conexion, $sql);
			  if(!$insert)
        {
				  echo "<p>ERROR: No se ha podido crear el usuario porque ya está registrado.</p>
                <p><button><a href=".'registrar.php'.">Volver a Registrarse</a></button></p>";
			  }
			  else
        {
          echo "<p>Se ha creado el usuario.</p>";
          if (!$_SESSION['rol'] = 'admin')
          {
            $_SESSION['username'] = $_POST['username'];
					  $_SESSION['passwd'] = $_POST['passwd'];
            $_SESSION['rol'] = $rol;
            mysqli_close($conector);
            header('Location: cita-previa.php');   
          }
          mysqli_close($conector);
          header('Location: registrar.php');   
        }
      }
    }
  }
}
else if (!($_SESSION['rol']=='registrado' || $_SESSION['rol']=='peluquero'))
{
  echo "<p>Los datos del formulario para registrar un usuario están vacíos.</p>
        <p><button><a href='registrar.php'>Registrar un Usuario</a></button></p>";
}
else
{
  echo "<p>Los usuarios de tipo registrado o peluquero no pueden registrar usuarios.</p>
        <p><button><a href='index.php'>Ir al Inicio</a></button></p>";
}
?>
<?php
  include('common/footer.php');
?>
</body>
</html>