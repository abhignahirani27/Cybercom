<?php
$payment = $this->getTableRow();
$option = $payment->getStatusOption();
?>

<h2 style="text-align:center ;">Payment Add/Update Form</h2><br><br>
<form method="post" action="<?php echo $this->getUrl('save'); ?>">
        <div class="row">
            <div class="col-lg-6">

                <label for="name" class="font-weight-bold">Name</label><br>
                <input type="text" class="form-control"  name="payment[name]" value="<?php echo $payment->name;  ?>">

                <label for="description" class="font-weight-bold">Description</label><br> 
                <textarea class="form-control" id="description" name="payment[description]" rows="3"
                value="<?php echo $payment->description; ?>"><?php echo $payment->description; ?></textarea>
    
            </div>

            <div class="col-lg-6">

                <label for="code" class="font-weight-bold">Code</label><br>
                <input type="text" class="form-control"  name="payment[code]" value="<?php echo $payment->code;  ?>">
                
                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="payment[status]">
                <?php foreach($option as $key=>$value){ ?>
                    <option value="<?php echo $key; ?>" <?php if($payment->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php } ?>
                </select><br><br>
                <button type="button" class="btn btn-primary" value="submit" onclick= "object.setForm(this).load()">Submit</button>

            </div>
        </div>     
</form>

