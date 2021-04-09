<?php
$config_group = $this->getTableRow();
?>

<h2 style="text-align:center ;">Config_Group Add/Update Form</h2><br><br>
<form method="post" action="<?php echo $this->getUrl('save'); ?>">
    <div class="row">
                <div class="col-lg-6">

                    <label for="name" class="font-weight-bold">Name</label><br>
                    <input type="text" class="form-control"  name="config_group[name]" value="<?php echo $config_group->name;  ?>"><br><br>
                    <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                </div>
    </div>
</form>

