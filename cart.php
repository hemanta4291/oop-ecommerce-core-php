<?php require_once ("inc/header.php"); ?>


<?php


if(($_SERVER["REQUEST_METHOD"]) == "POST") {
    $quenty = $_POST["number"];
    $cartId = $_POST["cartId"];
    $addtoUp = $ct->addToCartUpdate($quenty,$cartId);

}

if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $del_id = $ct->addToCartDelete($del_id);
}


if(!isset($_GET['id'])){
    echo "<meta http-equiv='refresh' content='0;URL=?id=shop'>";
}

?>



 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
                    <p>

                        <?php

                            if(isset($addtoUp)){
                                echo $addtoUp;
                            }

                        ?>
                    </p>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>


                            <?php

                                $sid = session_id();

                                $get_result = $ct->sessionData($sid);
                                if($get_result){

                                    $sum = 0;
                                    $qty = 0;
                                    while ($get_data = $get_result->fetch_assoc()){ ?>
                                        <tr>
                                            <td><?php echo $get_data['productName']; ?></php></td>
                                            <td><img src="admin/upload/<?php echo $get_data['image']; ?>" alt=""/></td>
                                            <td><?php echo $get_data['price']; ?></td>
                                            <td>
                                                <form action="" method="post">
                                                    <input type="number" name="number" value="<?php echo $get_data['quentity']; ?>"/>
                                                    <input type="hidden" name="cartId" value="<?php echo $get_data['cartId']; ?>"/>
                                                    <input type="submit" name="submit" value="Update"/>
                                                </form>
                                            </td>
                                            <td>Tk. <?php
                                                    $totalPrice = $get_data['price'] * $get_data['quentity'];
                                                echo $totalPrice ?></td>
                                            <td><a href="?del_id=<?php echo $get_data['cartId']; ?>">X</a></td>
                                        </tr>
                                        <?php

                                            $qty = $qty + $get_data['quentity'];
                                                session::set('quenty',$qty)

                                        ?>
                                        <?php $sum = $sum +$totalPrice; ?>
                                 <?php   } } ?>

						</table>
                    <?php


                    $get_data = $ct->checkEmpty();

                    if($get_data){ ?>

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

                                    session::set('sum',$summ)

                                    ?> </td>
                            </tr>
                        </table>


                    <?php } else{
                       header("location:index.php");
                    }


                    ?>

					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="checkout.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
<?php require_once ("inc/footer.php"); ?>