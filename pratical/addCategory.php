<?php
session_start();
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You need to logged-in first to view to this page";
  // header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
   // header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Main page</title>
</head>

<body>
    <div class="main">
        <div class="varify">
            <?php if (isset($_SESSION['username'])) : ?>
                <h4>Welcome, <?php echo $_SESSION['username']; ?></h4>
            <?php endif; ?>
        </div>
        <div class="nav">
            <ul>
                <li><a href="addBlogPost.php">Add Blog Post</a></li>
                <li><a href="manageCategory.php">Manage category</a></li>
                <li><a href="addStudent.php">My profile</a></li>
                <li><a href="mainPage.php?logout='1'">Logout</a></li>

            </ul>

        </div>
    </div>
    <div class="addBlog">
            <div>
                <h2>Add New Category</h2>
                <form action="addBlogPost.php" method="POST">

                        <div>
                            <label>Title : </label>
                            <input type="text" name="categoryTitle">
                        </div>
                        <br>
                        <div>
                            <label>Content : </label>
                            <input type="text" name="categoryContent">
                        </div>
                        <br>

                        <div>
                            <label>URL : </label>
                            <input type="text" name="categoryUrl">
                        </div>
                        <br>

                        <div>
                            <label>Meta Title : </label>
                            <input type="text" name="metaTitle">
                        </div>
                        <br>

                        <div>
                            <label> Parent Category : </label>
                           <select name="parentCategory">
                               <option value="none" disabled selected hidden></option>
                               <option value="Education">Education</option>
                               <option value="LifeStyle">LifeStyle</option>
                               <option value="Health">Health</option>
                               <option value="Sports">Sports</option>
                               <option value="Entertainment">Entertainment</option>
                           </select>
                        </div>
                        <br>

                        <div>
                            <label>Image: </label>
                            <input type="file" name="category_img">
                        </div>
                        <br>

                        <div>
                            <input type="submit" name="categoryBtn" value="submit">
                        </div>
                        <br>
                    

                </form>
            </div>
        </div>
</body>

</html>

<?php 

$conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');  
if(!$conn) {
    echo "Connection Failure";
}

if(isset($_POST['categoryBtn'])){

$categoryTitle = $_POST['categoryTitle'];
$categoryContent = $_POST['categoryContent'];
$categoryUrl = $_POST['categoryUrl'];
$metaTitle = $_POST['metaTitle'];
$parentCategory = $_POST['parentCategory'];

$add_query = "INSERT INTO category  VALUES ('','','$categoryTitle', '$metaTitle', '$categoryUrl', '$categoryContent','','')";

if(mysqli_query($conn,$add_query)){

    echo "Added Sucessfully";
}else {
    echo "Error";
    
}
}
?>