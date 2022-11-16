<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejo de cookies</title>
</head>
<body>
    <?php
        $nombreCookie = "mi_cookie_de_visitas";
        if(!isset($_COOKIE[$nombreCookie])){
            $tiempoExpiracion = time() + 300;
            setcookie($nombreCookie, true, $tiempoExpiracion);
            setcookie('contador', 0);
            setcookie('fecha', date('Y-m-d H:i:s'));
            setcookie('fechaultima', date('Y-m-d H:i:s'));
            echo "<h3>Bienvenido a este script</h3>";
            echo "Esta es la primera vez que visitas la página";
            echo '
                <form method="post" action="manejoDeCookies.php">
                <label for="nombre">Introduzca su nombre</label>
                <input id="nombre" type="text" name="nombre"></input>
                <input type="submit"></input>
                </form>
            ';
        }else{            
            if(isset($_POST['nombre']) && $_POST['nombre'] != null){
                setcookie('nombreusuario', $_POST['nombre']);
            }else{
                $tiempoExpiracion = time() - 1;
                setcookie($nombreCookie, "", $tiempoExpiracion);
            }
            echo "<h3>Bienvenido a este script " . $_COOKIE['nombreusuario'] . "</h3>";
            setcookie('contador', $_COOKIE['contador'] + 1);
            echo "Estas son las veces que has relogueado: " . $_COOKIE['contador'];
            echo "<br>Esta es la fecha de inicio: " . $_COOKIE['fecha'];
            setcookie('fechaultima', date('Y-m-d H:i:s'));
            if(!$_COOKIE['fechaultima']){
                $_COOKIE['fechaultima'] = $_COOKIE['fecha'];
            }
            echo "<br>Esta es la fecha de ultima: " . $_COOKIE['fechaultima'];
            echo "<br><a href='borrarCookie.php'>Borrar cookie</a>";
        }
    ?>  
</body>
</html>