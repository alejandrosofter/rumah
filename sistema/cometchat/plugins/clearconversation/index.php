<?php

include dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."plugins.php";

if ($_GET['action'] == 'clear') {
	$id = $_POST['clearid'];

	if (!empty($id) && !empty($_SESSION['cometchat_user_'.$id])) {
		unset($_SESSION['cometchat_user_'.$id]);
	}
}
