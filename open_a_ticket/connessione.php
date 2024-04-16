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