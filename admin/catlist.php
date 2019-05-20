<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>


<?php

    $cl = new categoryadd();

?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

                        <?php

                        $clData = $cl->categoryShow();
                        if ($clData) {
                            $sri = 0;
                            while($getSelectData = $clData->fetch_assoc()){

                                $sri ++;

                                ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $sri; ?></td>
                                    <td><?php echo $getSelectData['name'] ?></td>
                                    <td><a href="edit-cat.php?cat_edit_id=<?php echo $getSelectData['cat_id'] ?>">Edit</a>
                                        || <a href="delete-cat.php?cat_del_id=<?php echo $getSelectData['cat_id'] ?>">Delete</a></td>
                                </tr>

                            <?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

