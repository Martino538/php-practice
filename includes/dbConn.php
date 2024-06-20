<?php

$dbHost = "sql7.freemysqlhosting.net";
$dbUsername = "sql7715041";
$dbName = "sql7715041";
$dbPassword = "wYBPqpFEQM";

// Beschrijf de data source
$dsn = "mysql:host=$dbHost;dbname=$dbName";

// Voer een stuk code uit, als er een onverwachte gebeurtenis plaatsvind, vang deze op in catch
try {
    // De daadwerkelijke verbinding
    $dbconn = new PDO($dsn, $dbUsername, $dbPassword);
} catch (PDOException $error){
    // Stop de foutmelding in de variabele $error. Gebruik de OOP methode getMessage 
    echo $error->getMessage();
}
?>