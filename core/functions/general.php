<?php
function logged_in_redirect() {
	if (logged_in() === true) {
		$URL="index.php";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		exit();
	}
}

function protect_page() {
	if (logged_in() === false) {
		$URL="index.php?p=protected";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		exit();
	}
}

function admin_protect() {
	global $user_data;
	if (has_access($user_data['id'], 1) === false) {
		$URL="index.php";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		exit();
	}
}

function sanitize($data) {
	return htmlentities(strip_tags(mysqli_real_escape_string($GLOBALS["con"], $data)));
}

function array_sanitize (&$item) {
	$item =  htmlentities(strip_tags(mysqli_real_escape_string($GLOBALS["con"], $item)));
}

function mysqli_result($res, $row = 0, $col =0) {
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0) {
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}
?>