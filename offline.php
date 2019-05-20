
<?php include 'inc/header.php';?>

<?php


$usrId = session::get("userId");

if (($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST['update'])) {
    $regData = $reg->updateUserInfo($_POST, $usrId);
}


 if(isset($_GET['orderid']) && $_GET['orderid'] =='order'){

     $usrId = session::get("userId");
     $insertOrder = $ct->insOrder($usrId);
     header("location:success.php");
     $del = $ct->delOut();





 }


if (session::get('login') == false) {
    header("location:index.php");
}


?>

<div class="main order">
    <div class="content off">
        <div class="login_panel">
            <h3>your order</h3>

            <table class="tblone">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>


                <?php

                $sid = session_id();

                $get_result = $ct->sessionData($sid);
                if($get_result){
                    $sri = 0;
                    $sum = 0;
                    $qty = 0;
                    while ($get_data = $get_result->fetch_assoc()){  $sri++;?>
                        <tr>
                            <td><?php echo $sri; ?></php></td>
                            <td><?php echo $get_data['productName']; ?></php></td>
                            <td><?php echo $get_data['price']; ?></td>
                            <td><?php echo $get_data['quentity']; ?></td>
                            <td>Tk. <?php
                                $totalPrice = $get_data['price'] * $get_data['quentity'];
                                echo $totalPrice ?></td>
                        </tr>
                        <?php

                        $qty = $qty + $get_data['quentity'];
                        ?>
                        <?php $sum = $sum +$totalPrice; ?>
                    <?php   } } ?>

            </table>

                <table style="float:right;text-align:left;" width="40%">
                    <tr>
                        <th>Sub Total : </th>
                        <td>TK.<?php
                            echo $sum;

                            ?></td>
                    </tr>
                    <tr>
                        <th>VAT : </th>
                        <td>TK. <?php

                            $vat = ($sum * 0.1);
                            echo $vat;

                            ?>(10%)</td>
                    </tr>
                    <tr>
                        <th>Grand Total :</th>
                        <td>TK. <?php

                            echo $summ = $sum+$vat;
                            ?> </td>
                    </tr>
                    <tr>
                        <th>Quentity:</th>
                        <td><?php

                            echo $qty;
                            ?> </td>
                    </tr>
                </table>



        </div>

        </form>
        <div class="register_account">
            <h3>your information</h3>

            <p>
                <?php

                if(isset($regData)){
                    echo  $regData;
                }

                ?>
            </p>
            <table class="data display datatable" id="example">
                <tbody>
                <form action="" method="post">


                    <?php

                    $usrId = session::get("userId");
                    $prodata = $reg->dataUser($usrId);

                    if($prodata){
                        $getData = $prodata->fetch_assoc();


                    } ?>

                    <tr>
                        <td>name</td>
                        <td><input type="text" name="name" value="<?php echo $getData['name']?>"></td>
                    </tr>
                    <tr>
                        <td>city</td>
                        <td><input type="text" name="city" value="<?php echo $getData['city']?>"></td>
                    </tr>
                    <tr>
                        <td>zip code</td>
                        <td><input type="text" name="zip" value="<?php echo $getData['zip']?>"></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><input type="text" name="email" value="<?php echo $getData['email']?>"></td>
                    </tr>
                    <tr>
                        <td>address</td>
                        <td><input type="text" name="address" value="<?php echo $getData['address']?>"></td>
                    </tr>
                    <tr>
                        <td>country</td>
                        <td><input type="text" name="country" value="<?php echo $getData['country']?>"></td>
                    </tr>
                    <tr>
                        <td>phone</td>
                        <td><input type="text" name="phone" value="<?php echo $getData['phone']?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="update" value="update"></td>
                    </tr>
                </form>
                </tbody>
            </table>
        </div>
        <div class="clear"></div>
    </div>

        <a href="checkout.php">back</a>


        <a href="?orderid=order">order</a>

</div>

<?php include 'inc/footer.php';?>
