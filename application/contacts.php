<?php
		include "dbcon.php";
		$query="select * from employee";
		$result=mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact page</title>
	<link rel="stylesheet" type="text/css" href="css/contactstyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="header">
		<span class="txt">Website Title</span>
            <div class="link">
			<a href="./index.php" class="active">Home</a>
			<a href="./contact.php">Contacts</a>
        	</div>	
	</div>
	<div class="details">
		<h3><b>Read Contacts</b></h3><hr>
		<a href="create.php">
		<input type="button" value="Create Contact" class="btn">
		</a>
	</div><br>
	<div>
			<table class="table table-bordered" style="width:90%;margin-left:50px">
				<tr>
					<th>id</th>
					<th>Name</th>
					<th>Email</th>
					<th>PhoneNo</th>
					<th>Title</th>
					<th>Created</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>

				<?php
					while($row=mysqli_fetch_assoc($result))
					{
						$id=$row['id'];
						$name=$row['name'];
						$email=$row['email'];
						$phno=$row['phone'];
						$title=$row['title'];
						$create=$row['created'];

				?>
					<tr>
						<td><?php echo $id ?></td>
						<td><?php echo $name ?></td>
						<td><?php echo $email ?></td>
						<td><?php echo $phno ?></td>
						<td><?php echo $title ?></td>
						<td><?php echo $create ?></td>
						<td><a href="update.php?GetID=<?php echo $id; ?>">Edit</a></td>
						<td><a href="delete.php?Del=<?php echo $id; ?>">Delete</a></td>
					</tr>
				<?php
					}
				?>
			</table>
		</div>	
</body>
</html>













