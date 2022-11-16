<?php
    $nombreCookie = "mi_cookie_de_visitas";
    $tiempoExpiracion = time() - 1;
    setcookie($nombreCookie, "", $tiempoExpiracion);
    header("Location: manejoDeCookies.php");
?>