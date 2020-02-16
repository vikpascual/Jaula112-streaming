<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
    <link href='style.css' rel='stylesheet' type='text/css'>
    <title>Jaula 112</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.login').click(function(){
                $('#login').toggleClass('mostrar');
                $('#borroso-login').toggleClass('mostrar')
            })
            $('#borroso-login').click(function(){
                $('#login').toggleClass('mostrar');
                $('#borroso-login').toggleClass('mostrar')
            })

            $('.registro').click(function(){
                $('#registro').toggleClass('mostrar');
                $('#borroso-registro').toggleClass('mostrar')
            })
            $('#borroso-registro').click(function(){
                $('#registro').toggleClass('mostrar');
                $('#borroso-registro').toggleClass('mostrar')
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
</head>
<?php
if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] == FALSE){
echo '
<body>
    <header>
        <div class="titulo-cabecera">
            <h1><a href="index.php" class="titulo">Jaula 112</a></h1>
        </div>
        <div class="buscador">
            <form action="busqueda.php" method="GET">
                <input type="search" name="termino" placeholder="Busca aquí">
            </form>
        </div>
        <div class="botones-registro">
            <a href="#" class="botones-registro login">Iniciar sesión</a>
            <a href="#" class="botones-registro registro">Registrarse</a>
        </div>
        <div id="borroso-login">
        </div>
        <div id="borroso-registro"></div>
            <form action="login.php" method="POST" class="formulario-login" id="login">
                <h1>Inicia sesión</h1>
                <span>Usuario</span><br>
                <input type="text" name="usuario"><br>
                <span>Contraseña</span><br>
                <input type="password" name="pass"><br>
                <input type="submit">
            </form>
            <form action="registro.php" method="POST"class="formulario-login" id="registro">
                <h1>Registrarse</h1>
                <span>Usuario</span><br>
                <input type="text" name="usuario"><br>
                <span>Contraseña</span><br>
                <input type="password" name="pass"><br>
                <input type="submit">
            </form>
    </header>
    ';
}else{
    echo '
<body>
    <header>
        <div class="titulo-cabecera">
            <h1><a href="index.php" class="titulo">Jaula 112</a></h1>
        </div>
        <div class="buscador">
            <form action="busqueda.php" method="GET">
                <input type="search" name="termino" placeholder="Busca aquí">
            </form>
        </div>
        <div class="botones-registro">
            <a href="http://'.$_SERVER['HTTP_HOST'].'/micanal.php" class="botones-registro login">Mi canal</a>
            <a href="http://'.$_SERVER['HTTP_HOST'].'/tu-directo.php" class="botones-registro login">Directo</a>
            <a href="http://'.$_SERVER['HTTP_HOST'].'/logout.php" class="botones-registro registro">Cerrar sesión</a>
        </div>
    </header>
    ';
}
?>