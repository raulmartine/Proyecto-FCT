<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cita Previa</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
  <?php
    include('common/menu.php');
    
    $fecha = date("Y-m-d");
    $horaActual = date("H:i");
    $horamin;
    if ($horaActual < date("09:30") || $horaActual > date("19:30"))
    {
      $horamin = date("09:30");
      $horaActual = date("09:30");
    }
    else if(($horaActual > date("H:00") && $horaActual < date("H:30")) || $horaActual == date("H:30")){
      $horamin = date("H:30");
      $horaActual = date("H:30");
    }
    else{
      $horamin = date("H:00", strtotime('+1 hour'));
      $horaActual = date("H:00", strtotime('+1 hour'));
    }

    if(!(empty($_POST['fecha']) && empty($_POST['hora']) && empty($_POST['servicio']) && empty($_POST['peluquero'])))
    {
      $fecha = $_POST['fecha'];
      $horaActual = $_POST['hora'];
      $servicio = $_POST['servicio'];
      $peluquero = $_POST['peluquero'];
    }
    else{
      $servicio = "Corte de Pelo Hombre";
      $peluquero = "Angel";
    }

    if(!(empty($_SESSION['username']) || $_SESSION['rol']=='peluquero' || $_SESSION['rol']=='admin'))
    {
  ?>
  <h1>Cita Previa</h1>
  <h2>Rellene los párametros para realizar la cita previa</h2>
  <form method="POST" action="confirmar-registrar-cita-previa.php">
    <p>
      <label>Día: </label>
      <input type="date" name ="fecha" id ="fecha" value="<?php echo $fecha; ?>" min="<?php echo $fecha; ?>"/>
    </p>
    <p>
      <label>Hora: </label>
      <input type="time" id="hora" name="hora" min="<?php echo $horamin; ?>" max="19:00" step="1800"
      pattern="" value="<?php echo $horaActual; ?>" title="Indique una hora entre las <?php echo $horamin;?> y las 19:30"/>
    </p>
    <p>
      <label>Servicio: </label>
      <select name="servicio" id="servicio" value="<?php echo $servicio ?>">
        <option value="CDPH">Corte de Pelo Hombre</option>
        <option value="CDPM">Corte de Pelo Mujer</option>
      </select>
    </p>
    <p>
      <label>Peluquero: </label>
      <select name="peluquero" id="peluquero" value="<?php echo $peluquero ?>">
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
<script>
  let horaElement = document.getElementById("hora");
  let dateElement = document.getElementById("fecha");
  let fecha = dateElement.value;
  var date = new Date();
  let numeroDia = new Date(dateElement.value).getDay()

  dateElement.addEventListener('change', (event) =>{
    numeroDia = new Date(dateElement.value).getDay();
    console.log(numeroDia)
    console.log(new Date(dateElement.value))
    var mes = date.getMonth()+1;
    var dia = date.getDate();
    var anyo = date.getFullYear();

    if(dateElement.value != date && numeroDia !== 0){
      horaElement.value = "09:30";
      horaElement.min = "09:30";
      horaElement.max = "19:30";
    }
    if(numeroDia === 0 || numeroDia === 1){
      if(numeroDia === 0){
        alert("No se pueden hacer citas el domingo");
      }
      else if (numeroDia === 1){
        alert("No se pueden hacer citas el lunes");      
      }
      var dateCorregido = anyo + '-' + mes + '-' + dia;
      dateElement.value = fecha;
    }
  })
</script>
</body>
</html>