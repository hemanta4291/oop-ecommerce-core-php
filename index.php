
<?php require_once ("inc/header.php"); ?>
<?php require_once "inc/header_bottom.php"?>



<?php echo $hkr = session::get('userId'); ?>


 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

              <?php
                $featurePd = $pd->featurepro();
                if($featurePd){
                    while($getData = $featurePd->fetch_assoc()){ ?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <a href="product_details.php?proId=<?php echo $getData['proId']?>"><img src="admin/upload/<?php echo $getData['proImage']?>" alt="" /></a>
                            <h2><?php echo $getData['proName']?> </h2>
                            <p><?php echo $fm->shortdata($getData['proDetails'])?></p>
                            <p><span class="price"><?php echo $getData['proPrice']?></span></p>
                            <div class="button"><span><a href="product_details.php?proId=<?php echo $getData['proId']?>" class="details">Details</a></span></div>
                        </div>
                    <?php } } ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">

                <?php
                $featurePd = $pd->newfeaturepro();
                if($featurePd){
                    while($getData = $featurePd->fetch_assoc()){ ?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <a href="product_details.php?proId=<?php echo $getData['proId']?>"><img src="admin/upload/<?php echo $getData['proImage']?>" alt="" /></a>
                            <h2><?php echo $getData['proName']?> </h2>
                            <p><?php echo $fm->shortdata($getData['proDetails'])?></p>
                            <p><span class="price"><?php echo $getData['proPrice']?></span></p>
                            <div class="button"><span><a href="product_details.php?proId=<?php echo $getData['proId']?>" class="details">Details</a></span></div>
                        </div>

                    <?php } } ?>
			</div>
    </div>
 </div>
<?php require_once ("inc/footer.php"); ?>