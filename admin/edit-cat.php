<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>


<?php


    if(!isset($_GET['cat_edit_id']) || $_GET['cat_edit_id'] == NULL){
        echo"<script> window.location='catlist.php';</script>";
    }else{
        $get_edit_id = $_GET['cat_edit_id'];
    }

$data = new categoryadd();

if(($_SERVER["REQUEST_METHOD"]) == "POST"){
    $catName = $_POST["catName"];
    $catCheck = $data->update_data_id($catName,$get_edit_id);

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

                            <?php

                                $get_data = $data->show_select_id($get_edit_id);
                                $select_data = $get_data->fetch_assoc();

                            ?>

                            <td>
                                <input type="text" name="catName" value="<?php echo $select_data['name'] ?>" class="Name" />
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