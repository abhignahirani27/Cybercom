<?php  $row = $this->getAdmins(); ?>

<div class="container">
   <br><br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Records</h2>
       <a onclick="object.setUrl('<?php echo $this-> getUrl('adminUpdate',null,null,true) ?>').load()" class="btn btn-info" role="button">Add Records</a>
       <a onclick="object.setUrl('<?php echo $this-> getUrl('grid') ?>').load()" class="btn btn-info" role="button">Apply Filter</a><br><br>

       <div class="table_data">
           <table  border="3px" cellpadding="10px" align="center" width="100%" class="table table-striped" style="border-collapse:collapse">
               <thead>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Password</th>
                   <th>Status</th>
                   <th>CreatedDate</th>
                   <th>UpdatedDate</th>
                   <th colspan="2">Action</th>
               </thead>
               
               <tbody align="center">
                    <tr>
                        <td><input type="text" name="filter[Id]" size="10"></td>
                        <td><input type="text" name="filter[Name]" size="10"></td>
                        <td><input type="text" name="filter[Password]" size="10"></td>
                        <td><input type="text" name="filter[Status]" size="10"></td>
                        <td><input type="text" name="filter[createdDate]" size="10"></td>
                        <td><input type="text" name="filter[updatedDate]" size="10"></td>
                        <td colspan="2"></td>
                    </tr>
               <?php if(!$row): ?>
                    <tr>
                        <td colspan="7">No Data Found!!!</td>
                    </tr>
                <?php else : ?> 
                <?php
                    foreach ($row->getData() as $value) {
                ?>
               
                   <tr>

                       <td><?php echo $value->adminId; ?></td>
                       <td><?php echo $value->name; ?></td>
                       <td><?php echo $value->password; ?></td>
                       <td><?php echo $value->status; ?></td>
                       <td><?php echo $value->createdDate; ?></td>
                       <td><?php echo $value->updatedDate; ?></td>
                       <td><a onclick="object.setUrl('<?php echo $this->getUrl('adminUpdate', null, ['id' => $value->adminId]) ?>').load()" class="btn btn-Success" role="button">Update</a></td>      
                        <td><a onclick="object.setUrl('<?php echo $this->getUrl('adminDelete', null, ['id' => $value->adminId]) ?>').load()" class="btn btn-danger" role="button">Delete</a></td>
                   </tr>
               <?php } endif; ?>
               </tbody>
           </table>

       </div>
   </div>

       <!-- <div class="footer">
           <p>I am Queen!!!!</p>
       </div>  -->
</div>
