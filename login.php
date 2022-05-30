<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="uft-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body>
  <?php
    include('common/menu.php');
  ?>
  <section>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="comprobar-login-usuario.php">
      <p><label>Nombre de Usuario: </label><input type="text" name="username"></p>
      <p><label>Contraseña: </label><input type="password" name="passwd"></p>
      <p><input type="submit" value="Iniciar Sesión"></p>
  </form>
  <p>Si no tiene una cuenta, regístrese.</p>
  <form method="POST" action="registrar.php">
    <button type="submit">Registrarse</button>
  </form>
  </section>
  <?php
    include('common/footer.php');
  ?>
</body>
</html>