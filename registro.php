<?php
  if (isset($_POST["v_email"]) && isset($_POST["v_pass"]) && isset($_POST["v_cpass"]) && isset($_POST["v_nombres"]) && isset($_POST["v_apellidos"]) && isset($_POST["v_telf"]) && isset($_POST["v_direccion"])) {
    $r_email = $_POST["v_email"];
    $r_pass = $_POST["v_pass"];
    $r_pass_2 = $_POST["v_cpass"];
    $r_nombres = $_POST["v_nombres"];
    $r_apellidos = $_POST["v_apellidos"];
    $r_telefono = $_POST["v_telf"];
    $r_direccion = $_POST["v_direccion"];
    if (isset($_POST["v_twitter"])) {
      $r_twitter = $_POST["v_twitter"];
    } else {
      $r_twitter = "";
    }
    if (isset($_POST["v_facebook"])) {
      $r_facebook = $_POST["v_facebook"];
    } else {
      $r_facebook = "";
    }
    if (isset($_POST["v_gplus"])) {
      $r_gplus = $_POST["v_gplus"];
    } else {
      $r_gplus = "";
    }
  } else {
    header("Location:index.php");
		exit();
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Agregar usuario</title>
	<meta name="description" content="Servicomp web">
	<meta name="keywords" content="examen, primer, parcial, git">
	<meta name="author" content="Lorenzo Daniel Pinacho Bohórquez">
	<meta charset="utf-8">
</head>
<body>
  <?php
  if (strlen($r_email) > 50) {
    printf("<script>alert('El correo es muy largo');</script>");
  } else if (strlen($r_pass) > 32 || strlen($r_pass_2) > 32 ) {
    printf("<script>alert('El password es muy largo');</script>");
  } else if (strlen($r_nombres) > 30) {
    printf("<script>alert('Los nombres son muy largos');</script>");
  } else if (strlen($r_apellidos) > 50) {
    printf("<script>alert('Los apellidos son muy largos');</script>");
  } else if (strlen($r_telefono) > 15) {
    printf("<script>alert('El telefono es muy largo');</script>");
  } else if (strlen($r_direccion) > 80) {
    printf("<script>alert('La dirección es muy larga');</script>");
  } else if (strlen($r_twitter) > 80) {
    printf("<script>alert('El twitter es muy largo');</script>");
  } else if (strlen($r_facebook) > 80) {
    printf("<script>alert('El facebook es muy largo');</script>");
  } else if (strlen($r_gplus) > 80) {
    printf("<script>alert('El Google Plus es muy largo');</script>");
  } else {
    include("../conexion.php");
    $consulta = "INSERT INTO usuarios (pass, nombre, apellidos, celular, direccion, twitter, facebook, gplus, correo) VALUES(md5('".mysqli_real_escape_string($link, $r_password)."'), '".mysqli_real_escape_string($link, $r_nombres)."', '".mysqli_real_escape_string($link, $r_apellidos)."', '".$r_telefono."', '".$r_direccion."', '".$r_twitter."', '".$r_facebook."', '".$r_gplus."', '".$r_email."');";
    $esExitosa = mysqli_query($link,$consulta);
    if ($esExitosa) {
      printf("<script>alert('¡USUARIO REGISTRADO!');</script>");
    } else {
      printf("<script>alert('¡USUARIO REGISTRADO!');</script>");
    }
    mysqli_close($link);
  }
  ?>
</body>
</html>
