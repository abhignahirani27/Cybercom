<?php
$brand = $this->getTableRow();
$option = $brand->getStatusOption();
?>

<h2 style="text-align:center ;">Brand Add/Update Form</h2><br><br>
<form method="post" action="<?php echo $this->getUrl('save',NULL,['id'=>$brand->brandId],true);?>" enctype="multipart/form-data">
<div class="row">
            <div class="col-lg-6">

                <label for="name" class="font-weight-bold">Name</label><br>
                <input type="text" class="form-control"  name="brand[name]" value="<?php echo $brand->name;  ?>">

                <label for="image" class="font-weight-bold">Image</label><br>
                <input type="file" name="imagefile">
            </div>

            <div class="col-lg-6">

                <label for="sortOrder" class="font-weight-bold">Sort Order</label><br>
                <input type="text" class="form-control"  name="brand[sortOrder]" value="<?php echo $brand->sortOrder;  ?>">
                
                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="brand[status]">
                <?php foreach($option as $key=>$value){ ?>
                    <option value="<?php echo $key; ?>" <?php if($brand->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php } ?>
                </select><br><br>
                <button type="submit" class="btn btn-primary" value="submit">Submit</button>


            </div>
        </div>

