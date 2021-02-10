<?php include('validation.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>

    <style>
        .main_container {
            margin-left: 400px;
        }

        .data_container {
            margin-left: 50px;
        }

        #heading {
            margin-left: 200px;
        }
        .box{
            width:90%;
        }
        .btn{
            width:50%;
            background-color:blue;
            padding:5px;
        }
    </style>
</head>

<body>
    
    <div class="main_container">
        <h1 id="heading">LOGIN</h1>
        <form action="login.php" method="POST">
        <fieldset style="width:500px"><br>
                <div class="data_container">
                    <div class="email">
                        <label>Email</label><br>
                        <input type="text" name="email" class="box">
                    </div>
                    <br>
                    <div class="password">
                        <label>Password</label><br>
                        <input type="password" name="password" class="box">
                    </div>
                    <br>
                    <div>
                        <input type="submit" name="login" value="LOGIN" class="btn">
                        <a href="registration.php"><input type="button" name="register" value="REGISTER" class="btn"></a>
                    </div>
                </div>
        </fieldset>
        </form>
    </div>

</body>

</html>