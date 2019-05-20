<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>


<?php

    $catAdd = new categoryadd();

    if(($_SERVER["REQUEST_METHOD"]) == "POST"){
    $catName = $_POST["catName"];
    $catCheck = $catAdd->categoryAdd($catName);

}

?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>

                <?php

                    if(isset($catCheck)){
                        echo $catCheck;
                    }

                ?>

               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter Category Name..." class="Name" />
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