<?php
	include('db_conn.php');

	$employee = '';
	$manager = '';

	if ($_POST) {
		$employee = $_POST['employee'];
		$manager = $_POST['manager'];
		// echo $employee."<br>".$manager; exit();
		$insert = "INSERT INTO tbl_employee(employee, manager) VALUES('$employee', '$manager')";
	}

	$result = mysqli_query($conn, $insert);

	if ($result) {
		echo "Record saved successfully";
	}
?>