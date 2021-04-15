<?php
$childrens = $this->getChildren();

foreach ($childrens as $child){
    echo $child->toHtml();

}

?> 
<!-- <div id="productGrid">

</div>
<script type="text/javascript">
    var object = new Base();
    //object.getParams();
    object.setParams({
        name: 'abhigna',
        email: 'abc@gmail'
    });
    object.setUrl('http://localhost/application/index.php?c=product&a=test3');
    object.load();
</script> -->