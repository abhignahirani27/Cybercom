<!DOCTYPE html>
<html>
<head>
    <?php
        include "dbcon.php";
        if(isset($_POST["button"])){
            $name=mysqli_real_escape_string($con, $_POST["name"]);
            $email=mysqli_real_escape_string($con, $_POST["email"]);
            $phno=mysqli_real_escape_string($con, $_POST["phno"]);
            $title=mysqli_real_escape_string($con, $_POST["title"]);
            $create=mysqli_real_escape_string($con, $_POST["create"]);

            $emailquery="select * from registration where email='$email'";
            $result=mysqli_query($con,$emailquery);

            $num=mysqli_num_rows($result);
            if($num==1){
                
                echo "Email already exist";
            }
            else{
            
                    $insertquery ="insert into registration (name, email, phno,title,create) values ('$name','$email','$phno','$title','$create')";
                    $iquery=mysqli_query($con,$insertquery);
                }
        }
?>
            <title>Home page</title>
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
		<h3>Create Contact</h3><hr><br>
		
    <form method="POST" class="main" onclick="return validate()">
        <div class="row">
        <div class="col-sm-6">
            Name<br><input type="text" id="name" placeholder="Name" class="box"><br>
            <span id="nameErr"></span><br>

            Phone<br><input type="text" id="phno" placeholder="PhoneNO" class="box"><br>
            <span id="phnoErr"></span><br>

            Created<br><input type="text" id="create" placeholder="Date and Time" class="box"><br><br>

            <a href="contacts.php"><input type="button" value="Create" class="btn1"></a>
        </div>

        <div class="col-sm-6">
            Email<br><input type="text" id="email" placeholder="Email" class="box"><br>
            <span id="emailErr"></span><br>

            Title<br><input type="text" id="title" placeholder="Title" class="box"><br>
            <span id="titleErr"></span><br>
        </div>
		
	    </div>
    </form>
    <script src="create.js">
    </script>
</body>
</html>













