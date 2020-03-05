Simple Shopping Cart with discount and shipping costs written in PHP.

This code has been tested with Apache/2.4.41 (Win64) PHP/7.4.3
Install the files in you Apache DocumentRoot (defined in your Apache/conf/httpd.conf file)

There are 5 main files:
index.php displays the product catalogue, with special offers, and includes methods to add to the cart:
addtocart.php.
cart.php diplays item in the count and applies discounts and shipping costs and includes method to remove items from the cart:
delcart.php
shipping.php displays configured delivery rules and charges.

Catalogue, discount and shipping information is defined in data/inventory.php
Functions to calculate discounts and shipping in functions/functions.php
Navigation in templates/nav.php
