<?php
session_start();
include 'config.php';
var_dump($_POST);
if(empty($_POST['titulo'])){
    header('Location: micanal.php');
}
if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] == FALSE){
  header('Location: index.php');
}
$titulo = htmlspecialchars(strip_tags(trim($_POST['titulo'])));
echo $_FILES["file"]["type"];
$allowedExts = array("flv", "mov", "avi", "wmv", "mp3", "mp4", "wma","mkv");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$id = md5(sha1(md5(md5(sha1($_SESSION['usuario'].time())))));
if ((($_FILES["file"]["type"] == "video/mp4")
|| ($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "video/x-ms-wmv")
|| ($_FILES["file"]["type"] == "video/quicktime")
|| ($_FILES["file"]["type"] == "video/x-msvideo")
|| ($_FILES["file"]["type"] == "video/x-flv"))

&& ($_FILES["file"]["size"] < 104857600)
&& in_array($extension, $allowedExts))

  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      $_FILES["file"]["name"] = $id.'.'.$extension;
      move_uploaded_file($_FILES["file"]["tmp_name"],
      'C:\xampp\htdocs\\'.$_SESSION['usuario']."\\" . $_FILES["file"]["name"]);
      $sql = 'INSERT INTO video(titulo,usuario,nombre) VALUES("'.$titulo.'", "'.$_SESSION['usuario'].'", "'.$_FILES["file"]["name"].'")';
        $consulta = mysqli_query($conexion,$sql);
        exec('pythonw script.py '.$_SESSION['usuario']."\\" . $_FILES["file"]["name"]);
        header('Location: micanal.php');
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>