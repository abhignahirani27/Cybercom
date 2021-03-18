<?php //require_once "header.php";
$customerGroup = $this->getCustomerGroup();
$option = $customerGroup->getStatusOption();
?>

<div class="container">
    <h2 style="text-align:center ;">Customer Group Add/Update Form</h2>

        <form method="post" action="<?php echo $this->getUrl('save') ?>">

        <div class="row">
            <div class="col-lg-6">

                <label for="name" class="font-weight-bold">Name</label><br>
                <input type="text" class="form-control"  name="customerGroup[name]" value="<?php echo $customerGroup->name;  ?>">
    
            </div>

            <div class="col-lg-6">
                
            <label for="status" class="font-weight-bold">Status</label><br>
                <select name="customerGroup[status]">
                <?php foreach($option as $key=>$value){ ?>
                    <option value="<?php echo $key; ?>" <?php if($customerGroup->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php } ?>
                </select><br><br>
                <button type="submit" class="btn btn-primary" value="submit">Submit</button>

            </div>
        </div>

        </form>
        <div class="footer">
            <p>I am Queen!!!!</p>
        </div> 

</div>
