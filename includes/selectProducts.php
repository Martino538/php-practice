<?php require('dbConn.php'); 

// Selecteer alle data uit de tabel producten
$sql = "SELECT * FROM products";

// Verklein bandbreedte door een prepared statement
$preparedSql = $dbconn->prepare($sql);

// Voer de query uit
$preparedSql->execute();

// Haal alle data op en stop dit in een array
$result = $preparedSql->fetchAll(PDO::FETCH_OBJ);

?>