<?php require_once ("inc/header.php"); ?>

<?php

    $getId = session::get('userId');

    $paymentRiceve = $ct->paymentReceive($getId);

    if($paymentRiceve){
        $sum = 0;
        $qnt = 0;
        while ($getData = $paymentRiceve->fetch_assoc()){
            $price = $getData['price'];
            $sum = $sum + $price;

            $qent = $getData['quentity'];

            $qnt = $qnt + $qent;



        }
    }


?>




    <div class="main">
        <div class="content" style="text-align: center">
            <h2>sucessfull payment</h2>
            <p>total tk: <?php echo $sum;?></p>
            <p>quenty: <?php echo  $qnt; ?></p>
            <a href="payment_status.php">visit payment status</a>
        </div>
    </div>
<?php require_once ("inc/footer.php"); ?>