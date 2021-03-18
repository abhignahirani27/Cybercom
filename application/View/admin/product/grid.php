<?php $row = $this->getProducts(); ?>

<div class="container">
    <br><br><br>
    <div id="main-content">
        <h2 style="text-align: center;">Records</h2>
        <a href="<?php echo $this-> getUrl('productUpdate') ?>" class="btn btn-info" role="button">Add Records</a><br><br>


        <div class="table_data">
            <table  border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
                <thead>
                    <th>Id</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th>UpdatedDate</th>
                    <th colspan="3">Action</th>
                </thead>
                
                <tbody id="data-table" align="center">
                <?php if(!$row): ?>
                    <tr>
                        <td colspan="11">No Data Found!!!</td>
                    </tr>
                <?php else : ?> 
                <?php foreach ($row->getData() as $value) { ?>
                    <tr>

                        <td><?php echo $value->productId; ?></td>
                        <td><?php echo $value->sku;?></td>
                        <td><?php echo $value->name; ?></td>
                        <td><?php echo $value->price; ?></td>
                        <td><?php echo $value->discount; ?></td>
                        <td><?php echo $value->quantity; ?></td>
                        <td><?php echo $value->description; ?></td>
                        <td><?php echo $value->status; ?></td>
                        <td><?php echo $value->createdDate; ?></td>
                        <td><?php echo $value->updatedDate; ?></td>
                        <td><a href='<?php echo $this->getUrl('productUpdate', null, ['id' => $value->productId]) ?>' class="btn btn-Success" role="button">Update</a></td>       
                        <td><a href='<?php echo $this->getUrl('productDelete', null, ['id' => $value->productId]) ?>' class="btn btn-danger" role="button">Delete</a></td>
                        <td><a href='<?php echo $this->getUrl('index','product_groupPrice', ['id' => $value->productId]) ?>' class="btn btn-info btn-sm">Group Price</a></td>

                    </tr>
                <?php } endif; ?>

                </tbody>
            </table>

        </div>
        
    </div>

        <!-- <div class="footer">
            <p>I am Queen!!!!</p>
        </div>  -->
</div>
