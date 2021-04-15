<!-- <a class="btn btn-primary " href="">Product Info</a><br><br>
<a class="btn btn-primary " href="">CategoryGrid</a><br><br>
<a class="btn btn-primary " href="">Media</a><br><br> -->
<div id='left'>
<?php
$children = $this->getChildren();

foreach ($children as $child) {
    echo $child->toHtml();
}

?> 
</div>
