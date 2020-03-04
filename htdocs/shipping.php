<h3>Shipping Costs</h3>
<?php foreach ($shippingCodes as $code => $codeDetails) { ?>
          <div class="row">
	      <div class="caption">            
                    <h3><?php echo $shippingCodes[$code]['shipping_description']?></h3>
	      </div>
	 </div>
<?php } ?> 
