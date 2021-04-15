<nav class="navbar navbar-expand-sm bg-secondary sticky-top">
        <ul class="navbar-nav font-weight-bold" >
            <li class="nav-item" style="width: 5rem;" >
            <li><h3>Application<h3></li>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\dashboard',null,true); ?>').load()">Dashboard</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\product',null,true); ?>').load()">Product</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;"  onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\category',null,true); ?>').load()">Category</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;"  onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\customer',null,true); ?>').load()">Customer</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;"  onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\customergroup',null,true); ?>').load()">Customer Group</a>
            </li>
</ul>
<ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;"  onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\shipping',null,true); ?>').load()">Shipping Method</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\payment',null,true); ?>').load()">Payment Method</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\attribute',null,true); ?>').load()">Attribute</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\brand',null,true); ?>').load()">Brand</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\cmspage',null,true); ?>').load()">CMS</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" style="width: 6rem;" onclick="object.setUrl('<?php echo $this->getUrl('grid','Admin\admin',null,true); ?>').load()">Admin</a>
            </li>
        </ul>
    </nav>