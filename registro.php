<?php
include 'config.php';
if (empty($_POST['usuario']) || $_POST['usuario'] == '' || empty($_POST['pass'])){
    header('Location: index.php');
}
$usuario = mysqli_real_escape_string($conexion, strip_tags(trim($_POST['usuario'])));
$pass = sha1(md5($_POST['pass']));
$sql = 'SELECT * FROM usuarios WHERE usuario = "'.$usuario.'"';
$consulta = mysqli_query($conexion,$sql);
if ($consulta){
    if (mysqli_num_rows($consulta) > 0) {
        header('Location: index.php?error=0');
    } else{
        $sql = 'INSERT INTO usuarios(usuario,pass,ruta) VALUES("'.$usuario.'", "'.$pass.'", "'.$usuario.'")';
        $consulta = mysqli_query($conexion,$sql);
        $id = md5(sha1(md5(md5(sha1($_POST['usuario'])))));
        $sql = 'INSERT INTO directos(id,usuario,titulo) VALUES("'.$id.'", "'.$usuario.'", "")';
        $consulta = mysqli_query($conexion,$sql);
        exec('mkdir '.$usuario);
        header('Location: index.php?registro=1');
    }

}else{
    echo "error en la base de datos";
}
?>