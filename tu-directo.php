<?php
session_start();
include 'includes/cabecera.php';
include 'config.php';
if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] == FALSE){
    header('Location: index.php');
}
$id = md5(sha1(md5(md5(sha1($_SESSION['usuario'])))));
if (!empty($_POST['titulo'])){
    $titulo = mysqli_real_escape_string($conexion, htmlspecialchars(strip_tags($_POST['titulo'])));
    $sql = 'update directos set titulo = "'.$titulo.'" where id = "'.$id.'"';
    $consulta = mysqli_query($conexion,$sql);
    header('Location: directo.php?id='.$id);
}
?>
<main>
<h1>LA URL DE TRANSMISIÓN SERÁ: rtmp://<?=$_SERVER['HTTP_HOST']?>:1935/hls<br> TU CLAVE DE RETRANSMISIÓN SERÁ: <?=$id?></h1>
<form action="tu-directo.php" method="POST"><span style="color:white; font-size:1.3vw;">Titula tu directo: </span><input type="text" name="titulo"><input type="submit"></form>
</form>
</main>
</body>
</html>