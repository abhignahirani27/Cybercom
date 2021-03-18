<?php
 //print_r($this->getCustomers());
// require_once 'header.php';
 ?>
<?php /*
<div class="container">
   <br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Records</h2>
       
       <a href="<?php echo $this->getUrl('customerUpdate'); ?>" class="btn btn-info" role="button">Add Records</a><br><br>
       <div class="table_data">
           <table  border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
               <thead>
                   <th>Id</th>
                   <th>Firstname</th>
                   <th>Lastname</th>
                   <th>Email</th>
                   <th>GroupId</th>
                   <th>Password</th>
                   <th>Status</th>
                   <th>CreatedDate</th>
                   <th>UpdatedDate</th>
                   <th colspan="2">Action</th>
                </thead>
                <tbody align="center">

                    <?php
                            $row = $this->getCustomers();
                            foreach ($row as $value) {
                    ?>

                   <tr>

                       <td><?php echo $value->customerId; ?></td>
                       <td><?php echo $value->firstname; ?></td>
                       <td><?php echo $value->lastname; ?></td>
                       <td><?php echo $value->email; ?></td>
                       <td><?php echo $value->groupId; ?></td>
                       <td><?php echo $value->password; ?></td>
                       <td><?php echo $value->status; ?></td>
                       <td><?php echo $value->createdDate; ?></td>
                       <td><?php echo $value->updatedDate; ?></td>
                       <td><a href='<?php echo $this->getUrl('customerUpdate', null, ['id' => $value->customerId]) ?>' class="btn btn-Success">Update</a></td>       
                        <td><a href='<?php echo $this->getUrl('customerDelete', null, ['id' => $value->customerId]) ?>' class="btn btn-Danger">Delete</a></td>
                   </tr>
               <?php } ?>
               </tbody>
           </table>
       </div>

   </div>
        <!-- <div class="footer">
            <p>I am Queen!!!!</p>
        </div> -->
</div>
</body>
</html>
*/?>




<?php 
$customers = $this->getCustomers();
$data = [];
if($customers){
    foreach($customers as $key=>$value){
        $data = $value->getData();
        break;
    }   
}
?>

<h2 style="text-align: center;">Records</h2>
<a href="<?php echo $this-> getUrl('customerUpdate') ?>" class="btn btn-info" role="button">Add Records</a><br><br>
<table border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
    <?php if(!$customers): ?>
    <tr>
        <td>No Record Found</td>
    </tr>
    <?php else: ?>
    <tr>
        <?php foreach($data as $key=>$value){ ?>
            <th><?php echo $key?></th>
        <?php } ?>
        <th colspan='2'>Action</th>
    </tr>
    <?php foreach ($customers as $key => $value) { ?>
        <?php if($value->addressType == 'Shipping'){continue;} ?>
    <tr>
        <?php foreach($data as $key1=>$value1){ ?>
        <td><?php echo $value->$key1; ?></td>
        <?php } ?>
        <td colspan=2>
            <a href = "<?php echo $this->getUrl('customerUpdate',NULL,['id'=>$value->customerId,'firstName'=>$value->firstName,'lastName'=>$value->lastName,'email'=>$value->email,'password'=>$value->password,'status'=>$value->status]); ?>" class="btn btn-Success">
                Update
            </a>
            <a href = "<?php  echo $this->getUrl('customerDelete',NULL,['id'=>$value->customerId]); ?>"class="btn btn-Danger">
                Delete
            </a>
        </td>
    </tr>
    <?php } endif; ?>
</table>