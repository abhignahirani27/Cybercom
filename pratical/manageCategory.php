<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You need to logged-in first to view to this page";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
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
    <div class="main">
        <div class="varify">
            <?php if (isset($_SESSION['username'])) : ?>
                <h4>Welcome, <?php echo $_SESSION['username']; ?></h4>
            <?php endif; ?>
        </div>
        <div class="nav">
            <ul>
                <li><a href="manageCategory.php">Manage category</a></li>
                <li><a href="#">My profile</a></li>
                <li><a href="mainPage.php?logout='1'">Logout</a></li>

            </ul>

        </div>
    </div>
    <div>
        <div class="blog_category">
            <h2>Blog category</h2>

            <div class="add_cat_btn">

            <input type="button" onclick="location.href='addCategory.php';" value="Add Category" />
            </div>
            <div class="disp_category">

            </div>

        </div>
    </div>
    <div class="main_display">

    <div class="display table">

    <?php
    $conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');
    if (!$conn) {
        echo "Connection Failure";
    }
    $disp_sql = "SELECT * FROM blog_post";

    $result = mysqli_query($conn, $disp_sql);
    ?>
    <br>
    <table class="table table-bordered" id="displayTable">
        <tr>
            <td>Category ID</td>
            <td>Category Image</td>
            <td>Category Name</td>
            <td>Created Date</td>
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
                   <a href="editblog.php">Edit</a>
                </td>
                <td>
                    <a href="deleteblog.php">Delete</a>
                </td>

            </tr>
        <?php endwhile; ?>
    </table>

</div>

</div>
</div>


</body>

</html>