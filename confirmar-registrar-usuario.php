<?php
  session_start();
  include("conexion.php");
	
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
  $telf = $_POST['telf'];
  if($_POST['rol'] !=null)
  {
    $rol = $_POST['rol'];
  }  
  else{
    $rol = "registrado";
  }
  
  if ($username == "" || $passwd == "")
  {
    echo "<p>Usuario o contrasena no rellenados. Por favor rellene los dos campos obligatorios como mínimo.</p>
    <p><button><a href=".'login.php'.">Volver a Registrarse</a></button></p>";
  }
  else
  {
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
			    $sql = "INSERT INTO $tablaUsuarios VALUES ";
			    $sql.= "('".$username."', '".$passwd."', '".$telf."', '".$rol."');";
          $insert = mysqli_query($conexion, $sql);
			    if(!$insert)
          {
				    echo "<p>No se ha podido crear el usuario.</p>";
			    }
			    else
          {
            echo "<p>Se ha creado el usuario.</p>";
            mysqli_close($conector);
          }
        }
      }
      echo "<p><button><a href=".'index.php'.">Volver a Inicio</a></button></p>";
    }
  }
?>