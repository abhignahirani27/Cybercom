<?php //require_once "header.php"; ?>

<div class="container">
    <h2 style="text-align:center ;">Payment Add/Update Form</h2>

        <form method="post" action="<?php echo $this->getUrl('save') ?>">
        <?php echo $this->getTabContent(); ?>

        <?php /*   
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
                
                <label for="status" class="font-weight-bold">Status</label> <br>
                <select class="form-control" name="payment[status]">
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
                </select><br>
                <button type="submit" class="btn btn-primary" value="submit">Submit</button>


            </div>
        </div>

        </form>
        <div class="footer">
            <p>I am Queen!!!!</p>
        </div> 

</div>*/
?>