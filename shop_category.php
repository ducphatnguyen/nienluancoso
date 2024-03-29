
<?php
	include('inc/header.php');
?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_POST['orderby']) == '1') {
		$sortbynewness = $product->sortbynewness();      
	}
    else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_POST['orderby']) == '2') {
		$sortlowtohigh = $product->sortlowtohigh();      
	}
    else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_POST['orderby']) == '3') {
		$sorthightolow = $product->sorthightolow();   
	}
?>
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div>
                <div style="margin-bottom: 55px"></div>
                <div class="dropdown">
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Danh mục bánh
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                            $getall_categories = $cat->show_category_frontend();
                            if($getall_categories) {
                                while($result_allcats = $getall_categories->fetch_assoc()){
                        ?>
                        <li><a class="dropdown-item" href="shop_category.php?catid=<?php echo $result_allcats['catId'] ?>"><?php echo $result_allcats['catName'] ?></a></li>
                        <?php
                                }
                            }
                        ?>  
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-12">
            <div>
                <h1 class="text-center">SHOP</h1>
            </div>
            <div class="row">
                <?php
                if(isset($_GET['catid']) && $_GET['catid']!=NULL) {
                    $id = $_GET['catid'];
                    $productbycate = $product->getproductbycatId($id);
                    if($productbycate) {
                        while($result = $productbycate->fetch_assoc()) {
                ?>
                <div class="col-4 mb-5">
                    <div class="card shadow-lg" style="width: 16rem;">
                        <a href="product-details.php?proid=<?php echo $result['productId']; ?>"><img style="width: 254px;height: 130px;" class="img-fluid" src="admin/uploads/<?php echo $result['image']; ?>" ></a>
                        <div class="card-body">
                            <h3><a class="text-decoration-none text-warning" href="#"><?php echo $result['productName']; ?></a></h3>
                            <span class="current_price"><?php echo $fm->format_currency($result['price']). " "."VND"; ?></span>
                            <?php
                                if($result['type'] == '1') {
                            ?>
                            <span class="text-decoration-line-through"><?php echo $fm->format_currency($result['price']+$result['price']*0.07). " "."VND"; ?></span>
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
            
            <div class="pagination">
                <?php   
                    $product_all = $product->getproductbycatId_pagination($id);
                    if($product_all) {
                        $product_count = mysqli_num_rows($product_all);
                        $product_button = ceil($product_count/9);
                        $i = 1;
                        for($i=1;$i<=$product_button;$i++){
                            echo '<a class="btn btn-secondary mx-2" href="shop_category.php?trang='.$i.'">'.$i.'</a>' ;
                        }
                    }   
                ?>
            </div>

            <?php
            }else {   
                $product_new = $product->getproduct_pagination();
                if($product_new) {
                    while($result_new = $product_new->fetch_assoc()) {
            ?>
            <div class="col-4 mb-5">
                <div class="card shadow-lg" style="width: 16rem;">
                <a href="product-details.php?proid=<?php echo $result_new['productId']; ?>"><img style="width: 254px;height: 130px;" class="img-fluid" src="admin/uploads/<?php echo $result_new['image']; ?>" ></a>
                    <div class="card-body">
                        <h3><a class="text-decoration-none text-warning" href="#"><?php echo $result_new['productName']; ?></a></h3>
                        <span class="current_price"><?php echo $fm->format_currency($result_new['price']). " "."VND"; ?></span>
                        <?php
                            if($result_new['type'] == '1') {
                        ?>
                        <span class="text-decoration-line-through"><?php echo $fm->format_currency($result_new['price']+$result_new['price']*0.07). " "."VND"; ?></span>
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
            <div>
                <div class="pagination mb-5">
                <?php
                    $product_all = $product->get_all_product_shop();
                    if($product_all) {
                        $product_count = mysqli_num_rows($product_all);
                        $product_button = ceil($product_count/9);
                        $i = 1;
                        for($i=1;$i<=$product_button;$i++){
                            echo '<a class="btn btn-secondary mx-2" href="shop_category.php?trang='.$i.'">'.$i.'</a>' ;
                        }
                    }
                ?>
                </div>
            </div>
            <?php
            }
            ?>                                                        
        </div>
    </div>
<?php
	include('inc/footer.php');
?>








