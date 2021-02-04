<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>5form</title>
    <style> 
        .main1{
                border-radius: 5px;
                background-color: lightgrey;
                padding: 20px;
                width:20%;        
        }
        .main2{
            border-radius:20px;
            background-color: white;
            padding:10px;
            margin:10px;

        }
        .main3{
            border-radius:10px;
            background-color: red;
            color:white;
            margin-bottom:15px;
            padding:15px;
            font-size:20px;
        }
        .btn{
            background-color:lightgreen;
            margin-left:65px;
        }
        span{
            color:red;
        }
        
    </style>
</head>
<body>
    <div class="main1">
        <form action="5form.php" method="POST" onsubmit="return validation()">
            <div class="main2">
                <div class="main3">
                <i class="fa fa-lock"></i>
                <label for="signin">Sign In</lable><br>
                </div>

                <label for="email">E-mail address</label><br><br>
                <input type="text" name="email" placeholder="mail@address.com" id="email"><br>
                <span id="emailErr"></span><br><br>

                <label for="password">Password</label><br><br>
                <input type="text" name="password" placeholder="........" id="password"><br>
                <span id="passwordErr"></span><br><br>

                <input type="submit" name="sign in" value="Sign In" class="btn">

            </div>
        </form>
    <div>
    <div>
        <p>Values are:</p>
        <p id="pemail"></p>
    </div>
    
    <script type="text/javascript" src="5form.js">
    </script>
</body>
</html>