<?php
session_start();

if(!(empty($_SESSION['username']) && empty($_SESSION['passwd'])))
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
      if($_SESSION['rol'] == 'peluquero')
      {
        $sql = "SELECT * FROM $tablaCitas WHERE peluquero='". $_SESSION['username']."';";
      }
      else
      {
        $sql = "SELECT * FROM $tablaCitas WHERE username='". $_SESSION['username']."';";
      }
      
      $resultado = mysqli_query($conexion, $sql);
      if(!$resultado)
      {
        echo "<p>No hay citas registradas.</p>
              <p><button><a href='cita-previa.php'>Crear cita previa</a></button></p>";
      }
      else
      {          
        while($fila=mysqli_fetch_array($resultado))
        {
           
          // La fecha de esta $fila['fecha'] en formato año-mes-día (mal).
          // Dentro de la fecha, separamos el año, mes y día (por el guión).
          $vectorfecha=explode("-",$fila['fecha']);
          // Reconstruimos la cadena: "día-mes-año hora:minutos:segundos"
          $fechacorrecta=substr($vectorfecha[2],0,2)."-".$vectorfecha[1]."-".
          $vectorfecha[0]." ".substr($vectorfecha[2],3,5);
              
          echo "<hr>";
          if($_SESSION['rol'] == 'peluquero')
          {
            echo "<p><b>Usuario:</b> ". $fila['username']. "</p>";
          }
          echo "<p><b>Fecha:</b> " . $fechacorrecta. "</p>";
          echo "<p><b>Servicio:</b> " . $fila['servicio'] . "</p>";
          if($_SESSION['rol'] == 'registrado')
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
  mysqli_close($conexion);    
  }    
} 
else
{
  echo "<p><button><a href='login.php'>Inicie sesion primero</a></button></p>";
}
echo "<p><button><a href='index.php'>Ir al Inicio</a></button></p>"
?>