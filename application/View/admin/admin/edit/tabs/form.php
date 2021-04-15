<?php
$admin = $this->getTableRow();
$option = $admin->getStatusOption();
?>

<div class="container">
    <h2 style="text-align:center ;">Admin Add/Update Form</h2>

        <form method="post" action="<?php echo $this->getUrl('save') ?>">
  
        <div class="row">
            <div class="col-lg-6">

                <label for="name" class="font-weight-bold">Name</label><br>
                <input type="text" class="form-control"  name="admin[name]" value="<?php echo $admin->name; ?>">


                <label for="password" class="font-weight-bold">Password</label><br>
                <input type="password" class="form-control"  name="admin[password]" value="<?php echo $admin->password;  ?>">
    
            </div>

            <div class="col-lg-6">

                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="admin[status]">
                <?php foreach($option as $key=>$value){ ?>
                    <option value="<?php echo $key; ?>" <?php if($admin->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php } ?>
                </select><br><br>
                <button type="button" class="btn btn-primary" value="submit" onclick="object.setForm(this).load()">Submit</button>


            </div>
        </div>

        </form>

</div>
