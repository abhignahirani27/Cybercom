<?php $attributes = $this->getAttribute(); ?>
<div class="container">
    <h3 style="text-align:center ;">Attributes</h3>
    <a class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl('attributeUpdate',null,null,true); ?>').load()">Add New Attribute</a><br><br>
    <table border="3px" cellpadding="10px" align="center" width="70%" style="border-collapse:collapse">
        <tr>
            <th>Attribute Id</th>
            <th>Entity Type Id</th>
            <th>Name</th>
            <th>Code</th>
            <th>BackEnd Type</th>
            <th>Input Type</th>
            <th>Sort Order</th>
            <th>BackEnd Model</th>
            <th colspan='2'>Action</th>
        </tr>
        <?php if (!$attributes) : ?>
            <tr>
                <td colspan="9">No Record Found</td>
            </tr>
        <?php else : ?>
        <?php foreach ($attributes->getData() as $attribute) : ?>
                <tr>
                    <td><?php echo $attribute->attributeId; ?></td>
                    <td><?php echo $attribute->entityTypeId; ?></td>
                    <td><?php echo $attribute->name; ?></td>
                    <td><?php echo $attribute->code; ?></td>
                    <td><?php echo $attribute->backendType; ?></td>
                    <td><?php echo $attribute->inputType; ?></td>
                    <td><?php echo $attribute->sortOrder; ?></td>
                    <td><?php echo $attribute->backendModel; ?></td>
                    <td><a onclick="object.setUrl('<?php echo $this->getUrl('attributeUpdate', NULL, ['id' => $attribute->attributeId]); ?>').load()" class="btn btn-success" style="margin: 7px">Update</a></td>
                    <td><a onclick="object.setUrl('<?php echo $this->getUrl('attributeDelete', NULL, ['id' => $attribute->attributeId]); ?>').load()" class="btn btn-danger" style="margin: 7px">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>
</body>