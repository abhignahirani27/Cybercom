<?php
$product = $this->getProduct();
$option = $product->getStatusOption();
?>

<h2 style="text-align:center ;">Product Add/Update Form</h2>
<form method="post" action="<?php echo $this->getUrl('save'); ?>">
<div class="row">
    <div class="col-lg-6">
            
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

                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="product[status]">
                <?php foreach($option as $key=>$value){ ?>
                    <option value="<?php echo $key; ?>" <?php if($product->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php } ?>
                </select><br><br>
            <button type="submit" class="btn btn-primary" value="submit">Submit</button>


        </div>
    </div>
</form>
