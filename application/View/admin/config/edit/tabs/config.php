<?php $config_group = $this->getConfig_group(); ?>

<form action="<?php echo $this->getUrl('update','Admin\Config\Group\Config'); ?>" method="POST">
    <input type="submit" name="update" value="Update" class = "btn btn-info mr-2">
    <input type="button" name="addOption" value="Add Option" class = "btn btn-info" onclick="addRow();"><br><br>
    <table id='existingOption'>
            <?php if (!$config_group->getConfigs()) : ?>
                <tr>
                    <td colspan="3">
                        <center>No records in Database.</center>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($config_group->getConfigs()->getData() as $key => $config) : ?>
                    <tr>
                        <td><input type="text" name="exist[<?php echo $config->configId; ?>][title]" value="<?php echo $config->title ?>"></td>
                        <td><input type="text" name="exist[<?php echo $config->configId; ?>][code]" value="<?php echo $config->code ?>"></td>
                        <td><input type="text" name="exist[<?php echo $config->configId; ?>][value]" value="<?php echo $config->value ?>"></td>
                        <td><input type="button" name="removeOption" value="Remove Option"  onclick="removeRow(this);"></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
    </table>
</form>
<div style="display:none">
    <table id='newOption'>
        <tbody>
            <tr>
                <td><input type="text" name="new[title][]"></td>
                <td><input type="text" name="new[code][]"></td>
                <td><input type="text" name="new[value][]"></td>
                <td><input type="submit" name="new[removeOption][]" value="Remove Option" onclick="removeRow(this)"></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function addRow() {
        var newOptionTable = document.getElementById('newOption');
        var existingOptionTable = document.getElementById('existingOption').children[0];
        existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));
    }

    function removeRow(button) {
        var objTr = button.parentElement.parentElement;
        objTr.remove();
    }
</script>