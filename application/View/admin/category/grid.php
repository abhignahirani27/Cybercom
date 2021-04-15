<?php
 //print_r($this->getCatogries());
 $row = $this->getCategories();
 ?>
 
<div class="container">
   <br><br><br>
   <div id="main-content">
       <h2 style="text-align: center;">Records</h2>

       <a onclick="object.setUrl('<?php echo $this-> getUrl('categoryUpdate',null,null,true); ?>').load()" class="btn btn-info" role="button">Add Records</a><br><br>
       <div class="table_data">
           <table  border="3px" cellpadding="10px" align="center" width="70%" style="border-collapse:collapse">
               <thead>
                   <th>Id</th>
                   <th>Name</th>
                   <th>ParentId</th>
                   <th>Status</th>
                   <th>Description</th>
                   <th>PathId</th>
                   <th colspan="2">Action</th>
               </thead>
               <tbody id="data-table" align="center">
               <?php if(!$row): ?>
                    <tr>
                        <td colspan="7">No Data Found!!!</td>
                    </tr>
                <?php else : ?> 
                <?php
                    foreach ($row->getData() as $key => $value) {
                ?>

                   <tr>
                       <td><?php echo $value->categoryId;?></td>
                       <td><?php echo $this->getName($value); ?></td>
                       <td><?php echo $value->parentId; ?></td>
                       <td><?php echo $value->status; ?></td>
                       <td><?php echo $value->description; ?></td>
                       <td><?php echo $value->pathId; ?></td>

                       <td><a onclick="object.setUrl('<?php echo $this->getUrl('categoryUpdate', null, ['id' => $value->categoryId]); ?>').load()" class="btn btn-Success">Update</a></td>      
                        <td><a onclick="object.setUrl('<?php echo $this->getUrl('categoryDelete', null, ['id' => $value->categoryId]); ?>').load()" class="btn btn-Danger">Delete</a></td>
                   </tr>
               <?php } endif; ?>
               </tbody>
           </table>

       </div>
       
   </div>
        
</div>