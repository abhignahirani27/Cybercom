<?php
    include "dbcon.php";
    if(isset($_GET['Del']))
    {
        $id=$_GET['Del'];
        $query="delete from employee where id='".$id."'";
        $result=mysqli_query($con,$query);

        if($result)
        {
            header("location:contacts.php");
        }
        else
        {
            echo "Check Query";
        }
    }

?>