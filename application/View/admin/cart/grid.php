<?php $cartItems = $this->getCart()->getItems(); ?>

<div class="container">
   <br><br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Records</h2>
       
       <div class="table_data">
       <form method="POST" action="<?php echo $this-> getUrl('update') ?>">
            <a href="<?php echo $this-> getUrl('grid','Admin\product') ?>" class="btn btn-info" role="button">Back to Items</a>
            <input type = "submit" value="Update Cart" class="btn btn-info"><br><br>

           <table  border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
               <thead>
                   <th>Cart Item Id</th>
                   <th>Product Id</th>
                   <th>Quantity</th>
                   <th>Price</th>
                   <th>Row Total</th>
                   <th>Discount</th>
                   <th>Final Total</th>
                   <th>Action</th>
               </thead>
               
               <tbody align="center">
               <?php if(!$cartItems): ?>
                    <tr>
                        <td colspan="8">No Data Found!!!</td>
                    </tr>
                <?php else : ?> 
                <?php
                    foreach ($cartItems->getData() as $key => $item) {
                ?>
                   <tr>

                       <td><?php echo $item->cartItemId; ?></td>
                       <td><?php echo $item->productId; ?></td>
                       <td><input type = "number" name="quantity[<?php echo $item->cartItemId ?>]" value = <?php echo $item->quantity ?> ></td>
                       <td><?php echo $item->price; ?></td>
                       <td><?php echo $item->price * $item->quantity; ?></td>
                       <td><?php echo $item->discount * $item->quantity; ?></td>
                       <td><?php echo ($item->quantity * $item->price - $item->discount * $item->quantity); ?></td>
                       <td><a href='<?php echo $this->getUrl('delete', 'admin\cart', ['id' => $item->cartItemId]) ?>' class="btn btn-Danger" role="button">Delete</a></td>       
                   </tr>
               <?php } endif;?>
               </tbody>
           </table>
        </form>
       </div>
   </div>

       <!-- <div class="footer">
           <p>I am Queen!!!!</p>
       </div>  -->
</div>
