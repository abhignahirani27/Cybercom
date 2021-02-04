<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
<div>
    <?php
    include "dbcon.php";
        if(isset($_POST["submit"])){
            $firstname=mysqli_real_escape_string($con, $_POST["firstname"]);
            $lastname=mysqli_real_escape_string($con, $_POST["lastname"]);
            $email=mysqli_real_escape_string($con, $_POST["email"]);
            $password=mysqli_real_escape_string($con, $_POST["password"]);
            $cpassword=mysqli_real_escape_string($con, $_POST["cpassword"]);
            
            $pass=password_hash($password,PASSWORD_BCRYPT);
            $cpass=password_hash($cpassword,PASSWORD_BCRYPT);

            $emailquery="select * from registration where email='$email'";
            $result=mysqli_query($con,$emailquery);

            $num=mysqli_num_rows($result);
            if($num==1){
                
                echo "Email already exist";
            }
            else{
                if($password===$cpassword){
                    $insertquery ="insert into registration (firstname, lastname, email, password, cpassword) values ('$firstname','$lastname','$email','$pass','$cpass')";
                    $iquery=mysqli_query($con,$insertquery);
            }
                else{
                
                    echo "Password not matching";   
                }
            }
        }
    ?>
</div>
    <div class="container" align="center">
        <form action="form2.php" method="POST">
            <div>
                <h2>Registration Form</h2>
                <label for="firstname">Firstname:</label>
                <input type="text" name="firstname" required><br><br>
                <label for="lastname">Lastname:</label>
                <input type="text" name="lastname" required><br><br>
                <label for="email">Email:</label>
                <input type="email" name="email" required><br><br>
                <label for="password">Password:</label>
                <input type="password" name="password" required><br><br>
                <label for="cpassword">Confirm Password:</label>
                <input type="password" name="cpassword" required><br><br>
                <input type="submit" value="Sign Up" name="submit">
            </div> 
        </form>
    </div>

</body>
</html>