<?php
// include('KeyController.php');
// $objKey = new KeyController();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <form method="post" name="formCard" id="formCard" action="PayController.php">
        <div class="col-6 m-auto">
            <input type="text" name="publicKey" id="publicKey" value="<?php echo $objKey::getPublicKey(); ?>">
            <input type="text" name="encriptedCard" id="encriptedCard">
            <input type="text" class="form-control" name="cardNumber" id="cardNumber" maxlength="16" placeholder="Número do Cartão">
            <input type="text" class="form-control" name="cardHolder" id="cardHolder" placeholder="Nome no Cartão">
            <input type="text" class="form-control" name="cardMonth" id="cardMonth" maxlength="2" placeholder="Mês de Validade do Cartão">
            <input type="text" class="form-control" name="cardYear" id="cardYear" maxlength="4" placeholder="Ano do Cartão">
            <input type="text" class="form-control" name="cardCvv" id="cardCvv" maxlength="4" placeholder="CVV do Cartão">
            <input type="submit" class="btn btn-primary" value="Pagar">
        </div>
    </form>

    <script src="https://assets.pagseguro.com.br/checkout-sdk-js/rc/dist/browser/pagseguro.min.js"></script>
    <!-- <script src="javascript.js"></script> -->
</body>

</html>