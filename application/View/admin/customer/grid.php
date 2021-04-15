<?php 
$customers = $this->getCustomers();
?>

<h2 style="text-align: center;">Records</h2>
<a onclick="object.setUrl('<?php echo $this-> getUrl('customerUpdate',null,null,true); ?>').load()" class="btn btn-info" role="button">Add Records</a><br><br>
<table border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
    <?php if(!$customers): ?>
    <tr>
        <td>No Record Found</td>
    </tr>
    <?php else: ?>
    <tr>
        <th>Id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>GroupId</th>
        <th>Password</th>
        <th>Status</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zipcode</th>
        <th>Country</th>
        <th>AddressType</th>
        <th>CreatedDate</th>
        <th>UpdatedDate</th>
        <th colspan="2">Action</th>
    </tr>
    <?php foreach ($customers->getData() as $key => $value) { ?>
        <?php if($value->addressType == 'shipping'){continue;} ?>
    <tr>
        <td><?php echo $value->customerId; ?></td>
        <td><?php echo $value->firstname; ?></td>
        <td><?php echo $value->lastname; ?></td>
        <td><?php echo $value->email; ?></td>
        <td><?php echo $value->groupId; ?></td>
        <td><?php echo $value->password; ?></td>
        <td><?php echo $value->status; ?></td>
        <td><?php echo $value->address; ?></td>
        <td><?php echo $value->city; ?></td>
        <td><?php echo $value->state; ?></td>
        <td><?php echo $value->zipCode; ?></td>
        <td><?php echo $value->country; ?></td>
        <td><?php echo $value->addressType; ?></td>
        <td><?php echo $value->createdDate; ?></td>
        <td><?php echo $value->updatedDate; ?></td>
        <td colspan=2>
            <a onclick = "object.setUrl('<?php echo $this->getUrl('customerUpdate',NULL,['id'=>$value->customerId,'firstName'=>$value->firstName,'lastName'=>$value->lastName,'email'=>$value->email,'password'=>$value->password,'status'=>$value->status]); ?>').load()" class="btn btn-Success">
                Update
            </a>
            <a onclick = "object.setUrl('<?php  echo $this->getUrl('customerDelete',NULL,['id'=>$value->customerId]); ?>').load()" class="btn btn-Danger">
                Delete
            </a>
        </td>
    </tr>
    <?php } endif; ?>
</table>
