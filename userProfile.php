<?php require_once ("inc/header.php"); ?>

    <div class="main">
        <div class="content">
            <div class="section group">

                <table class="data display datatable" id="example">
                    <tbody>


                    <?php

                    $usrId = session::get("userId");
                    $prodata = $reg->dataUser($usrId);

                    if($prodata){
                        $getData = $prodata->fetch_assoc();


                    } ?>

                    <tr>
                        <td>id</td>
                        <td><?php echo $getData['id']?></td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td><?php echo $getData['name']?></td>
                    </tr>
                    <tr>
                        <td>city</td>
                        <td><?php echo $getData['city']?></td>
                    </tr>
                    <tr>
                        <td>zip code</td>
                        <td><?php echo $getData['zip']?></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><?php echo $getData['email']?></td>
                    </tr>
                    <tr>
                        <td>address</td>
                        <td><?php echo $getData['address']?></td>
                    </tr>
                    <tr>
                        <td>country</td>
                        <td><?php echo $getData['country']?></td>
                    </tr>
                    <tr>
                        <td>phone</td>
                        <td><?php echo $getData['phone']?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="edit_profile.php">edit</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php require_once ("inc/footer.php"); ?>