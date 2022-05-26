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
    $fecha = date("Y-m-d");
    if(!(empty($_SESSION['username']) || $_SESSION['rol']=='peluquero' || $_SESSION['rol']=='admin'))
    {
  ?>
  <h1>Cita Previa</h1>
  <h2>Rellene los párametros para realizar la cita previa</h2>
  <form method="POST" action="confirmar-registrar-cita-previa.php">
    <p>
      <label>Día*: </label>
      <input type="date" name ="fecha" id ="fecha" value="<?php echo $fecha; ?>" min="<?php echo $fecha; ?>"/>
    </p>
    <p>
      <label>Hora*: </label>
      <input type="time" name="hora" min="09:30" max="19:00" step="1800">
    </p>
    <p>
      <label>Servicio*: </label>
      <select name="servicio" id="servicio">
        <option value="CDPH">Corte de Pelo Hombre</option>
        <option value="CDPM">Corte de Pelo Mujer</option>
      </select>
    </p>
    <p>
      <label>Peluquero*: </label>
      <select name="peluquero" id="peluquero">
        <option value="peluquero1">Angel</option>
        <option value="peluquero2">Vanessa</option>
      </select>
    </p>
    
    <p><input type="submit" value="Confirmar Cita"></p>
  </form>
  <?php
    }
    else
    {
      if($_SESSION['rol']=='peluquero')
      {
        echo "<p>Los peluqueros no pueden realizar citas previa.</p>
              <button><a href='index.php'>Ir al Inicio</a></button>";
      }
      else if($_SESSION['rol']=='admin')
      {
        echo "<p>Los administradores no pueden realizar citas previa.</p>
              <button><a href='index.php'>Ir al Inicio</a></button>";
      }
      else
      {
        echo "<p>Debes iniciar sesión primero.</p>
            <button><a href='login.php'>Inicie sesión</a></button>";
      }
    }
    include('common/footer.php');
  ?>
</body>
</html>