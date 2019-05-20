<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>

<?php


$productClass = new Product();


?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>Category</th>
					<th>brand</th>
					<th>details</th>
					<th>price</th>
					<th>image</th>
					<th>type</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>


                <?php

                    $get_details = $productClass->productShow();

                    if($get_details){

                        while($get_data = $get_details->fetch_assoc()){ ?>

                            <tr class="odd gradeX">
                                <td><?php echo $get_data['proId']; ?></td>
                                <td><?php echo $get_data['proName']; ?></td>
                                <td><?php echo $get_data['name']; ?></td>
                                <td class="center"><?php echo $get_data['brandName']; ?></td>
                                <td class="center"> <?php echo $get_data['proDetails']; ?></td>
                                <td class="center"> <?php echo $get_data['proPrice']; ?></td>
                                <td class="center"> <?php

                                    if($get_data['type'] == 1){
                                        echo "Featured";
                                    }else{
                                        echo "No Featured";
                                    }


                                    ?></td>
                                <td class="center"><img src="upload/<?php echo $get_data['proImage']; ?>" alt=""></td>
                                <td><a href="">Edit</a> || <a href="">Delete</a></td>
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
