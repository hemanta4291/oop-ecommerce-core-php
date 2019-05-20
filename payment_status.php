<?php require_once ("inc/header.php"); ?>


<?php

$chkOrder = $ct->paymentEmpty();

if(!$chkOrder) {
    header("location:index.php");

}

if (session::get('login') == false) {
    header("location:index.php");
}


?>


    <div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2>Your Cart</h2>
                <p></p>
                <table class="tblone">
                    <tr>
                        <th width="20%">No</th>
                        <th width="20%">Product Name</th>
                        <th width="10%">quenity</th>
                        <th width="15%">price</th>
                        <th width="25%">images</th>
                        <th width="20%">date</th>
                        <th width="20%">status</th>
                        <th width="20%">action</th>
                    </tr>


                    <?php

                    $getId = session::get('userId');

                    $get_result = $ct->paymentData($getId);
                    if($get_result){

                        $sri = 0;
                        while ($get_data = $get_result->fetch_assoc()){ $sri++ ?>
                            <tr>
                                <td><?php echo $sri ?></php></td>
                                <td><?php echo $get_data['proName']; ?></php></td>
                                <td><?php echo $get_data['quentity']; ?></td>
                                <td><?php echo $get_data['price']; ?></td>
                                <td><img src="admin/upload/<?php echo $get_data['images']; ?>" alt=""/></td>
                                <td><?php echo $fm->formantedate($get_data['date']); ?></td>
                                <td><?php

                                    if($get_data['status']== '0'){
                                        echo "pending....";
                                    }else{
                                        echo "shifteded";
                                    }

                                    ?></td>
                                <?php

                                    if($get_data['status']== '1'){ ?>
                                        <td><a href="?del_id=<?php echo $get_data['cartId']; ?>">X</a></td>

                                   <?php }else{ ?>
                                        <td><?php echo "N/A"?></td>
                                   <?php }

                                    ?>

                            </tr>
                        <?php   } } ?>

                </table>


            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php require_once ("inc/footer.php"); ?>