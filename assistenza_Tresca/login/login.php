<?php
// Connessione al database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "assistenza_tresca";
$conn = new mysqli($hostname, $username, $password, $dbname);
// Controllo di avvenuta connessione
if($conn -> connect_error)
    die("Errore di connessione");
// Recupero e assegna a 2 variabili username e password inviate dalla pagina login.html
$username = $_POST["username"];
$password = $_POST["password"];
// Query per verificare la correttezza sintattica del comando assegnato alla variabile $sql con echo($sql)
$sql = "SELECT * FROM clienti WHERE username = '{$username}' AND password = '{$password}'";
echo($sql);
// Prima di procedere verificare la correttezza sintattica del comando assegnato alla variabile $sql con echo($sql)
$result = $conn -> query($sql);
if($result -> num_rows > 0) {
    // Credenziali valide
    // Reindirizzamento a una pagina di benvenuto
    header("Location: welcome.php");
    exit();
}else {
    // Visualizza un messaggio di errore se le credenziali non sono valide
    echo "Username e/o password non corretti";
}

$conn->close()
?>