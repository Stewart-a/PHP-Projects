<?php
// Functions to calculate discounts and shipping
function applyDiscount($cartitems) {
    global $productCodes;
    global $productDiscountCodes;
    foreach ($cartitems as $key => $code) {
        if ($productCodes[$code]['product_discount_code']) {
            $discount_code = $productCodes[$code]['product_discount_code'];
            if ($productDiscountCodes[$discount_code]) {
                if (isset($productCodes[$code]['product_quantity']) & $productCodes[$code]['product_quantity'] > 0) {
			$productCodes[$code]['product_quantity']++;
                }else{
		        $productCodes[$code]['product_quantity'] = 1;		
                        $productCodes[$code]['product_discount_val'] = 0;
                }
                switch ($discount_code) {
                    case 'MULT01':
                        // Multiple of 2 items applies discount and resets counter for further discount
                        if (floor($productCodes[$code]['product_quantity']/2) == 1) {
                            // Round discount up for half cents
                            $productDiscountCodes[$discount_code]['discount_val'] = $productDiscountCodes[$discount_code]['discount_val'] + round($productCodes[$code]['product_price']/2, 2, PHP_ROUND_HALF_UP);
                            $productCodes[$code]['product_quantity'] = 0; 
                        }
                        break;
                         
                        
                }
            }
        }
    }
     
     
}
function calculateShipping($total) {
    global $shippingCodes;
    if ($total > $shippingCodes['SHIP01']['shipping_threshold']) {
        $shipping = $shippingCodes['SHIP01']['shipping_price'];    
    } elseif ($total > $shippingCodes['SHIP02']['shipping_threshold']) {
        $shipping = $shippingCodes['SHIP02']['shipping_price'];    
    } elseif ($total == 0) {
        $shipping = 0.0;    
    } else {
        $shipping = $shippingCodes['SHIPDEF']['shipping_price'];    
    }
    return $shipping;
}
?>
