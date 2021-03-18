<?php //require_once "header.php"; 
?>

<div class="container">

    <!-- <h2 style="text-align:center ;">Product Add/Update Form</h2> -->

        
           <?php echo $this->getTabContent(); ?>

           
        <!-- <div class="row">  -->
            <?php /*<div class="col-lg-6">
            
                <label for="sku" class="font-weight-bold">SKU</label><br>
                <input type="text" class="form-control"  name="product[sku]" value="<?php echo $product->sku; ?>">

                <label for="name" class="font-weight-bold">Name</label><br>
                <input type="text" class="form-control"  name="product[name]" value="<?php echo $product->name; ?>">
    
                <label for="price" class="font-weight-bold">Price</label><br>
                <input type="text" class="form-control"  name="product[price]" value="<?php echo $product->price ; ?>">

                <label for="description" class="font-weight-bold">Description</label><br> 
                <textarea class="form-control" id="description" name="product[description]" rows="3"
                    value="<?php echo $product->description; ?>"><?php echo $product->description; ?></textarea>
            </div>

            <div class="col-lg-6">
                <label for="discount" class="font-weight-bold">Discount</label><br>
                <input type="text" class="form-control"  name="product[discount]"
                    value="<?php echo $product->discount; ?>">

                <label for="Quantity" class="font-weight-bold">Quantity</label> <br>
                <input type="text" class="form-control" name="product[quantity]"
                    value="<?php echo $product->quantity ; ?>">
    
                <label for="status" class="font-weight-bold">Status</label> <br>
                <select class="form-control" name="product[status]">
                    <?php
                    $select = ['enable' => "Enable", 'disable' => "Disable"];
                    foreach ($select as $key => $value) {
                        if ($key === $row[0]['status']) {
                    ?>
                    <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                    <?php
                        } else {
                        ?>
                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                    <?php
                        }
                    }
                    ?>
                </select><br><br>
                <button type="submit" class="btn btn-primary" value="submit">Submit</button>


            </div>
        </div>

        </form>
        <!-- <div class="footer">
            <p>I am Queen!!!!</p> 
        </div>  -->

</div>
*/ ?>