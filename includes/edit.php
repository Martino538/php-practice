<?php require('includes/dbConn.php');
    // Haal de id waarde op uit de url
    $id = $_GET['id'];
    $message = [];

    // Selecteer de waardes uit de database van het desbetreffende product en maak van de resultaten een object
    $sqlSelect = "SELECT * FROM products WHERE product_id = :id";
    $selectStmt = $dbconn->prepare($sqlSelect);
    $selectStmt->bindParam(':id', $id);
    $selectStmt->execute();
    $selectResult = $selectStmt->fetch(PDO::FETCH_OBJ);

    function veldChecker() {
        $message = [];

        // Check of de input field voor het productnaam leeg is en op ongeldige tekens met preg_match. Zo ja vul $message met een class en bericht 
        if(empty($_POST['product-name'])) {
            $message['product-name'] = [
                'msg' => 'Product naam is nog leeg!',
                'class' => 'alert-error'
            ];
        } else if(preg_match('[@_!#$%^&*()<>?/|}{~:]', $_POST['product-name'])){
            $message['product-name'] = [
                'msg' => 'Product naam mag geen speciale characters bevatten!',
                'class' => 'alert-error'
            ];
        }

        // Check of de input field voor het merk naam leeg is en op ongeldige tekens met preg_match. Zo ja vul $message met een class en bericht 
        if(empty($_POST['product-brand'])) {
            $message['product-brand'] = [
                'msg' => 'Product merk is nog leeg!',
                'class' => 'alert-error'
            ];
        } else if(preg_match('[@_!#$%^&*()<>?/|}{~:]', $_POST['product-brand'])){
            $message['product-brand'] = [
                'msg' => 'Product merk mag geen speciale characters bevatten!',
                'class' => 'alert-error'
            ];
        }
        
        // Check of de input field voor de product prijs leeg is en op ongeldige tekens met preg_match. Zo ja vul $message met een class en bericht 
        if(empty($_POST['product-price'])) {
            $message['product-price'] = [
                'msg' => 'Product prijs is nog leeg!',
                'class' => 'alert-error'
            ];
        } else if(!is_numeric($_POST['product-price']) && !floor($_POST['product-price']) != $_POST['product-price']) {
            $message['product-price'] = [
                'msg' => 'Product prijs moet een getal zijn!',
                'class' => 'alert-error'
            ];
        }
        return $message;
    }

    // Als er op de submit knop wordt gedrukt
    if(isset($_POST['submit']) && isset($_GET['id'])) {
        $message = veldChecker();
        if(empty($message)){
            // Vul de variabelen met de waardes uit de input
            $name = $_POST['product-name'];
            $brand = $_POST['product-brand'];
            $price = $_POST['product-price'];
    
            // Update de nieuwe data en koppel de placeholders aan een variabele
            $sqlUpdate = "UPDATE products SET product_name = :product_name, product_brand = :product_brand, 
            product_price = :product_price WHERE product_id = :product_id";
            $stmt = $dbconn->prepare($sqlUpdate);   
            $stmt->bindParam(':product_name', $name);
            $stmt->bindParam(':product_brand', $brand);
            $stmt->bindParam(':product_price', $price);
            $stmt->bindParam(':product_id', $id);
            if($stmt->execute()){
                header("Refresh:3");
            }

            if($stmt) {
                $message['product-name'] = [
                    'msg' => 'Product succesvol gewijzigd!',
                    'class' => 'alert-success'
                ];
            } else {
                $message['product-name'] = [
                    'msg' => 'Er is iets misgegaan!',
                    'class' => 'alert-error'
                ];
            }
        }
    }
?>