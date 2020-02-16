<?php
include 'includes/cabecera.php';
include 'config.php';
if(isset($_GET['registro']) &&  $_GET['registro'] == 1){
    echo '<script>alert("Usuario registrado")</script>';
}
if(isset($_GET['error']) &&  $_GET['error'] == 2){
    echo '<script>alert("Usuario o contraseña incorrecta")</script>';
}
if(isset($_GET['error']) &&  $_GET['error'] == 0){
    echo '<script>alert("Error al registrar, usuario ya existente.")</script>';
}
?>
    <main>
        <h1>Últimos Videos</h1>
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

        $sql = 'SELECT * FROM video ORDER BY fecha DESC';
        $consulta = mysqli_query($conexion,$sql);
        while(($row =  mysqli_fetch_assoc($consulta))) {
            $lista[] = $row['nombre'];
            echo '<div class="video">
            <video src="http://'.$_SERVER['HTTP_HOST'].'/'.$row['usuario'].'/'.$row['nombre'].'" controls></video>
            <a href="http://'.$_SERVER['HTTP_HOST'].'/ver.php?usuario='.$row['usuario'].' && titulo='.$row['nombre'].'"><h4>'.$row['titulo'].'</h4></a>
            <a href="http://'.$_SERVER['HTTP_HOST'].'/canal.php?usuario='.$row['usuario'].'"><h5>'.$row['usuario'].'</h5></div>';
}
?>


    </main>
</body>
</html>