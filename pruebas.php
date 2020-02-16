<?php
$id = $id = md5(sha1(md5(md5(sha1($_SESSION['usuario'].time())))));
echo $id;
?>