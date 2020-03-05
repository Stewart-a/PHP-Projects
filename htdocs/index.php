<?php
// This is the landing page. Displays products from the catalogue. 
// To update catalogue, change product prices, special offers and shipping costs edit the data/inventory.php file
session_start();
include('data/inventory.php'); //include data arrays for catalogue, discounts and shipping. 
include('templates/header.php');
include('templates/nav.php');
?>

<div class="container">
<?php foreach ($productCodes as $code => $itemDetails) { ?>
          <div class="row">
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="images/<?php echo $code?>.png" alt="image title">
	      <div class="caption">          
                    <h3><?php echo $itemDetails['product_name']?></h3>
	            <p><?php echo $itemDetails['product_description']?></p>
  	            <p>$<?php echo $itemDetails['product_price']?></p>
                    <?php if ($itemDetails['product_discount_code'] ) {?>
  	                <p><strong>*Special Offer - <?php echo $productDiscountCodes[$itemDetails['product_discount_code']]['discount_description']?>*</strong></p>
                    <?php } ?>
	            <p><a href="addtocart.php?code=<?php echo $code?>" class="btn btn-primary" role="button">Add to Cart</a></p>
	      </div>
	    </div>
	  </div>
	</div>
<?php } ?> 
<?php include('shipping.php'); ?>
</div>
 

<?php include('templates/footer.php'); ?>
