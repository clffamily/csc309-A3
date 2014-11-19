<?php
/*
 * Given a controller object, returns data array with a variable 'taskbar' associated with 
 * taskbar file name related to the type of user based on user data in the sessions object.
 * Also data array contains a variable 'login' that is the type of user in he sessions object
 * (admin, anon, user).
 */
function checkUser($obj) {
	if($obj->session->userdata('logged_in'))
	{
		$session_data = $obj->session->userdata('logged_in');
		$login = $session_data['login'];
			
		if ($login == "admin") {
			$data['taskbar'] = 'templates/taskbar_admin.php';
			$data['login'] = 'admin';		
		}
		else{
			$data['taskbar'] = 'templates/taskbar_user.php';
			$data['login'] = 'user';
		}
	}
	
	else {
		$data['taskbar'] = 'templates/taskbar_anon.php';
		$data['login'] = 'anon';
	}
	return $data;
}