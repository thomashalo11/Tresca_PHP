<?
print_r($_FILES);
if(!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name']))


$uploaddir = 'uploads/';

// Recupero della cartella dove mettere i file caricati dagli utenti
$userfile_tmp = $_FILES['userfile']['tmp_name'];
// Recupero
$userfile_name = $_FILES['userfile']['name'];

$ext_ok = array('html', 'odt', 'pdf');
$temp = explode('.', $_FILES['userfile']['name']);
$ext = end($temp);
if(!in_array($ext, $ext_ok)) {
    echo 'Il file ha un estensione non ammessa eh';
    exit;
}

// Copio il file dalla sua posizione temporanea alla mia cartella upload
if(move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name))
    echo 'File inviato con successo :)';
else
    echo 'Upload non valido >:(';