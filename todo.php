<?php 
    // initialize errors variable
session_start();
	$errors = "";

	// connect to database
	$username = $_GET["username"];
	//echo $username;
	$db = new mysqli("localhost:3307","root","","php_resume");
    if($db->connect_error)
    die("not connected:".$db->connect_error);

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO task (username,task) VALUES ('$username','$task')";
			mysqli_query($db, $sql);
			header("location: todo.php?username=".$username);

		}
	}
	if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];

	mysqli_query($db, "DELETE FROM task WHERE id=".$id);
	header("location: todo.php?username=".$username);
}
	

//..?>

<!DOCTYPE html>
<html>
<head>
	<title>ToDo List For Me</title>
	<link rel="stylesheet" type="text/css" href="todo_style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="padding-bottom: 50px;">
		<div class="position-relative" style="left: 900px;top:5px; ">
		<?php
		$id=$_SESSION['username'];

                    echo "<a href=\"bulma.php?username=$id\"> <span style=\"font-size: 30px; padding-right:15px;\" class=\"glyphicon glyphicon-home\"></span></a>";?>
	
<a href="#"><span style="font-size: 30px; padding-right: 15px;: "class="glyphicon glyphicon-refresh"></span></a>
<a href="login.php"><span style="font-size: 30px;"class="glyphicon glyphicon-off"></span></a>

</div>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">My ToDo List</h2>
	</div>
	<form method="post" action="todo.php?username=<?php echo $username ?>" class="input_form">
		<?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
<?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>

<table>
	<thead>
		<tr>
			<th>Task Number</th>
			<th>Task Description</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM task where username='$username'");

		$i = 1; 
		if (!$tasks) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
		while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<a href="todo.php?del_task=<?php echo $row['id'] ?>&&username=<?php echo $username ?>">x</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>


</div>

</body>
</html>