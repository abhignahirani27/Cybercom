<?php
//database connection to the server
$conn=mysqli_connect("localhost","root","","contactform");
if($conn)
{
    echo "connection sucessfull";
}
else
{
    die("cannot connect to database");
}
$user_ip= $_SERVER['REMOTE_ADDR'];
echo $user_ip."<br>";

function ip_exists($ip){
    global $user_ip;
}
function ip_add($ip, $conn){
    $query="insert into hits_count values=$ip";
    $query_run=mysqli_query($conn,$query);
}

function update_count( mysqli $conn){
    $query="select count from hits_count";
    if ($queryrun=mysqli_query($conn,$query))
    {
        $row=mysqli_fetch_assoc($queryrun);
        $count=$row['count'];
        echo $count;
        $count_inc=$count+1;
        $query_update="update hits_count set count=$count_inc ";
        if($query_update_run=mysqli_query($conn,$query_update)){
            echo "ok";
        }
    }
}
ip_add($user_ip,$conn);  //function called to add ip value to the hits_ip table
update_count($conn);     //function called for the count value in the hits_count table
?>