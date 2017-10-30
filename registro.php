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
  if (strlen($r_nombreCompleto) > 90) {
    printf("<script>
        swal ({
        title: 'Nombre completo',
        text: 'El nombre del personal supera el tamaño permitido',
        type: 'error',
        showCancelButton: false,
        confirmButtonText: 'Ok',
        closeOnConfirm: true
      }, function(isConfirm){
        if (isConfirm) {
          location.href='agregarPersonal';
        }
      });
    </script>");
  } else if (strlen($r_nick) > 15) {
    printf("<script>
        swal ({
        title: 'Nombre de usuario',
        text: 'El nombre de usuario del personal supera el tamaño permitido',
        type: 'error',
        showCancelButton: false,
        confirmButtonText: 'Ok',
        closeOnConfirm: true
      }, function(isConfirm){
        if (isConfirm) {
          location.href='agregarPersonal';
        }
      });
    </script>");
  } else if (strlen($r_password) > 32) {
    printf("<script>
        swal ({
        title: 'Contraseña',
        text: 'La contraseña del personal supera el tamaño permitido',
        type: 'error',
        showCancelButton: false,
        confirmButtonText: 'Ok',
        closeOnConfirm: true
      }, function(isConfirm){
        if (isConfirm) {
          location.href='agregarPersonal';
        }
      });
    </script>");
  } else if (strlen($r_direccion) > 50) {
    printf("<script>
        swal ({
        title: 'Dirección',
        text: 'La dirección del personal supera el tamaño permitido',
        type: 'error',
        showCancelButton: false,
        confirmButtonText: 'Ok',
        closeOnConfirm: true
      }, function(isConfirm){
        if (isConfirm) {
          location.href='agregarPersonal';
        }
      });
    </script>");
  } else if (strlen($r_celular) > 15) {
    printf("<script>
        swal ({
        title: 'Celular',
        text: 'El celular del personal supera el tamaño permitido',
        type: 'error',
        showCancelButton: false,
        confirmButtonText: 'Ok',
        closeOnConfirm: true
      }, function(isConfirm){
        if (isConfirm) {
          location.href='agregarPersonal.php';
        }
      });
    </script>");
  } else {
    $esAdministrador = 0;
    $esVentas = 0;
    $esRedes = 0;
    $esTecnico = 0;
    if ($r_tipoUsuario == 1) {
      $esAdministrador = 1;
    } else if ($r_tipoUsuario == 2) {
      $esVentas = 1;
    } else if ($r_tipoUsuario == 3) {
      $esTecnico = 1;
    } else {
      $esRedes = 1;
    }
    include("../conexion.php");
    mysqli_set_charset($link, "latin1_swedish_ci");
    $consulta = "INSERT INTO usuarios (nombreUsuario, nick, pass, direccion, celular, acceso, conectado, escribiendo, administrador, ventas, redes, tecnico) VALUES('".mysqli_real_escape_string($link, $r_nombreCompleto)."', '".mysqli_real_escape_string($link, $r_nick)."', md5('".mysqli_real_escape_string($link, $r_password)."'), '".mysqli_real_escape_string($link, $r_direccion)."', '".$r_celular."', 1, 0, 0, ".$esAdministrador.", ".$esVentas.", ".$esRedes.", ".$esTecnico.");";
    $esExitosa = mysqli_query($link,$consulta);
    if ($esExitosa) {
      printf("<script>
          swal ({
          title: 'Personal almacenado',
          text: 'El personal fue almacenado correctamente',
          type: 'success',
          showCancelButton: false,
          confirmButtonText: 'Ok',
          closeOnConfirm: true
        }, function(isConfirm){
          if (isConfirm) {
            location.href='index';
          }
        });
      </script>");
    } else {
      printf("<script>
          swal ({
          title: 'Personal no almacenado',
          text: 'El personal no fue almacenado correctamente, intentelo nuevamente',
          type: 'error',
          showCancelButton: false,
          confirmButtonText: 'Ok',
          closeOnConfirm: true
        }, function(isConfirm){
          if (isConfirm) {
            location.href='agregarPersonal';
          }
        });
      </script>");
    }
    mysqli_close($link);
  }
  ?>
</body>
</html>
