<?php
include 'includes/cabecera.php';
include 'config.php';
if(empty($_GET['termino'])){
    header('Location: index.php');
}
$valor = mysqli_real_escape_string($conexion, htmlspecialchars(strip_tags($_GET['termino'])));
?>
<main>
    <h1>Búsqueda: <?=$valor?></h1>
    <?php

    $sql = 'SELECT * FROM video WHERE usuario LIKE "%'.$valor.'%" OR titulo LIKE "%'.$valor.'%" ORDER BY fecha DESC';
    $consulta = mysqli_query($conexion,$sql);
    while(($row =  mysqli_fetch_assoc($consulta))) {
        echo '<div class="video">
        <video src="http://'.$_SERVER['HTTP_HOST'].'/'.$_SESSION['usuario'].'/'.$row['nombre'].'" controls></video>
        <a href="http://'.$_SERVER['HTTP_HOST'].'/ver.php?usuario='.$_SESSION['usuario'].' && titulo='.$row['titulo'].'"><h4>'.$row['titulo'].'</h4></a>
        <a href="http://'.$_SERVER['HTTP_HOST'].'/canal.php?usuario='.$row['usuario'].'"><h5>'.$row['usuario'].'</h5></a></div>';
    }
?>
<div style="margin-top:25%;">
<h1>Usuarios</h1>
<?php
$sql = 'SELECT * FROM usuarios WHERE usuario LIKE "%'.$valor.'%"';
$consulta = mysqli_query($conexion,$sql);
while(($row =  mysqli_fetch_assoc($consulta))) {
    echo '<h3 style="margin-left:5%;color:white;"><a style="text-decoration:none;color:white" href="http://'.$_SERVER['HTTP_HOST'].'/canal.php?usuario='.$row['usuario'].'">- '.$row['usuario'].'</h3>';
}
?>
</div>
</main>
</body>
</html>