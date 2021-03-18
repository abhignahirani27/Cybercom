<?php //require_once "header.php"; ?>

<div class="container">
    <!-- <h2 style="text-align:center ;">Customer Update Form</h2><br><br> -->

    
    <?php echo $this->getTabContent(); ?>

       <?php /* <div class="row">
            <div class="col-lg-6">

                <label for="firstname" class="font-weight-bold">Firstname</label><br>
                <input type="text" name="customer[firstname]" class="form-control" value="<?php echo $customer->firstname; ?>"><br>

                <label for="lastname" class="font-weight-bold">Lastname</label><br>
                <input type="text" name="customer[lastname]" class="form-control" value="<?php echo $customer->lastname; ?>"><br>
    
                <label for="email" class="font-weight-bold">Email</label><br>
                <input type="email" name="customer[email]" class="form-control" value="<?php echo $customer->email; ?>"><br>
            </div>

            <div class="col-lg-6">

                <label for="mobile" class="font-weight-bold">Mobile</label><br>
                <input type="text" name="customer[mobile]" class="form-control"
                value="<?php echo $customer->email; ?>"><br>

                <label for="password" class="font-weight-bold">Password</label><br>
                <input type="password"  name="customer[password]" class="form-control"
                value="<?php echo $customer->password; ?>"><br>
    
                <label for="status" class="font-weight-bold">Status</label><br>
                <select name="customer[status]" class="form-control">
                    <?php
                    $select = ['enable' => "Enable", 'disable' => "Disable"];
                    foreach ($select as $key => $value) {
                        if ($key === $row[0]['status']) {
                    ?>
                    <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                    <?php
                        } else {
                        ?>
                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                    <?php
                        }
                    }
                    ?>
                </select><br><br>

                <button type="submit" class="btn btn-primary" value="submit">Submit</button>
        </div>
    </form>
        
        <!-- <div class="footer">
            <p>I am Queen!!!!</p>
        </div>  -->

</div>
*/?>