<!DOCTYPE html>
<html>
<head>
            <title>Home page</title>
            <link rel="stylesheet" type="text/css" href="css/createstyle.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="header">
		<span class="txt">Website Title</span>
		
            <div class="link">
			<a href="./index.php" class="active"><i class="fa fa-home" style="font-size:24px"></i>Home</a>
			<a href="./contact.php"><i class="fa fa-address-book" style="font-size:20px"></i>Contacts</a>
        </div>	
	</div>
	<div class="details">
		<h3><b>Create Contact</b></h3><hr><br>
		
                <form method="POST" class="main" onsubmit="return validate()">
                    <div class="row">
                    <div class="col-sm-6">
                        Name<br><input type="text" id="name" placeholder="Name" class="box" name="name"><br>
                        <span id="nameErr"></span><br>

                        Phone<br><input type="text" id="phno" placeholder="PhoneNO" class="box" name="phno"><br>
                        <span id="phnoErr"></span><br>

                        Created<br><input type="text" id="create" placeholder="Date and Time" class="box" name="create" value="<?php echo $date=date('Y/m/d') . date('H:i:s') ?>"><br><br>

                        <input type="submit" class="btn1" name="submit" value="Create">
                    </div>

                    <div class="col-sm-6">
                        Email<br><input type="text" id="email" placeholder="Email" class="box" name="email"><br>
                        <span id="emailErr"></span><br>

                        Title<br><input type="text" id="title" placeholder="Title" class="box" id="name" name="title"><br>
                        <span id="titleErr"></span><br>
                    </div>
                    
                    </div>
                </form>
    </div>
    <script src="create.js">
    </script>

<?php
            include "dbcon.php";
            if(isset($_POST['submit']))
                {
                // Insert data in the database
                $name=mysqli_real_escape_string($con, $_POST['name']);
                $email=mysqli_real_escape_string($con, $_POST['email']);
                $phno=mysqli_real_escape_string($con, $_POST['phno']);
                $title=mysqli_real_escape_string($con, $_POST['title']);
                $created=mysqli_real_escape_string($con, $_POST['create']);

                $emailquery="select * from employee where email='$email'";
                $result=mysqli_query($con,$emailquery);
                $num=mysqli_num_rows($result);
                if($num==1)
                {
                echo "Email already exist";    //Checks email is it exist or not.
                }
                else
                {
                    $insertquery = "INSERT INTO employee VALUES ('','$name','$email','$phno','$title', '$created')";
                    if($iquery=mysqli_query($con,$insertquery)){
                        header("location:contacts.php");
                    }
                    else{
                        echo "Not inserted";
                        }    
                    }
                }
    ?>
</body>
</html>













