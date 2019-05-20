<?php require_once ("inc/header.php"); ?>

<?php
    if(!isset($_GET['proId']) && $_GET['proId'] == NULL){
        echo "not found";
    }else{
        $getId = $_GET['proId'];
    }


    if(($_SERVER["REQUEST_METHOD"]) == "POST"){
        $quenty = $_POST["quenty"];
    $addtoCart = $ct->addToCart($quenty,$getId);

}


?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
                    <?php

                        if(isset($addtoCart)){
                            echo $addtoCart;
                        }

                    ?>

                    <?php

                        $prodata = $pd->dataSelectbyId($getId);

                        if($prodata){

                            $getData = $prodata->fetch_assoc();
                        }

                    ?>
                        <div class="grid images_3_of_2">
                            <img src="admin/upload/<?php echo $getData['proImage']?>" alt="" />
                        </div>
                        <div class="desc span_3_of_2">
                            <h2><?php echo $getData['proName']?> </h2>
                            <div class="price">
                                <p>Price: <span><?php echo $getData['proPrice']?></span></p>
                                <p>Category: <span><?php echo $getData['name']?></span></p>
                                <p>Brand:<span><?php echo $getData['brandName']?></span></p>
                            </div>
                        <div class="add-cart">
                            <form action="" method="post">
                                <input type="number" class="buyfield" name="quenty" value="1"/>
                                <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
                            </form>
                            </div>
                        </div>
                        <div class="product-desc">
                        <h2>Product Details</h2>
                        <p><?php echo $getData['proDetails']?></p>
                    </div>
                </div>


				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.html">Mobile Phones</a></li>
				      <li><a href="productbycat.html">Desktop</a></li>
				      <li><a href="productbycat.html">Laptop</a></li>
				      <li><a href="productbycat.html">Accessories</a></li>
				      <li><a href="productbycat.html#">Software</a></li>
					   <li><a href="productbycat.html">Sports & Fitness</a></li>
					   <li><a href="productbycat.html">Footwear</a></li>
					   <li><a href="productbycat.html">Jewellery</a></li>
					   <li><a href="productbycat.html">Clothing</a></li>
					   <li><a href="productbycat.html">Home Decor & Kitchen</a></li>
					   <li><a href="productbycat.html">Beauty & Healthcare</a></li>
					   <li><a href="productbycat.html">Toys, Kids & Babies</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
<?php require_once ("inc/footer.php"); ?>