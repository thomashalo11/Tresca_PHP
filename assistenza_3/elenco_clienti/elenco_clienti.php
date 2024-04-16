<?php
// Connessione al database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "assistenza_tresca";
$conn = new mysqli($hostname, $username, $password, $dbname);

// Controllo di avvennuta connessione
if($conn -> connect_error)
    die("Errore di connessione");

// $matricola = $_GET['matricola'];

// Impostazione comando sql per eseguire la query
$query = "select codice, nome, cognome from clienti";


// Esecuzione della query tramite il metodo query
// La query restituisce una tabella temporanea
$tabella = $conn -> query($query);

if($tabella -> num_rows == 0)
    echo "Non è presente nessun cliente";
while($row = $tabella -> fetch_assoc()) {
    echo "<ul class='list-group'><li class='list-group-item'><a href='ticket.php?ticket={$row['codice']}'>{$row['cognome']}</a></li></ul>";
}
    
?>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>