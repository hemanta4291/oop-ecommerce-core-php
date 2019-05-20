<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>


<?php

$branCl = new brand();

if(($_SERVER["REQUEST_METHOD"]) == "POST"){
    $brandName = $_POST["brandName"];
    $brandCheck = $branCl->brandAdd($brandName);

}

?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Category</h2>

            <?php

            if(isset($brandCheck)){
                echo $brandCheck;
            }

            ?>

            <div class="block copyblock">
                <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Enter Category Name..." class="Name" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php';?>