<?php

	require_once 'config.php';
	require_once 'includes/student.class.php';

	$Student_Class = new School\StudentClass\Student();
	$Student_Result = $Student_Class->getStudentData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Student ID <?php echo $_REQUEST['ID']; ?></title>
</head>
<body>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>E-Mail</th>
			<th>School</th>
			<th>School Grade</th>
		</tr>
		<?php
			while ($Student_Data = $Student_Result->fetch_assoc()) {
		?>
			<tr>
				<td><?php echo '<a href="student/'. $Student_Data['ID'] .'">'. $Student_Data['ID'] .'</a>'; ?></td>
				<td><?php echo '<a href="student/'. $Student_Data['ID'] .'">'. $Student_Data['firstname'] .'</a>'; ?></td>
				<td><?php echo '<a href="student/'. $Student_Data['ID'] .'">'. $Student_Data['lastname'] .'</a>'; ?></td>
				<td><?php echo '<a href="student/'. $Student_Data['ID'] .'">'. $Student_Data['email'] .'</a>'; ?></td>
				<td><?php echo '<a href="student/'. $Student_Data['ID'] .'">'. $Student_Data['school'] .'</a>'; ?></td>
				<td><?php echo '<a href="student/'. $Student_Data['ID'] .'">'. $Student_Data['grade'] .'</a>'; ?></td>
			</tr>
		<?php
			}
		?>
	</table>
</body>
</html>