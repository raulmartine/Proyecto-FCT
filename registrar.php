<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="uft-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
  <?php
    include('common/menu.php');
  ?>
  <section>
    <h2>Registrar</h2>
    <form method="POST" action="confirmar-registrar-usuario.php">
      <p><label>Nombre de Usuario*: </label><input type="text" name="username"></p>
      <p><label>Contraseña*: </label><input type="password" name="passwd"></p>
      <p><label>Teléfono: </label><input id="telf" type="tel" name="telf" pattern="[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}" maxlength="9"
       title="Debe ser un número de teléfono de 9 dígitos"></p>
      <p>Si introduces tu número de teléfono, podremos contactar contigo en
        caso de cancelar la cita</p>
      <?php
        if($_SESSION['rol'] == 'admin')
        {
      ?>
      <p><label>Rol: </label>
      <select name="rol" id="rol">
        <option value="registrado">Cliente</option>
        <option value="peluquero">Peluquero</option>
      </select>
      </p>
      <?php
        }
      ?>
      <p><input type="submit" value="Registrar"></p>
    </form>
  </section>
  <?php
    include('common/footer.php');
  ?>
<script>
/*Código sacado de Stackoverflow*/
/*https://stackoverflow.com/a/469362*/
/* ini: */
  function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}

setInputFilter(document.getElementById("telf"), function(value) {
  return /^\d*\.?\d*$/.test(value); 
});
/* :fin */
</script>
</body>
</html>