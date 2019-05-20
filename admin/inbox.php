<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php

$filePath = realpath(dirname(__FILE__));
require_once ($filePath."/../classes/cart.php");
require_once ($filePath."/../helpers/formate.php");


$ct  = new Cart();
$fm  = new formate();
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>id.</th>
							<th>date</th>
							<th>name</th>
							<th>quentity</th>
							<th>price</th>
							<th>userId</th>
							<th>address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

                    <?php

                    $get_result = $ct->adminOrderData();


                    if($get_result){

                        while ($getData = $get_result->fetch_assoc()){ ?>

                            <tr class="odd gradeX">
                                <td><?php echo $getData['id'];?></td>
                                <td><?php echo $fm->formantedate($getData['date']);?></td>
                                <td><?php echo $getData['proName'];?></td>
                                <td><?php echo $getData['quentity'];?></td>
                                <td><?php echo $getData['price'];?></td>
                                <td><?php echo $getData['userId'];?></td>
                                <td><a href="customar.php?customarId=<?php echo $getData['userId']; ?>">View Details</a></td>

                                <?php

                                    if($getData['status']=='0'){?>
                                        
                                            <td><a href="?shiftedId=<?php echo $getData['id'];?>
                                            & price=<?php echo $getData['price'];?>&
                                            data=<?php echo $getData['date'];?>">shifted</a></td>

                                    <?php } else { ?>

                                        <td><a href="?shiftedId=<?php echo $getData['id'];?>
                                            & price=<?php echo $getData['price'];?>&
                                            data=<?php echo $getData['date'];?>">delete</a></td>

                                    <?php } ?>

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
