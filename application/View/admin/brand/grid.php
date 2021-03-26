<?php $row = $this->getBrands();
?>

<div class="container">
   <br><br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Records</h2>
       <a href="<?php echo $this-> getUrl('brandUpdate') ?>" class="btn btn-info" role="button">Add Records</a><br><br>

       <div class="table_data">
           <table  border="3px" cellpadding="10px" align="center" width="70%" class="table table-striped" style="border-collapse:collapse">
               <thead>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Image</th>
                   <th>Sort Order</th>
                   <th>Status</th>
                   <th>CreatedDate</th>
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

                       <td><?php echo $value->brandId;?></td>
                       <td><?php echo $value->name; ?></td>
                       <td><image src="<?php echo $value->image; ?>" height="100" width="100"></td>
                       <td><?php echo $value->sortOrder; ?></td>
                       <td><?php echo $value->status; ?></td>
                       <td><?php echo $value->createdDate; ?></td>
                       <td><a href='<?php echo $this->getUrl('brandUpdate', null, ['id' => $value->brandId]) ?>' class="btn btn-Success" role="button">Update</a></td>       
                        <td><a href='<?php echo $this->getUrl('brandDelete', null, ['id' => $value->brandId]) ?>' class="btn btn-danger" role="button">Delete</a></td>
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
