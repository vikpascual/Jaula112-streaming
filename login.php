<?php
include 'config.php';
session_start();
if (empty($_POST['usuario']) || empty($_POST['pass'])){
    header('Location: index.php');
}
$usuario = mysqli_real_escape_string($conexion, strip_tags(trim($_POST['usuario'])));
$pass = sha1(md5($_POST['pass']));
$sql = 'SELECT * FROM usuarios WHERE usuario = "'.$usuario.'" and pass ="'.$pass.'"';
$consulta = mysqli_query($conexion,$sql);
$filas = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
if ($consulta){
    if (mysqli_num_rows($consulta) == 1) {
        $_SESSION['logueado'] = TRUE;
        $_SESSION['usuario'] = $filas['usuario'];
        header('Location: index.php?');
    } else{
        header('Location: index.php?error=2');
    }
}else{
    echo "error en la base de datos";
}
?>