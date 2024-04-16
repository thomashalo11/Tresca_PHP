<?php
session_start();
include "connessione.php";

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["filesToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mine"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image";
        $uploadOk = 0;
    }
}
// Controllo l' entensione del file
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
    echo "Siamo spiacenti, sono contentini solo file JPG, PNG e GIF :(";
    $uploadOk = 0;
}
$id_cliente = $_SESSION["id"];
if($uploadOk == 0)
    echo "Siamo spiacenit, il tuo file non è stato caricato :(";