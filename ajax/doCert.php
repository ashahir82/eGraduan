<?php
header("Access-Control-Allow-Origin: *");//to allow cross-site

include '../core/init.php';

$rows = array();

if(isset($_GET['action']) && empty($_GET['action']) === false && $_GET['action'] == "searchCert") {
	$ndp=sanitize($_GET['ndp']);
	$nokp=sanitize($_GET['nokp']);
	$name=sanitize($_GET['name']);
	
	if (empty($ndp) === false) {
		if (preg_match("/\\s/", $ndp) == true) {
			$errors[] = 'No daftar pelajar tidak boleh mempunyai ruang.';
		}
		if (is_numeric($ndp) !== true) {
			$errors[] = 'No daftar pelajar hanya mengandungi nombor sahaja.';
		}
	}
	if (empty($nokp) === false) {
		if (preg_match("/\\s/", $nokp) == true) {
			$errors[] = 'No kad pengenalan tidak boleh mempunyai ruang.';
		}
		if (is_numeric($nokp) !== true) {
			$errors[] = 'No kad pengenalan hanya mengandungi nombor sahaja.';
		}
	}
	if (strlen($ndp) < 6 && strlen($nokp) < 6 && strlen($name) < 6) {
		$errors[] = 'Panjang minimum aksara untuk carian adalah 6.';
	}
	
	if (empty($errors)) {
		$result = mysqli_query($con,"SELECT * FROM `student` AS S INNER JOIN `cert` AS C ON `S`.`stud_id`=`C`.`stud_id` INNER JOIN `course` AS CS ON `C`.`course_id`=`CS`.`course_id` INNER JOIN `type` AS T ON `C`.`type_id`=`T`.`type_id` WHERE `S`.`stud_id` LIKE '%".$nokp."%' AND `S`.`stud_fullname` LIKE '%".$name."%' AND `C`.`ndp` LIKE '%".$ndp."%' ORDER BY `C`.`cert_id`");
		if (mysqli_num_rows($result) != 0) {
			// output data of each row
			$total = mysqli_num_rows($result);
			while (($row = mysqli_fetch_assoc($result)) != false) {
				$rowsResult[] = array(
					'id' => $row['cert_id'],
					'name' => $row['stud_fullname'],
					'intake' => $row['intake'],
					'type' => $row['name_bm'],
					'course' => $row['course_name_bm'],
					'output' => $row['output'],
					'convo' => $row['convo']
				);
			}
		} else {
			$errors[] = 'Tiada rekod ditemui';
		}
	}
	
	if (!empty($errors)) {
		$rows['errors']  = $errors;
	} else {
		$rows['success'] = array(
			'status' => 'ok',
			'record' => $total,
			'data' => $rowsResult
		);
	}
	
	echo json_encode($rows);
}

if(isset($_GET['action']) && empty($_GET['action']) === false && $_GET['action'] == "getDetail" && isset($_GET['id'])) {
	$id = sanitize($_GET['id']);
	$result = mysqli_query($con,"SELECT * FROM `student` AS S INNER JOIN `cert` AS C ON `S`.`stud_id`=`C`.`stud_id` INNER JOIN `course` AS CS ON `C`.`course_id`=`CS`.`course_id` INNER JOIN `type` AS T ON `C`.`type_id`=`T`.`type_id` WHERE `C`.`cert_id` = " . $id);
	if (mysqli_num_rows($result) != 0) {
		// output data of each row
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<p>Berikut adalah maklumat lengkap bagi graduan '.$row['stud_fullname'].'.</p>
			<table class="table table-bordered table-condensed">
				<tr>
					<th>Nama Penuh</th>
					<td>'.$row['stud_fullname'].'</td>
				</tr>
				<tr>
					<th>Jenis Kelayakan</th>
					<td>' . $row['name_bm'] . '</td>
				</tr>
				<tr>
					<th>Nama Program</th>
					<td>' . $row['course_name_bm'] . '</td>
				</tr>
				<tr>
					<th>Sesi Kemasukan</th>
					<td>' . $row['intake'] . '</td>
				</tr>
				<tr>
					<th>Sesi Keluaran</th>
					<td>' . $row['output'] . '</td>
				</tr>
				<tr>
					<th>Konvokesyen</th>
					<td>' . $row['convo'] . '</td>
				</tr>
			</table>';
		}
	}
}
?>