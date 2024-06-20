<?php
  // Laad de benodigde bestanden in
  require('includes/dbConn.php');
  include('includes/selectProducts.php');
  $paginaNaam = "home";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <?php include('components/navbar.php');?>
    <main>
      <table>
          <tr>
            <th>Productnummer:</th>
            <th>Naam:</th>
            <th>Merk:</th>
            <th>Prijs:</th>
            <th>Wijzig</th>
            <th>Verwijder</th>
          </tr>
          <?php
          // Als er een waarde in $result zit, geef dan alle data weer van het product object in een tabel. Geef anders een bericht weer
            if($result > null){
              foreach($result as $pData) {
                echo '<tr>
                        <td>' . $pData->product_id . '</td>
                        <td>' . $pData->product_name . '</td>
                        <td>' . $pData->product_brand . '</td>
                        <td>€' . $pData->product_price . '</td>
                        <td><a class="edit" href="edit-product.php?id='. $pData->product_id .'">Wijzig</td>
                        <td><a class="delete" href="includes/delete.php?id='. $pData->product_id .'">Delete</td>
                      </tr>';
              }
            }
          ?>
      </table>
        <?php if($result == null){ echo '<p>Het is nog leeg hier... Maak een nieuw product aan.</p>';}?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>