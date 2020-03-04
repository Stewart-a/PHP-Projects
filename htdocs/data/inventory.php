<?php
// Data typically loaded from database. Here it's expressed as arrays.
    $productCodes = [
        'R01' => [
            'product_name' => 'Red Widget',
	    'product_description' => 'Acme Widget Type Red',
            'product_discount_code' => 'MULT01',
            'product_price' => 32.95,
        ],
        'G01' => [
            'product_name' => 'Green Widget',
	    'product_description' => 'Acme Widget Type Green',
            'product_discount_code' => '',
            'product_price' => 24.95,
        ],
        'B01' => [
            'product_name' => 'Blue Widget',
	    'product_description' => 'Acme Widget Type Blue',
            'product_discount_code' => '',
            'product_price' => 7.95,
        ],
    ];
    $productDiscountCodes = [
        'MULT01' => [
            'discount_type' => 'multibuy',
	    'discount_description' => 'Buy one red widget get second half price',
        ],
    ];
    $shippingCodes = [
        'SHIP01' => [
            'shipping_threshold' => 90,
            'shipping_price' => 0.0,
	    'shipping_description' => 'Free on orders over $90',
        ],
        'SHIP02' => [
            'shipping_threshold' => 50,
            'shipping_price' => 2.95,
	    'shipping_description' => '$2.95 on orders over $50',
        ],
        'SHIPDEF' => [
            'shipping_threshold' => 0,
            'shipping_price' => 4.95,
	    'shipping_description' => '$4.95 Standard Shipping Cost',
        ],
    ]
?>
