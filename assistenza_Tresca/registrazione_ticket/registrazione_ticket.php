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
$data = $_POST["data"];
$richiesta = $_POST["richiesta"];
$cliente = "SELECT * FROM clienti";

// Prima di procedere verificare la correttezza sintattica del comando assegnato alla variabile $sql con echo($sql)
$sql = "SELECT * FROM tecnici";
$result = $conn -> query($sql);
if($result -> num_rows > 0) {
    // Credenziali valide
    // Reindirizzamento a una pagina inserimento.html
    header("Location: registrazione_tecnico.html");
    exit();
}else {
    // Creazione query di comando sql INSERT INTO
    $sql = "INSERT INTO tecnici (nome, cognome, specializzazione)";
    $sql.= "VALUES ('{$nome}','{$cognome}','{$specializzazione}');";
    // usernome Cliente
    $usernameCliente = "SELECT codice FROM clienti WHERE username={$username}";
    

    $result = $conn -> query($sql) or die ("Query inserimento tecnico fallita");
    // Visualizzazione tabella database aggiornata
    
    foreach($result as $riga) {
        echo "<h3>Inserimento tecnico {$cognome} {$nome} effettuato </h3>";
        echo "<td>{$riga['cognome']}</td>";
        echo "<td>{$riga['nome']}</td>";
    }

    $sql = "SELECT codice, nome, cognome FROM clienti";
    $tab = $conn -> query($sql);
}
$conn->close()

?>