<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="uft-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar</title>
</head>
<body>
  <?php
  session_start();
  ?>
  <header>
    <nav>
      <li><a href="index.php">Inicio</a></li>
      <li><a href="cita-previa.php">Cita Previa</a></li>
      <li><a href="login.php">Iniciar Sesión</a></li>
    </nav>
  </header>
  <section>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="comprobar-login-usuario.php">
      <p><label>Nombre de Usuario: </label><input type="text" name="username"></p>
      <p><label>Contraseña: </label><input type="password" name="passwd"></p>
      <p><input type="submit" value="Iniciar Sesión"></p>
    </form>
  </section>
  <section>
    <h2>Registrar</h2>
    <form method="POST" action="confirmar-registrar-usuario.php">
      <p><label>Nombre de Usuario*: </label><input type="text" name="username"></p>
      <p><label>Contraseña*: </label><input type="password" name="passwd"></p>
      <p><label>Teléfono: </label><input type="number" name="telf"></p>
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
</body>
</html>