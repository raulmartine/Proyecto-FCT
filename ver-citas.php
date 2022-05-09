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
      $sql = "SELECT * FROM $tablaCitas WHERE username='". $_SESSION['username']."';";
      
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
          echo "<p><b>Fecha:</b> " . $fechacorrecta .
          " </p><p><b>Servicio:</b> " . $fila['servicio'] .
          " </p><p><b>Peluquero:</b> " . $fila['peluquero'] . "</p>";
        
        echo "<hr>";
        }
      }
    }
  mysqli_close($conexion);    
  }    
} 
else
{
  echo "<p><a href='login.php'>Inicie sesion primero</a></p>";
}
echo "<p><a href='index.php'>Ir al Inicio</a></p>"
?>