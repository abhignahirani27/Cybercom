<?php
$cmsPage = $this->getTableRow();
$option = $cmsPage->getStatusOption();
?>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<div class="container">
    <h2 style="text-align:center ;">CMS Add/Update Form</h2>

        <form method="post" action="<?php echo $this->getUrl('save') ?>">
  
        <div class="row">
            <div class="col-lg-6">

                <label for="title" class="font-weight-bold">Title</label><br>
                <input type="text" class="form-control"  name="cmsPage[title]" value="<?php echo $cmsPage->title; ?>">

                <label for="identifier" class="font-weight-bold">Identifier</label><br>
                <input type="text" class="form-control"  name="cmsPage[identifier]" value="<?php echo $cmsPage->identifier; ?>">

                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="cmsPage[status]">
                <?php foreach($option as $key=>$value){ ?>
                    <option value="<?php echo $key; ?>" <?php if($cmsPage->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php } ?>
                </select><br><br>
                <button type="button" class="btn btn-primary" value="submit" onclick="object.setForm(this).load()">Submit</button>
    
            </div>

            <div class="col-lg-6">

                <label for="content" class="font-weight-bold">Content</label><br>
                <textarea class="form-control"  rows="20" name="cmsPage[content]" value="<?php echo $cmsPage->content;?>"></textarea>
                <script>
                        CKEDITOR.replace( 'cmsPage[content]');
                </script>
            </div>
        </div>

        </form>
</div>

