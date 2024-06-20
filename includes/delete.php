<?php require('dbConn.php');

if(isset($_GET['id'])){
    // Haal de waarde van id op uit de url
    $id = $_GET['id'];

    // Verwijder het product uit de tabel producten
    $sql = "DELETE FROM products WHERE product_id = :id";
    
    // Verklein bandbreedte door een prepared statement
    $stmt = $dbconn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    if($stmt){
        header('Location: /SRP-project/index.php');
    }
}
?>