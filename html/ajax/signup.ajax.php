<?php
/**
 * AJAX :
 * author @andrew
 *  Catina Hill - chi223@uky.edu
 * 	Stephanie Damron - sdamron@arh.org
 * 	Danielle Fertig - dfertig@vestadvertising.com
  */

if(isset($_POST) && isset($_POST['register'])) {

	$register = json_decode($_POST['register'], true);

	if (!isset($register['action'])) {
		echo json_encode(array('success' => 0));
		exit;
	}

	if($register['action'] == "register") {


			$newMessage = '<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" height="35">'.
						  '<tbody><tr>'.
						  '<td style="font-size: 18px; font-weight: strong;">doyourlegshurt.com - Contact Request</td>'.
						  '</tr></tbody>'.
						  '</table>'.
						  '<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">'.
						  '<tbody><tr>'.
						  '<td width="175"> Name </td>'.
						  '<td width="525">: '.$register['name'].'</td>'.
						  '</tr>'.
						  '<tr>'.
						  '<td width="175"> Phone  </td>'.
						  '<td width="525">: '.$register['phone'].'</td>'.
						  '</tr>'.
						  '<tr>'.
						  '<td width="175"> Email </td>'.
						  '<td width="525">: '.$register['email'].'</td>'.
						  '</tr>'. 
						  '<tr>'.
						  '<td width="175"> Created On </td>'.
						  '<td width="525">: '.date("F j, Y, g:i a").'</td>'.
						  '</tr></tbody>'.
						  '</table>';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: no-reply@doyourlegshurt.com' . "\r\n";
			$result = mail('chi223@uky.edu, sdamron@arh.org, dfertig@vestadvertising.com, andrews@vestadvertising.com', '[doyourlegshurt.com] Contact Request', $newMessage, $headers);			

			if($result) {
				echo json_encode(array( "success" => 1, "code" => 1));
			} else {
				echo json_encode(array( "success" => 1, "code" => 2));
			}

		}


	}
?>