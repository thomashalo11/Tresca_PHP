<?php
// Connessione al database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "film";
$conn = new mysqli($hostname, $username, $password, $dbname);

// Controllo di avvennuta connessione
if($conn -> connect_error)
    die("Errore di connessione");
?>

<html>
<head>
    <title>Elenco film</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="font-family: Verdana">
    <h1>Elenco film prodotti dal regista: </h1>

    <?php
    $regista = $_POST["regista"];
    echo "<h2>".$regista."</h2>";
    // Impostazione query da eseguire
    $sql = "SELECT * FROM film WHERE regista = '{regista}'";
    // echo $sql | Permette di verificarne la correttezza
    $tab = $myconn -> query($sql);
    
    // Ciclo su tutte le tuple restituite dall' interrogazione
    while($row = $tab -> fetch_array(MYSQLI_NUM)) {
        // Visualizzato i valori presenti nella prima colonna $row['0']
        echo "Titolo: ".$row['0']."<br>";
    }

    ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>