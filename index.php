<?php
	include('inc/header.php');
    include('inc/slider.php');
?>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                 <div>
                     <div>
                        <a href="#"><img style="width: 356px;height: 130px;" src="img/bg/banner8.jpg" alt="#"></a>
                     </div>
                 </div>
             </div>
             <div class="col-lg-4 col-md-6">
                <div>
                    <div>
                        <a href="#"><img style="width: 356px;height: 130px;" src="img/bg/banner9.jpg" alt="#"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div>
                    <div>
                        <a href="#"><img style="width: 356px;height: 130px;" src="img/bg/banner10.jpg" alt="#"></a>
                    </div>
                </div>
            </div>
         </div>

        <div class="row mt-5">   
            <div class="col-12 text-center">
               <div>
                    <h2>Sản phẩm của chúng tôi</h2>
                    <p>Các sản phẩm thiết kế hiện đại, mới nhất</p>
               </div>
            </div> 
        </div>    
        <div class="row">
            <?php
                $product_all = $product->get_all_product();
                if($product_all) {
                    while($result_all = $product_all->fetch_assoc()) {
            ?>  
            <div class="col-3 mb-5 ">
                <div class="card shadow-lg" style="width: 16rem;">
                    <a href="product-details.php?proid=<?php echo $result_all['productId']; ?>"><img style="width: 254px;height: 130px; z-index:-1;" class="img-fluid" src="admin/uploads/<?php echo $result_all['image']; ?>" alt="First place"></a>
                    <div class="card-body">
                        <h3><a class="text-decoration-none text-warning" href="#"><?php echo $result_all['productName']; ?></a></h3>
                        <span class="current_price"><?php echo $fm->format_currency($result_all['price']). " "."VND"; ?></span>
                        <?php
                            if($result_all['type'] == '1') {
                        ?>
                        <span class="text-decoration-line-through"><?php echo $fm->format_currency($result_all['price']+$result_all['price']*0.07). " "."VND"; ?></span>
                        <?php
                            }
                        ?>   
                    </div>
                </div>
            </div>
            <?php							
                }
            }
            ?>
        </div>   

        <div class="row mt-3">   
            <div class="col-12 text-center">
               <div>
                    <h2>Sản phẩm khuyến mãi</h2>
                    <p>Sản phẩm ấn tượng và bán nhiều ưu đãi nhất</p>
               </div>
            </div> 
        </div>    
        <div class="row">
            <?php
                $product_promotion = $product->getproduct_promotion();
                if($product_promotion) {
                    while($result_promotion = $product_promotion->fetch_assoc()) {
            ?>   
          
            <div class="col-3 mb-5 ">
                <div class="card shadow-lg" style="width: 16rem;">
                    <a href="product-details.php?proid=<?php echo $result_promotion['productId']; ?>"><img style="width: 254px;height: 130px;" class="img-fluid" src="admin/uploads/<?php echo $result_promotion['image']; ?>" alt="First place"></a>
                    <div class="card-body">
                        <h3><a class="text-decoration-none text-warning" href="#"><?php echo $result_promotion['productName']; ?></a></h3>
                        <span ><?php echo $fm->format_currency($result_promotion['price']). " "."VND"; ?></span>                    
                        <span class="text-decoration-line-through"><?php echo $fm->format_currency($result_promotion['price']+$result_promotion['price']*0.07). " "."VND"; ?></span>
                    </div>
                </div>
            </div>
           
            <?php
                    }
                }
            ?>
        </div>   
        

    <div class="row mt-3">   
        <div class="col-12 text-center">
            <div>
                <h2>Sản phẩm vừa mới ra mắt </h2>
                <p>Sản phẩm vừa mới được ra mắt</p>
            </div>
        </div> 
    </div>  
	<div class="row">
		<?php
			$product_new = $product->getproduct_new();
			if($product_new) {
				while($result_new = $product_new->fetch_assoc()) {
		?> 
		
		<div class="col-3 mb-5 ">
			<div class="card shadow-lg" style="width: 16rem;">
				<a href="product-details.php?proid=<?php echo $result_new['productId']; ?>"><img style="width: 254px;height: 130px;" class="img-fluid" src="admin/uploads/<?php echo $result_new['image']; ?>" alt="First place"></a>
				<div class="card-body">
                    <h3><a class="text-decoration-none text-warning" href="#"><?php echo $result_new['productName']; ?></a></h3>
                    <span ><?php echo $fm->format_currency($result_new['price']). " "."VND"; ?></span>                    
				</div>
			</div>
		</div>
		<?php
				}
			}    
		?>
	</div>  
            
<?php
	include('inc/footer.php');
?>