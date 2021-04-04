<?php
$collection = $this->getCollection();
$actions = $this->getActions();
$buttons = $this->getButtons();
$columns = $this->getColumns();
//$filter = $this->getFilterValue();
?>
<form method="POST" action="<?php echo $this->getUrl('filter') ?>">
<div class="container">
    <br><br><br>
    <div id="main-content">
        <h2 style="text-align: center;"><?= $this->getTitle() ?></h2>
        <?php if($buttons): ?>
            <?php foreach ($buttons as $key => $button): ?>
                <a class="btn btn-primary" href="<?php echo $this->getButtonUrl($button['method']); ?>"><?= $button['label']?></a>
            <?php endforeach; ?>
        <?php endif; ?>
        <input type="submit" value="Apply Filter"><br><br>
        <div class="table_data">
            <table  border="3px" cellpadding="10px" align="center" width="90%" class="table table-striped" style="border-collapse:collapse">
                <thead>
                    <tr>
                        <?php if($columns): ?>
                            <?php foreach ($columns as $key => $column): ?>
                                <th><?= $column['label'] ?></th>
                            <?php endforeach; ?>
                            <th colspan="2">Action</th>
                        <?php endif; ?>
                    </tr>
                    <!-- <th>Id</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th>UpdatedDate</th>
                    <th colspan="2">Action</th> -->
                </thead>
                
                <tbody align="center">
                    <tr>
                        <?php if($columns): ?>
                            <?php foreach($columns as $key => $column): ?>
                                <td>
                                    <input type="text" size= "8" name="filter[<?php echo $column['type'];?>][<?php echo $column['field'];?>]" value="<?= $this->getFilter()->getFilterValue($column['type'],$column['field']); ?>">
                                </td>
                            <?php endforeach; ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <?php if(!$collection): ?>
                        <tr>
                            <td scope="row">No Data Found!!!</td>
                        </tr>
                    <?php else : ?> 
                    <?php foreach ($collection->getData() as $value) { ?>
                        <tr>
                        <?php if($columns): ?>
                            <?php foreach ($columns as $key => $column): ?>
                                <td><?= $this->getFieldValue($value, $column['field']) ?></td>
                            <?php endforeach; ?>
                        <?php endif; ?>
                            <td>
                                <?php if($actions): ?>
                                    <?php foreach ($actions as $key => $action): ?>
                                        <?php if($action['ajax']):?>
                                            <a href="javascript:void(0)" onclick="<?=$this->getMethodUrl($value,$action['method']);?>" class="btn btn-success" style="margin: 7px"><?=$action['label']?></a>
                                        <?php else: ?>
                                            <a href="<?php echo $this->getMethodUrl($value,$action['method'])?>" class="btn btn-success" style="margin: 7px"><?= $action['label']?></a>
                                        <?php endif;?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php /*<tr>

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

                        </tr>*/ ?>
                    <?php } endif; ?>

                </tbody>
            </table>

        <?php \Mage::getModel('Model\Admin\Filter')->clearFilters(); ?>
        </div>
        
    </div>
        <!-- <div class="footer">
            <p>I am Queen!!!!</p>
        </div>  -->
</div>
</form>