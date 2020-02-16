<?php
include 'includes/cabecera.php';
include 'config.php';
$usuario = mysqli_real_escape_string($conexion, htmlspecialchars(strip_tags($_GET['usuario'])));
$titulo = mysqli_real_escape_string($conexion, htmlspecialchars(strip_tags($_GET['titulo'])));
$sql = 'SELECT * FROM video WHERE usuario = "'.$usuario.'" AND nombre = "'.$titulo.'" ORDER BY fecha DESC';
?>

<?php
    $consulta = mysqli_query($conexion,$sql);
    while(($row =  mysqli_fetch_assoc($consulta))) {
        echo '<h1 style="color:white; margin-left:25%;">'.$row['titulo'].'</h1>';
        echo '<div class="video-tocho">';
        echo '<video src="http://'.$_SERVER['HTTP_HOST'].'/'.$row['usuario'].'/'.$row['nombre'].'" id="tocho" controls></video>';
        echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/canal.php?usuario='.$row['usuario'].'"><h2>'.$row['usuario'].'</h2></a></div>';

    }
?>
<script>
ruta_completa = document.getElementById("tocho").src;
ruta_sinextension = ruta_completa.substring(0,ruta_completa.lastIndexOf('.'));
function cambiar_calidad(calidad){
     $('video#tocho').attr('src',ruta_sinextension+calidad+ruta_completa.substring(ruta_completa.lastIndexOf('.')));
      $('span#pp').html(calidad);
     console.log($('source','video#player').attr('src'))
}
</script>
<div class="dropdown">
 <button >Calidad (<span id="pp">Original</span>)</button>
 <ul class="dropdown-menu" style="color:white;">
    <li onclick="cambiar_calidad('')"  style='cursor: pointer;'>Original</a></li>
   <li onclick="cambiar_calidad('_240p')"  style='cursor: pointer;'>240p</a></li>
   <li onclick="cambiar_calidad('_480p')"  style='cursor: pointer;'>480p</a></li>
   <li onclick="cambiar_calidad('_720p')"  style='cursor: pointer;'>720p</a></li>
 </ul>
</div>