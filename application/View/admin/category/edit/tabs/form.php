<?php
$category = $this->getTableRow();
$option = $category->getStatusOption();
$categoryOptions =$this->getCategoryOptions();
?>
            <h2 style="text-align:center ;">Category Add/Update Form</h2>

            <form method="post" action="<?php echo $this->getUrl('save',NULL,['id'=>$category->categoryId],true);?>">

                <select  name="category[parentId]">
                    <?php if($categoryOptions):?>
                    <?php foreach($categoryOptions as $categoryId => $name):?> 
                        <option value="<?php echo $categoryId;?>"<?php if($categoryId==$category->parentId): ?>selected<?php endif; ?>><?php echo $name;?></option>
                    <?php endforeach;?>
                    <?php endif;?>              
                </select><br>
                
                <label for="name" class="font-weight-bold">Name</label><br>
                <input type="text" class="form-control" name="category[name]" value="<?php echo $category->name; ?>">
    
                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="category[status]">
                <?php foreach($option as $key=>$value){ ?>
                    <option value="<?php echo $key; ?>" <?php if($category->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php } ?>
                </select><br><br>

                <label for="description" class="font-weight-bold">Description</label><br>
                <textarea class="form-control" id="description" name="category[description]" rows="3"
                value="<?php echo $category->description; ?>"><?php echo $category->description; ?></textarea><br><br>
                
                <button type="submit" class="btn btn-primary" value="submit">Submit</button>

            </form>
