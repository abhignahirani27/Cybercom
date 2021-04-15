<?php
$tabs = $this->getTabs();
foreach ($tabs as $key => $tab) {?>

<a class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl(null,null,['tab' => $key]);?>').load()" role="button"> <?php echo $tab['label']; ?></a>
<br><br>

<?php } ?>
