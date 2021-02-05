<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			$conn=mysqli_connect("localhost","root","","contactform");
			if($conn)
			{
				echo "connection sucessfull";
			}
			else
			{
				die("cannot connect to database");
			}
			echo "<br>";
			$query="select firstname,phno from contactdetail where id='1'";
			if($queryrun=mysqli_query($conn,$query))//this function return boolean value
			{
                echo "query executed <br>";
                if(mysqli_num_rows($queryrun)==0)
                {
                    echo "No data found";
                }
                else{
				while ($result=mysqli_fetch_assoc($queryrun))
			 	{
                     $fname=$result['firstname'];
                     $phno=$result['phno'];
                     echo "Firstname is ". $fname. "." . " Phno is ". $phno. "<br>";
					//echo $result["Name"]."<br>";
				}
                }	
			}
			else
			{
				echo "query not executed";
			}
		?>
	</body>
</html>