<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <?php
  session_start();
  include("conexion.php")
  ?>
</head>
<body>
  <header>
    <nav>
      <li><a href="index.php">Inicio</a></li>
      <li><a href="cita-previa.php">Cita Previa</a></li>
  <?php
    if(empty($_SESSION['username']) && empty($_SESSION['passwd']))
    {
  ?>  
    <li><a href="login.php">Iniciar Sesión</a></li>
  <?php
    }
    else 
    {
  ?>
    <li><a href="ver-citas.php">Ver Citas Previas</a></li>
    <li><a href="cerrar-sesion.php">Cerrar Sesión</a></li>
    <li><?php
        echo "Usuario: ".$_SESSION['username']." Rol: ".$_SESSION['rol'];
      ?>
    </li>
  <?php
    }
  ?>
    </nav>
  </header>
  <h1>Ángel Peluqueros</h1>
  <section>
    <p><img src="https://i.picsum.photos/id/1023/500/500.jpg?hmac=inqqWNZat87P7CSMN0LmAt-YDHVbMRIaY29cdstKtH0"></p>
    <button onclick="location.href='cita-previa.php'"><strong>Pide Cita Previa
    </strong></button>
  </section>
  <section>
    <h2>Quienes Somos</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consectetur
      id urna ut consequat. Morbi ut faucibus orci. Sed sapien eros, elementum
      ornare elit vel, auctor tempor nibh.</p>
  </section>
  <section>
    <h2>Que Ofrecemos</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut consectetur
      id urna ut consequat. Morbi ut faucibus orci. Sed sapien eros, elementum
      ornare elit vel, auctor tempor nibh.</p>
  </section>
  <section>
    <h2>Ubicación</h2>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3079.8952087788853!2d-0.4118773488332042!3d39.47169602039099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604f6f1bac36f9%3A0xfd1ab078fa2e3b53!2s%C3%81ngel%20Peluqueros!5e0!3m2!1ses!2ses!4v1650992669510!5m2!1ses!2ses"
        width="400" height="300" style="border:0;" allowfullscreen="" 
        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>
  <footer>
    <h2>Contactos</h2>
      <h3>Ángel Peluqueros</h3>
      <p>Dirección: Carrer d'Alcàsser, 48, 46014 Valencia, España</p>
      <p>+34 657 11 92 14</p>
      <!-- <a href="http://www.facebook.com//"> www.facebook.com//</a><br> -->
      <p><a href="https://www.instagram.com/angelpeluquerosoficial/"> @angelpeluquerosoficial </a></p>
      <!-- <a href="mailto:@gmail.com">@gmail.com</a><br> -->
    
    <!-- <p><a href="https://angelpeluqueros.com/privacidad/">Política de Privacidad y Aviso Legal Web</a></p></div> -->
 
    <h3>Horario de funcionamiento</h3>
    <p>Martes a Viernes: 9:30 - 19:30</p>
    <p>Sábado: 9 - 14</p>
    <p>Lunes y Domingo - Cerrado</p>
  </footer>
</body>
</html>