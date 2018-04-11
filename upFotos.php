<?php
session_start();
// new filename
$unMorador = $_SESSION['unMorador'];

$filename = $unMorador."".date('YmdHis') . '.jpeg';

$_SESSION['caminhoArquivo'] = $filename;

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'fotos/'.$filename) ){
 $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/fotos/' . $filename;
}


// Return image url
echo $url;