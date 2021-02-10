<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You need to logged-in first to view to this page";
    //header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    //header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <title>display Blog</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>


<body>
        <div class="nav">
            <a href="manageCategory.php"><input type="button" value="Manage category" style="background-color:lightgreen" class="btn1"></a>
            <a href="#"><input type="button" value="My Profile" style="background-color:lightblue" class="btn1"></a></li>
            <a href="mainPage.php?logout='1'"><input type="button" value="Logout" style="background-color:lightpink" class="btn1"></a></li>
        </div>
        <div>
        <h3>Blog Posts</h3><br>
        <a href="addBlogPost.php"><input type="button" name="btn" class="btn" value="Add Blog Post" style="background-color:lightgreen;font-size: 20px;"></a>
        <div>
    <div>
        <div class="main_display">

            <div class="display table">

                <?php
                $conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');
                if (!$conn) {
                    echo "Connection Failure";
                }
                $disp_sql = "SELECT post_catagory.Post_Id,blog_post.Content,blog_post.Title FROM blog_post INNER JOIN post_catagory ON blog_post.Id=post_catagory.Post_Id";

                $result = mysqli_query($conn, $disp_sql);
                ?>
                <br>
                <table class="table table-bordered" id="displayTable">
                    <tr>
                        <td>ID</td>
                        <td>Category Name</td>
                        <td> Title</td>
                        <td>Published Date</td>
                        <td colspan="2">Action</td>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($result)) :  ?>

                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>
                            <td>
                                <?php echo $row['url']; ?>
                            </td>
                            <td>
                                <?php echo $row['published_at']; ?>
                            </td>
                            <td>
                               <a href="editblog.php?GetID=<?php echo $id; ?>">Edit</a>
                            </td>
                            <td>
                                <a href="deleteblog.php?Del=<?php echo $id; ?>">Delete</a>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                </table>

            </div>

        </div>
    </div>

</body>

</html>