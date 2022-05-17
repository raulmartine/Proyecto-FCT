<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
</head>
<body>
  <?php
    include('menu.php');
    if(empty($_SESSION['username']) && empty($_SESSION['passwd']))
    {
      $_SESSION['username'] = "";
      $_SESSION['passwd'] = "";
      $_SESSION['rol'] = "";
    }
  ?>
  <h1>Ángel Peluqueros</h1>
  <section>
    <p><img src="https://i.picsum.photos/id/1023/500/500.jpg?hmac=inqqWNZat87P7CSMN0LmAt-YDHVbMRIaY29cdstKtH0"></p>
    <?php
    if (!($_SESSION['rol'] == 'peluquero'))
    {
    ?>
    <button onclick="location.href='cita-previa.php'"><strong>Pide Cita Previa
    </strong></button>
    <?php
    }
    ?>
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
  <?php
    include('footer.php');
  ?>
</body>
</html>