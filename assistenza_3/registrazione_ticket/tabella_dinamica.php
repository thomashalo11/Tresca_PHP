<html>

<?php
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

if($result = mysqli_query($link, $cliente)) {
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            echo $row['nome'];
        }
    }
}

?>


<form action="registrazione_ticket.php" method="post">
            <label for="clienti">Seleziona il tuo nome e cognome</label>
            <select class="form-select form-select-sm" aria-label=".form-select-lg example" name="registi" id="registi">
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        <input type="submit" name="submit" value="Invia">
    </form>
</html>

