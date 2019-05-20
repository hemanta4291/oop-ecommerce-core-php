<?php require_once ("inc/header.php"); ?>



<?php

    $usrId = session::get("userId");

    if(($_SERVER["REQUEST_METHOD"]) == "POST" && isset($_POST['update'])){
        $regData = $reg->updateUserInfo($_POST,$usrId);
    }

?>

    <div class="main">
        <div class="content">
            <div class="section group">

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
        </div>
    </div>
<?php require_once ("inc/footer.php"); ?>