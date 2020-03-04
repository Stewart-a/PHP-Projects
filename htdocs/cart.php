<?php 
// This is where items added to cart are processed, discounts/shipping applied and total price displayed
session_start();
include('data/inventory.php'); 
include('templates/header.php'); 
include('templates/nav.php');
include('functions/functions.php'); // Include helper functions to process discounts and shipping deals
$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
?>
<div class="container">
	<div class="row">
	  <table class="table">
	  	<tr>
	  	<th>Item Code</th>
	  	<th>Item Name</th>
	  	<th>Price</th>
	  	</tr>
                <?php
          	$total = 0;
                $discounts = 0;
                $shipping = 0;
                $i=1;
                foreach ($cartitems as $key => $code) {
                    if (!$productCodes[$code]['product_name']) {
                        continue;
                    } 
                ?>	  	
                	<tr>
        		<td><?php echo $code; ?></td>
                        <td><?php echo $productCodes[$code]['product_name']; ?></td>             
        		
        		<td>$<?php echo $productCodes[$code]['product_price']; ?></td>
                        <td><a href="delcart.php?remove=<?php echo $key; ?>">Remove</a> </td>
        	        </tr>
                <?php 
        	        $total = $total + $productCodes[$code]['product_price'];
        	        $i++; 
        	} 
                ?>
	  	<tr>
                <td>Sub Total</td>
                <td></td>
	  	<td>$<?php printf("%.2f",$total)?></td>
	  	</tr>

		<tr>
		<td><strong>Discounts</strong></td>
		</tr>

                <?php
                // Apply discounts on specific products using applyDiscount from functions.php
                applyDiscount($cartitems);

                foreach (array_keys($productDiscountCodes) as $code) {
                     if (isset($productDiscountCodes[$code]['discount_val'])) {
                        $discounts = $discounts + $productDiscountCodes[$code]['discount_val'];

                        ?><tr>
                          <td><?php echo $code; echo $val ?></td>
                          <td>-$<?php printf("%.2f",$productDiscountCodes[$code]['discount_val']) ?></td> 
                          <td><?php echo $productDiscountCodes[$code]['discount_description'] ?></td> 
                        </tr>
                        <?php
                    }
                }
                ?>
		<tr>
		<td><strong>Total Discounts</strong></td>
		<td><strong>-$<?php printf("%.2f",$discounts) ?></strong></td>
		</tr>

                <?php
                // Apply shipping cost on total (after discounts) using calculateShipping from functions.php
                $total = $total - $discounts;
                $shipping = calculateShipping($total);
                $total = $total + $shipping;
                ?>
		<tr>
		<td><strong>Shipping</strong></td>
		<td><strong>$<?php printf("%.2f",$shipping) ?></strong></td>
		</tr>

		<tr>
		<td><strong>Total Price</strong></td>
		<td><strong>$<?php printf("%.2f",$total) ?></strong></td>
		<td><a href="#" class="btn btn-info">Checkout</a></td>
		</tr>
	  </table>
	</div>
</div>
<?php include('templates/footer.php'); ?>


