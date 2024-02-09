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
// Recupero e assegna a 2 variabili username e password inviate dalla pagina registrazione_cliente.php
$username = $_POST["username"];
$password = $_POST["password"];
$cognome = $_POST["cognome"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$nome = $_POST["nome"];
// Query per verificare se esiste già un cliente con lo stesso username
$sql = "SELECT * FROM clienti WHERE username = '{$username}'";
echo($sql);
// Prima di procedere verificare la correttezza sintattica del comando assegnato alla variabile $sql con echo($sql)
$result = $conn -> query($sql);
if($result -> num_rows > 0) {
    // Credenziali valide
    // Reindirizzamento a una pagina inserimento.html
    header("Location: registrazione_cliente.html");
    exit();
}else {
    // Creazione query di comando sql INSERT INTO
    $sql = "INSERT INTO clienti (nome, cognome, username, password, email, telefono)";
    $sql.= "VALUES ('{$nome}','{$cognome}','{$username}','{$password}', {$email}, {$telefono});";

    $result = $conn -> query($sql) or die ("Query inserimento cliente fallita");
    // Visualizzazione tabella database aggiornata
    $sql = "SELECT codice, cognome, nome from clienti";
    $result = $conn -> query($sql) or die ("Query fallita");
    foreach($result as $riga) {
        echo "<h3>Inserimento cliente {$cognome} {$nome} effettuato </h3>";
        echo "<td>{$riga['cognome']}</td>";
        echo "<td>{$riga['nome']}</td>";
    }
}
$conn->close()

?>