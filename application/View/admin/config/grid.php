<?php $row = $this->getConfig_groups();
?>

<div class="container">
   <br><br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Records</h2>
       <a href="<?php echo $this-> getUrl('config_groupUpdate') ?>" class="btn btn-info" role="button">Add Records</a><br><br>

       <div class="table_data">
           <table  border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
               <thead>
                   <th>Group Id</th>
                   <th>Name</th>
                   <th>CreatedDate</th>
                   <th colspan="2">Action</th>
               </thead>
               
               <tbody id="data-table" align="center">
               <?php if(!$row): ?>
                    <tr>
                        <td colspan="4">No Data Found!!!</td>
                    </tr>
                <?php else : ?> 
                <?php
                    foreach ($row->getData() as $value) {
                ?>
                   <tr>

                       <td><?php echo $value->groupId; ?></td>
                       <td><?php echo $value->name; ?></td>
                       <td><?php echo $value->createdDate; ?></td>
                       <td><a href='<?php echo $this->getUrl('config_groupUpdate', null, ['id' => $value->groupId]) ?>' class="btn btn-Success" role="button">Update</a></td>       
                        <td><a href='<?php echo $this->getUrl('config_groupDelete', null, ['id' => $value->groupId]) ?>' class="btn btn-danger" role="button">Delete</a></td>
                   </tr>
               <?php } endif;?>
               </tbody>
           </table>

       </div>
   </div>
</div>
