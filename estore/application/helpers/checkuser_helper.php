<?php
function checkUser($obj) {
	if($obj->session->userdata('logged_in'))
	{
		$session_data = $obj->session->userdata('logged_in');
		$id = $session_data['id'];
			
		if ($id == 1) {
			$data['taskbar'] = 'templates/taskbar_admin.php';
		}
		else{
			$data['taskbar'] = 'templates/taskbar_user.php';
		}
	}
	
	else {
		$data['taskbar'] = 'templates/taskbar_anon.php';
	}
	return $data;
}