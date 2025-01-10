<?php
  include('db_conn.php');

  $manager = 0;

  $query = "SELECT * FROM tbl_employee";

  $result = mysqli_query($conn, $query);
  foreach ($result as $row) {
    $data = get_treeview($manager, $conn);
  }

  echo json_encode(array_values($data));

  function get_treeview($manager, $conn) {
    $query = "SELECT * FROM tbl_employee WHERE manager ='".$manager."'";

    $result = mysqli_query($conn, $query);

    $output = array();
    foreach ($result as $row) {
      $sub_array = array();
      $sub_array['text'] = $row['employee'];
      $sub_array['nodes'] = array_values(get_treeview($row['emp_id'], $conn));
      $output[] = $sub_array;
    }
    return $output;
  }
?>