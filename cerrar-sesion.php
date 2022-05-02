<?php
session_start();
  $_SESSION['username'] = "";
  $_SESSION['passwd'] = "";
  $_SESSION['rol'] = "";
  session_destroy();
  header('location: index.php');
?>