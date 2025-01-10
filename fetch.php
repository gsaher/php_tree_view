<?php
	include('db_conn.php');

	$fetch = "SELECT * FROM tbl_employee";

	$result = mysqli_query($conn, $fetch);
	
	$item = '<option value="0">Select Manager</option>';

	if ($result) {
		foreach ($result as $row) {
			$item .= '<option value="'.$row["emp_id"].'">'.$row["employee"].'</option>';
		}
		echo $item;
		// $json = json_encode($item);
		// echo json_encode($item);
	}
?>