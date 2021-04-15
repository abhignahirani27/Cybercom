<?php $row = $this->getPayments();
?>

<div class="container">
   <br><br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Records</h2>
       <a onclick="object.setUrl('<?php echo $this->getUrl('paymentUpdate',null,null,true); ?>').load()" class="btn btn-info">Add Records</a><br><br>

       <div class="table_data">
           <table  border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
               <thead>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Code</th>
                   <th>Description</th>
                   <th>Status</th>
                   <th>CreatedDate</th>
                   <th>UpdatedDate</th>
                   <th colspan="2">Action</th>
               </thead>
               
               <tbody id="data-table" align="center">
               <?php if(!$row): ?>
                    <tr>
                        <td colspan="8">No Data Found!!!</td>
                    </tr>
                <?php else : ?> 
                <?php
                    foreach ($row->getData() as $value) {
                ?>
                   <tr>

                       <td><?php echo $value->paymentId; ?></td>
                       <td><?php echo $value->name; ?></td>
                       <td><?php echo $value->code; ?></td>
                       <td><?php echo $value->description; ?></td>
                       <td><?php echo $value->status; ?></td>
                       <td><?php echo $value->createdDate; ?></td>
                       <td><?php echo $value->updatedDate; ?></td>
                       <td><a role="button" onclick="object.setUrl('<?php echo $this->getUrl('paymentUpdate', null, ['id' => $value->paymentId]);?>').load()" class="btn btn-Success">Update</a></td>       
                        <td><a role="button" onclick="object.setUrl('<?php echo $this->getUrl('paymentDelete', null, ['id' => $value->paymentId]) ?>').load()" class="btn btn-danger">Delete</a></td>
                   </tr>
               <?php } endif;?>
               </tbody>
           </table>

       </div>
   </div>

       <!-- <div class="footer">
           <p>I am Queen!!!!</p>
       </div>  -->
</div>
