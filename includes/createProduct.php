<?php 
    $message = [];

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
    if(isset($_POST['submit'])) {
        $message = veldChecker();
        if(empty($message)){
            // Vul de variabelen met de waardes uit de input
            $name = $_POST['product-name'];
            $brand = $_POST['product-brand'];
            $price = $_POST['product-price'];

            // Insert de nieuwe data en koppel de placeholders aan een variabele
            $sqlInsert = "INSERT INTO products(product_name, product_brand, product_price) VALUES (:name, :brand, :price)";
            $stmt = $dbconn->prepare($sqlInsert);   
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':brand', $brand);
            $stmt->bindParam(':price', $price);

            // Als het statement wordt uitgevoerd vul dan de dimensional array met een bericht en geef een css class
            if($stmt->execute()) {
                $message['product-name'] = [
                    'msg' => 'Product succesvol aangemaakt!',
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