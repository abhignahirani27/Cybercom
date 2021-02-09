<?php
		include "dbcon.php";
        $id=$_GET['GetID'];
        $query="select * from employee where id='".$id."'";
        $result = mysqli_query($con,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $id=$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $phno=$row['phone'];
            $title=$row['title'];
            $create=$row['created'];

        }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update page</title>
	<link rel="stylesheet" type="text/css" href="css/createstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
	<div class="header">
		<span class="txt">Website Title</span>
		
            <div class="link">
			<a href="./index.php" class="active">Home</a>
			<a href="./contact.php">Contacts</a>
        </div>	
	</div>
	<div class="details">
		<h3><b>Update Contact</b></h3><hr><br>
		
    <form method="POST" class="main" action="update.php">
        <div class="row">
        <div class="col-sm-6">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            Name<br><input type="text" id="name" placeholder="Name" class="box" value="<?php echo $name ?>" name="name">
            <span id="nameErr"></span><br>

            Phone<br><input type="text" id="phno" placeholder="PhoneNO" class="box" value="<?php echo $phno ?>" name="phno">
            <span id="phnoErr"></span><br>

            Created<br><input type="text" id="create" placeholder="Date and Time" class="box" value="<?php echo $create ?>" name="create"><br><br>

            <button class="btn1" name="update">Update</button>
        </div>

        <div class="col-sm-6">
            Email<br><input type="text" id="email" placeholder="Email" class="box" value="<?php echo $email ?>" name="email">
            <span id="emailErr"></span><br>

            Title<br><input type="text" id="title" placeholder="Title" class="box" value="<?php echo $title ?>" name="title">
            <span id="titleErr"></span><br>
        </div>
		
	    </div>
    </form>

    <?php
	include "dbcon.php";
	if(isset($_POST["update"]))
	{
		$id=$_POST['id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phno=$_POST['phno'];
		$title=$_POST['title'];
		$create=$_POST['create'];

		$query="update employee set name='".$name."', email='".$email."', phone='".$phno."', title='".$title."', created='".$create."' where id='".$id."'";

		if($result=mysqli_query($con,$query))
		{
			header("location:contacts.php");
		}
        else
        {
            echo "Please check the query";
        }
	}
	?>
</body>
</html>













