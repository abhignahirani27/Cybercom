<?php
$address = $this->getAddress();
$billing = [];
$shipping = [];
if($address){
    foreach($address as $key=>$value){
        if($value['addressType'] == 'billing'){
            $billing = $value;
        }else if($value['addressType'] == 'shipping'){
            $shipping = $value;
        }
    }
}
?>
<h3 style="text-align:center">Address Form</h3>
<div class="container border mt-3" style="padding:0px 90px; width:100%">
<form action="<?php echo $this->getUrl('addressSave',NULL,['id'=>$this->getRequest()->getGet('id')],true); ?>" method="POST">

<div class="row">
<div class="col-lg-6">
    <h4>Billing Address</h4>
    <label for="address" class="font-weight-bold">ADDRESS</label><br>
    <input type="text" name="address" class="form-control" value="<?php 
            if(array_key_exists('address',$billing)){
                echo $billing['address'];
            };
        ?>"><br><br>

    <label for="city" class="font-weight-bold">CITY</label><br>
    <input type="text" name="city" class="form-control" value="<?php 
            if(array_key_exists('city',$billing)){
                echo $billing['city'];
            };
        ?>"><br><br>

    <label for="state" class="font-weight-bold">STATE</label><br>
    <input type="text" name="state" class="form-control" value="<?php 
            if(array_key_exists('state',$billing)){
                echo $billing['state'];
            };
        ?>"><br><br>

    <label for="zipcode" class="font-weight-bold">ZIPCODE</label><br>
    <input type="text" name="zipcode" class="form-control" value="<?php 
            if(array_key_exists('zipcode',$billing)){
                echo $billing['zipcode'];
            };
        ?>"><br><br>
        
    <label for="country" class="font-weight-bold">COUNTRY</label><br>
    <input type="text" name="country" class="form-control" value="<?php 
            if(array_key_exists('country',$billing)){
                echo $billing['country'];
            };
        ?>"><br><br>
</div>   

<div class="col-lg-6">
    <h4>Shipping Address</h4>
    <label for="address" class="font-weight-bold">ADDRESS</label><br>
    <input type="text" name="shippingaddress" class="form-control" value="<?php 
            if(array_key_exists('address',$shipping)){
                echo $shipping['address'];
            };
        ?>"><br><br>

    <label for="city" class="font-weight-bold">CITY</label><br>
    <input type="text" name="shippingcity" class="form-control" value="<?php 
            if(array_key_exists('city',$shipping)){
                echo $shipping['city'];
            };
        ?>"><br><br>

    <label for="state" class="font-weight-bold">STATE</label><br>
    <input type="text" name="shippingstate" class="form-control" value="<?php 
            if(array_key_exists('state',$shipping)){
                echo $shipping['state'];
            };
        ?>"><br><br>

    <label for="zipcode" class="font-weight-bold">ZIPCODE</label><br>
    <input type="text" name="shippingzipcode" class="form-control" value="<?php 
            if(array_key_exists('zipcode',$shipping)){
                echo $shipping['zipcode'];
            };
        ?>"><br><br>

    <label for="country" class="font-weight-bold">COUNTRY</label><br>
    <input type="text" name="shippingcountry" class="form-control" value="<?php 
            if(array_key_exists('country',$shipping)){
                echo $shipping['country'];
            };
        ?>"><br><br>    
    <input type="button" value="Save" class="btn btn-primary" onclick="object.setForm(this).load()">
    <input type="reset" value="Reset" class="btn btn-primary">
</div>
</div>
</form>
</div>
