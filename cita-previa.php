<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cita Previa</title>
</head>
<body>
  <?php
    include('menu.php');
  ?>
  <h1>Cita Previa</h1>
  <h2>Rellene los párametros para realizar la cita previa</h2>
  <form method="POST" action="confirmar-registrar-cita-previa.php">
    <p>
      <label>Día*: </label>
      <select name="dia" id="dia">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
      </select>  

      <label>Mes*: </label>
      <select name="mes" id="mes">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>
    </p>

    <p>
      <label>Hora*: </label>
      <select name="hora" id="hora">
        <option value="09">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
      </select>

      <label>Minuto*: </label>
      <select name="minuto" id="minuto">
        <option value="00">00</option>
        <option value="05">05</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="25">25</option>
        <option value="30">30</option>
        <option value="35">35</option>
        <option value="40">40</option>
        <option value="45">45</option>
        <option value="50">50</option>
        <option value="55">55</option>
      </select>
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
    include('footer.php');
  ?>
</body>
</html>