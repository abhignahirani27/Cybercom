<?php
$offset=0;
if(isset($_POST["text"])&& ($_POST["findfor"])&& ($_POST["replacewith"]))
{
     $text=$_POST["text"];
     $find=$_POST["findfor"];
     $replace=$_POST["replacewith"];
     $search_len=strlen($find);

        if(!empty($text) && !empty($find) && !empty($replace)){
            while($strpos=strpos($text,$find,$offset)){
                $offset=$search_len+$strpos;
                $text=substr_replace($text,$replace,$strpos,$search_len);
            }
            echo $text;
    }
        else{
            echo "Please enter all fields";
    }

}
?>
<form action="second.php" method="POST">
<textarea name="text" rows="6" cols="30"></textarea><br><br>
Find for:<br>
<input type="text" name="findfor"><br><br>
Replace with:<br>
<input type="text" name="replacewith"><br><br>
<input type="submit" value="Find and Replace">
</form>