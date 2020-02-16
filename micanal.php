<?php
include 'includes/cabecera.php';
include 'config.php';
if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] == FALSE){
    header('Location: index.php');
}
?>
<main>
    <h1>Tus vídeos</h1>
        <!--
            <div class="dropdown">
                <video id="player" width="400">
                    <source src="http://mirrors.standaloneinstaller.com/video-sample/TRA3106.mp4" type="video/mp4">
                </video>
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Quality
            (<span id="pp"></span>)</button>
            <ul class="dropdown-menu">
            <li><a href="#" onclick="changeQ('fullHD')">FullHD</a></li>
            <li><a href="#" onclick="changeQ('720p')">720p</a></li>
            <li><a href="#" onclick="changeQ('360p')">360p</a></li>
            </ul>
            </div>
-->
<?php

$sql = 'SELECT * FROM video WHERE usuario = "'.$_SESSION['usuario'].'" ORDER BY fecha DESC';
$consulta = mysqli_query($conexion,$sql);
while(($row =  mysqli_fetch_assoc($consulta))) {
    echo '<div class="video">
    <video src="http://'.$_SERVER['HTTP_HOST'].'/'.$_SESSION['usuario'].'/'.$row['nombre'].'" controls></video>
    <a href="http://'.$_SERVER['HTTP_HOST'].'/ver.php?usuario='.$_SESSION['usuario'].'&&titulo='.$row['nombre'].'"><h4>'.$row['titulo'].'</h4></a>
</div>';
}
?><h1 style="margin-top:25%;">Tu directo</h1>
<?php
    $id = md5(sha1(md5(md5(sha1($_SESSION['usuario'])))));
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
        <form action="subir_video.php" method="post" enctype="multipart/form-data" style="margin-top:20%;padding:1%;width:50%;color:white;margin-left:25%;border:1px solid white">
            <h1>Subir video</h1>
            Titulo<br>
            <input type="text" name="titulo" required/> <br><br>
            <input type="file" name="file" id="file" required/>
            <br />
            <br>
            <input type="submit" name="submit" value="Subir" />
        </form>
    </main>
</body>
</html>
