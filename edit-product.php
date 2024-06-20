<?php
  // Laad de benodigde bestanden in
  require('includes/dbConn.php');
  include('includes/edit.php');
  $paginaNaam = "new-product";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Edit product</title>
</head>
<body>
    <?php include('components/navbar.php');?>
    <main>
      <section>
        <h1>Product wijzigen</h1>
        <form method="POST">
          <!-- Als $message product naam is gevuld, geef dan het bijbehorende bericht weer -->
          <?php if(isset($message['product-name'])): ?>
              <p class="<?php echo $message['product-name']['class']?>"><?php echo $message['product-name']['msg'];?></p>
          <?php endif; ?>
          <label for="">Product naam:</label>
          <input value="<?php echo $selectResult->product_name;?>" type="text" name="product-name">

          <!-- Als $message product brand is gevuld, geef dan het bijbehorende bericht weer -->
          <?php if(isset($message['product-brand'])): ?>
              <p class="<?php echo $message['product-brand']['class']?>"><?php echo $message['product-brand']['msg'];?></p>
          <?php endif; ?>
          <label for="">Merk:</label>
          <input value="<?php echo $selectResult->product_brand;?>" type="text" name="product-brand">
          
          <!-- Als $message product prijs is gevuld, geef dan het bijbehorende bericht weer -->
          <?php if(isset($message['product-price'])): ?>
              <p class="<?php echo $message['product-price']['class']?>"><?php echo $message['product-price']['msg'];?></p>
          <?php endif; ?>
          <label for="">Prijs:</label>
          <input value="<?php echo $selectResult->product_price;?>" type="text" name="product-price">
          <button type="submit" name="submit">Wijzigen</button>
        </form>
      </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>