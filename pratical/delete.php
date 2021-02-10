<?php
    include "dbcon.php";
    if(isset($_GET['Del']))
    {
        $id=$_GET['Del'];
        $query="delete from blog_post where id='".$id."'";
        $result=mysqli_query($con,$query);

        if($result)
        {
            header("location:blog_post.php");
        }
        else
        {
            echo "Check Query";
        }
    }

?>