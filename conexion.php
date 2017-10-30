<?php
  $servidor="192.168.2.64";
  $usuario="root";
  $password="";
  $db_name="TIExamen";
  $link=mysqli_connect("$servidor","$usuario","$password") or die("No es posible establecer la conexion");
  mysqli_select_db($link,"$db_name")or die("No fue posible seleccionar la base de datos correspondiente");
?>
