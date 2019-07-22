<?php

	require_once 'config.php';
	require_once 'includes/student.class.php';

	if (ISSET($_REQUEST['ID'])) {
		$Student_Class = new School\StudentClass\Student($_REQUEST['ID']);
		$Student_Result = $Student_Class->getStudentData();
		$Student_Data = $Student_Result->fetch_assoc();
	} else {
		header('LOCATION: students');
	}
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
	<h3>Student <?php echo $Student_Data['firstname'] .' '. $Student_Data['lastname']; ?></h3> 
	
	<?php
		if ($Student_Data['grades'] >= 7) {
			echo '<p>This student has passed the exam with grade '. $Student_Data['grades'] .'</p>';
		}
	?>

	<table border="1">
		<tr>
			<th>Exam Grade</th>
			<th>Exam Description</th>
		</tr>
		<?php
			$Grades_Result = $Student_Class->getStudentGrades();
			while ($Grades_Data = $Grades_Result->fetch_assoc()) {
		?>
			<tr>
				<td><?php echo $Grades_Data['grades']; ?></td>
				<td><?php echo $Grades_Data['description']; ?></td>
			</tr>
		<?php
			}
		?>
	</table>
</body>
</html>