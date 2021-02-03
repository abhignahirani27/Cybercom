<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $nameErr= $passwordErr= $genderErr= $fileErr= $gameErr=$fileErr=$ageErr="";
        $name= $password= $address= $game= $gender=$age=$file="";

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["name"])){
                $nameErr="Name is required";
            }
            else{
                $name=test_input($_POST["name"]);
            }

            if(empty($_POST["password"])){
                $passwordErr="Password is required";
            }
            else{
                $password=test_input($_POST["password"]);

            }

            if(empty($_POST["address"])){
                $address="";
            }
            else{
                $address=test_input($_POST["address"]);
            }

            if(empty($_POST["game"])){
                $gameErr="You must select 1 or more";
            }
            else{
                $game=test_input($_POST["game"]);
            }

            if(empty($_POST["gender"])){
                $genderErr="Gender is required";
            }
            else{
                $gender=test_input($_POST["gender"]);
            }

            if(empty($_POST["age"])){
                $ageErr="Select age";
            }
            else{
                $age=test_input($_POST["age"]);
            }

            if(empty($_POST["file"])){
                $fileErr="Select file";
            }
            else{
                $file=test_input($_POST["file"]);
            }

        }
        

        function test_input($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
    ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] );?>">
            <table border="2" align="center">
                <tr>
                    <th colspan="2"><b>User Form</b></th>
                </tr>

                <tr>
                    <td><label for="Name">Enter Name</label></td>
                    <td><input type="text" name="name" class="main">
                        <span class="error">*<?php echo $nameErr;?></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="password">Enter Password</label></td>
                    <td><input type="password" name="password" class="main">
                        <span class="error">*<?php echo $passwordErr;?></span>
                    </td>
                </tr>

                <tr>
                    <td><label for="address">Enter Address</label></td>
                    <td><textarea name="address" rows="3" cols="22" class="main"></textarea></td>
                </tr>

                <tr>
                    <td><label for="game">Select Game</label></td>
                    <td><input type="checkbox" name="game"><label for="game1">Hockey<br>
                    <input type="checkbox" name="game"><label for="game2">Football<br>
                    <input type="checkbox" name="game"><label for="game3">Badminton<br>
                    <input type="checkbox" name="game"><label for="game4">Cricket<br>
                    <input type="checkbox" name="game"><label for="game5">Volleyball<br>
                </td>
                </tr>

                <tr>
                    <td><label for="gender">Gender</td>
                    <td>
                    <input type = "radio" name = "gender" value = "female">Female
                    <input type = "radio" name = "gender" value = "male">Male
                    <span class="error">*<?php echo $genderErr;?></span>
                    </td>
                </tr>

                <tr>
                <td><label for="age">Select ur age</td>
                <td>
                    <select name = "age" class="main">
                     <option value = "Select" selected>Select</option>
                     <option value = "18">18</option>
                     <option value = "19">19</option>
                     <option value = "20">20</option>
                     <option value = "21">21</option>
                     <option value = "22">22</option>
                  </select>
               </td>
               </tr>

               <tr>
                    <td colspan="2" align="center">
                    <input type="file" name="file" style="background-color:lightgreen">
                    </td>
               </tr>

               <tr>
                    <td colspan="2" align="center">
                    <input type="reset" name="reset" value="Reset" class="btn">
                    <input type="submit" name="submit" value="Submit Form" class="btn">
                    </td>
               </tr>
            </table>
        </form>

        <?php
        echo "<h2>Your given values are as:</h2>";
        echo "Your name is:" .$name. "<br>";
        echo "Your address is:" .$address. "<br>";
        echo "Your age is:" .$age. "<br>";
        echo "Your gender is:" .$gender;
        ?>

</body>
</html>