<?php
session_start();
include 'includes/cabecera.php';
include 'config.php';
if(empty($_GET['id'])){
    header('Location: index.php');
}
$id = mysqli_real_escape_string($conexion, $_GET['id']);
$sql = 'SELECT * FROM directos WHERE id = "'.$id.'"';
$consulta = mysqli_query($conexion, $sql);
    while(($row =  mysqli_fetch_assoc($consulta))) {
        echo '<h1 style="color:white; margin-left:25%;">'.$row['titulo'].'</h1>';
        echo '<div class="video-tocho">';
        echo '<video id="video" controls autoplay></video>';
        echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/canal.php?usuario='.$row['usuario'].'"><h2>'.$row['usuario'].'</h2></a></div>';
    }
?>
    <script>
    if(Hls.isSupported())
    {
        var video = document.getElementById('video');
        var hls = new Hls();
        hls.loadSource('http://<?=$_SERVER['HTTP_HOST']?>:8000/hls/<?=$id?>.m3u8');
        hls.attachMedia(video);
        hls.on(Hls.Events.MANIFEST_PARSED,function()
        {
            video.play();
        });
    }
    else if (video.canPlayType('application/vnd.apple.mpegurl'))
    {
        video.src = 'http://<?=$_SERVER['HTTP_HOST']?>:8000/hls/<?=$id?>.m3u8';
        video.addEventListener('canplay',function()
        {
            video.play();
        });
    }
    </script>
  </body>
</html>