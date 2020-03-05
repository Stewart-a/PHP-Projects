<div class="row">
    <h3>Shipping Costs</h3>
</div>
<?php foreach ($shippingCodes as $code => $codeDetails) { ?>
          <div class="row">
              <div class="caption">
                    <h4><?php echo $shippingCodes[$code]['shipping_description']?></h3>
              </div>
         </div>
<?php } ?>
