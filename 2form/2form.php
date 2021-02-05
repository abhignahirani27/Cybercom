<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">

    <title>2form</title>
    <style>
        table{
            width:100%;
        }
        fieldset{
            background-color:lightgreen;
            width:100%;
            font-family: "Trirong", serif;
        }
        form{
            width:50%;   
        }
    </style>
</head>
<body>
        <form method="POST" action="2form.php" onsubmit="return validate()">
            <fieldset>
                <legend align="center">USER FORM</legend>
            <table>
                <tr>
                    <td><ul><li>FIRST NAME</li></ul></td>
                    <td><input type="text" id="fname" name="fname" >
                    <span id="fnameErr"></span></td>
                </tr>

                <tr>
                    <td><ul><li>PASSWORD</li></ul></td>
                    <td><input type="password" id="password" name="password">
                    <span id="passErr"></span></td>
                </tr>

                <tr>
                    <td><ul><li>GENDER</li></ul></td>
                    <td><input type = "radio" name = "gender" value = "female" >Female
                        <input type = "radio" name = "gender" value = "male" >Male
                    <span id="genderErr"></span></td>
                </tr>

                <tr>
                    <td><ul><li>ADDRESS</li></ul></td>
                    <td><textarea name="address" rows="4" cols="20" id="add"></textarea>
                    <span id="addErr"></td>
                </tr>

                <tr>
                    <td><ul><li>D.O.B</li></ul></td>
                    <td><select name = "dob">
                     <option value = "Jan">Jan</option>
                     <option value = "Feb">Feb</option>
                     <option value = "Mar">Mar</option>
                     <option value = "April">April</option>
                     <option value = "May">May</option>
                     <option value = "June">June</option>
                     <option value = "July">July</option>
                     <option value = "Aug">Aug</option>
                     <option value = "Sep">Sep</option>
                     <option value = "Oct">oct</option>
                     <option value = "Nov">Nov</option>
                     <option value = "Dec">Dec</option>
                    </select>
                    <select name = "dob">
                     <option value = "01">01</option>
                     <option value = "02">02</option>
                     <option value = "03">03</option>
                     <option value = "04">04</option>
                     <option value = "05">05</option>
                     <option value = "06">06</option>
                     <option value = "07">07</option>
                     <option value = "08">08</option>
                     <option value = "09">09</option>
                     <option value = "10">10</option>
                     <option value = "11">11</option>
                     <option value = "12">12</option>
                    </select>
                    <select name = "dob">
                     <option value = "2010">2010</option>
                     <option value = "2011">2011</option>
                     <option value = "2012">2012</option>
                     <option value = "2013">2013</option>
                     <option value = "2014">2014</option>
                     <option value = "2015">2015</option>
                     <option value = "2016">2016</option>
                     <option value = "2017">2017</option>
                     <option value = "2018">2018</option>
                     <option value = "2019">2019</option>
                     <option value = "2020">2020</option>
                     <option value = "2021">2021</option>
                    </select></td>
                    </tr>

                    <tr>
                    <td><ul><li>SELECT GAMES</li></ul></td>
                    <td><input type="checkbox" name="game" class="game1" value="Hockey"><label for="game1">Hockey
                    <input type="checkbox" name="game" class="game1" value="Football"><label for="game2">Football
                    <input type="checkbox" name="game" class="game1" value="Badminton"><label for="game3">Badminton
                    <input type="checkbox" name="game" class="game1" value="Cricket"><label for="game4">Cricket
                    <input type="checkbox" name="game" class="game1" value="Volleyball"><label for="game5">Volleyball
                    <span id="gameErr"></span></td>
                    </tr>

                    <tr>
                    <td><ul><li>MARITAL STATUS</li></ul></td>
                    <td><input type = "radio" name = "status" value = "Married">Married
                        <input type = "radio" name = "status" value = "Unmarried">Unmarried
                    </td>
                    </tr>

                    <tr>
                    <td></td>
                    <td><input type = "submit" name="submit" value="Submit">
                        <input type = "reset" name = "reset" value = "Reset">
                    </td>
                    </tr>

                    <tr>
                    <td></td>
                    <td><input type="checkbox" name="accept">I accept this argreement
                    </td>
                    </tr>
            </table>
            </fieldset>
        </form>
    
    <div>
        <p><b>Values are:</b></p>
        <p id="pname"></p>
        <p id="pgender"></p>
        <p id="padd"></p>
        <p id="pgame"></p>
    </div>
    <script type="text/javascript" src="2form.js"></script>
</body>
</html>