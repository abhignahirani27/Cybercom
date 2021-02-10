<?php
session_start();
$conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');
    if (!$conn) {
        echo "Connection with database is failed!!";
    } else {
        echo "Connection sucessfull!!" . "<br>";
    }

if (isset($_POST['register'])) {

    $prefix =mysqli_real_escape_string($conn,$_POST['prefix']);
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $email =mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn,$_POST['phone_number']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);   
    $info = mysqli_real_escape_string($conn,$_POST['information']);


    if (empty($username) && empty($email) && empty($phone_number) && empty($password)) {
        echo "All fields are required!!";
    }
    if ($password != $confirm_password) {
        echo  "Both Password must be same.";
    }
        $emailquery="select * from user where email='$email'";
        $result=mysqli_query($conn,$emailquery);
        $num=mysqli_num_rows($result);
        if($num==1)
        {
            echo 'Email '.$email.' already exists.';    //Checks email is it exist or not.
        }
        else
        {
            $password = md5($password);
            $add_query = "INSERT INTO user VALUES ('','$prefix','$firstname','$lastname', '$phone_number','$email', '$password','', '$info','','')";
            if($iquery=mysqli_query($conn,$add_query))
            {
                $_SESSION['sucess'] = "You are now logged-in!!";
                header("Location: mainPage.php");   
            }
            else
            {
                echo "Not inserted";
            }
    }
}
//////////////////

if (isset($_POST['login'])) {

    $conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        echo "Please enter a email";
    }
    if (empty($password)) {
        echo "Please enter a password";
    }
    $password = md5($password);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
       // echo $row['email'];
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Logged in success!!";
        header("location: mainPage.php");
    } else {
        echo "Wrong email and password";
    }
}