<?php

/*
* get admin login
*
*/

function getAdminLogin()
{
	if($_SESSION['adminUser'])
	{
		unset($_SESSION['adminUser']);
	}

	// get captcha text
	$showCaptcha = getCaptchaText();

	$html  = '';
	$html  = '<input type="hidden" name="sCaptcha" value="'.$showCaptcha.'">';
	$html .= '<tr class="header"><td colspan="2">Admin Area - Login</td></tr>';
	$html .= '<tr><td width="100">Username</td><td><input type="text" name="uName" value=""></td></tr>';
	$html .= '<tr><td>Password</td><td><input type="password" name="uPass" value=""></td></tr>';
	$html .= '<tr><td>Enter Code</td><td><input type="text" size="6" name="uCaptcha" value="">&nbsp;<span class="captcha">'.$showCaptcha.'</span></td></tr>';

	$html .= '<tr><td>&nbsp;</td><td><input style="cursor:pointer;" type="submit" name="submit" value="Login"></td></tr>';
	$html .= '<tr><td>&nbsp;</td><td>&#187;&nbsp;<a href="?option=lostPassword">Reset Password?</a></td></tr>';

	return $html;
}

/*
* check admin login
*
*/

function updateAdminLogin($_POST)
{
	$result = '0';

	if(empty($_POST['uName']))
	{
		return "Please enter your login name.";
	}

	$tmp=mysql_query("
		SELECT admin, adminLogin, moderator, modLogin   
		FROM prochatrooms_config
		") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{
		if(stristr($i['admin'],$_POST['uName']) && $i['adminLogin'] == md5($_POST['uPass']) && $_POST['sCaptcha'] == $_POST['uCaptcha'])
		{
			// is admin
			$_SESSION['adminUser'] = '1';

			$result = "1";	
		}
	}

	return $result;	
}

/*
* reset admin password
*
*/

function resetAdminLogin($status)
{
	// include files
	include("../includes/config.php");

	// create a random password 
	$newPass = substr(md5(date("U").rand(1,99999)),0,-16);

	// insert into database
	$sql = "UPDATE prochatrooms_config 
			SET adminLogin ='".md5($newPass)."' 
			WHERE id = '1'
			";

	mysql_query($sql) 
	or die(mysql_error()); 

	// create headers
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1\n";
	$headers .= "X-Priority: 3\n";
	$headers .= "X-MSMail-Priority: Normal\n";
	$headers .= "X-Mailer: php\n";
	$headers .= "From: \"" . $CONFIG['chatroomName'] . "\" <" . $CONFIG['chatroomEmail'] . ">\n";

	// send email
	if($status == '1')
	{
		$email_subject = $CONFIG['chatroomName']." - Admin Area Password";
		$email_message  = "Hello Admin,\r\n\r\n";
		$email_message .= "Please find below your admin area login password,\r\n\r\n";
		$email_message .= "Password: ".$newPass."\r\n\r\n";
		$email_message .= "Login Url: ".$CONFIG['chatroomUrl']."admin/\r\n\r\n";
		$email_message .= "Many thanks,\r\n";
		$email_message .= $CONFIG['chatroomName'];
	}

	mail($CONFIG['chatroomEmail'], $email_subject, $email_message, $headers);
}

/*
* get config settings
*
*/

function getAdminConfig()
{
	$tmp=mysql_query("
		SELECT *   
		FROM prochatrooms_config
		") or die(mysql_error()); 

	while($i = mysql_fetch_array($tmp)) 
	{

		return array(

				$i['id'],
				$i['adminLogin'],
				$i['avatars'],
				urldecode($i['badwords']),
				$i['font_color'],
				$i['font_size'],
				$i['font_family'],
				$i['sfx'],
				$i['smilies_text'],
				$i['smilies_images'],
				$i['gender'],
				$i['profileOn'],
				$i['profileUrl'],
				$i['profileRef'],
				$i['privateOn'],
				$i['whisperOn'],
				$i['webcamsOn'],
				$i['advertsOn'],
				$i['enableUrl'],
				$i['enableEmail'],
				$i['enableShoutFilter'],
				$i['floodChat'],
				$i['newPm'],
				$i['newPmMin'],
				$i['refreshRate'],
				$i['totalMessages'],
				urldecode($i['admin']),
				urldecode($i['moderator']),
				urldecode($i['speaker']),
				$i['textAdverts'],
				$i['textAdvertsDesc'],
				$i['textAdvertsRate'],
				urldecode(str_replace("select,","",$i['userStatusMes'])),
				urldecode($i['news'])
			);

	}

}

/*
* update config settings
*
*/

function updateAdminConfig($_POST)
{
	// split smilie input field into 2 arrays
	$smilies_text = '';
	$smilies_images = '';

	$str = str_replace("\r\n"," ",$_POST['smilieHTML']);
	$str = str_replace(" = "," ",$str);

	$str = explode(" ", $str);

	for ( $i = 0; $i < count($str); $i++) 
	{
		$x = ($i%2) ? TRUE : FALSE;

		if($x === FALSE)
		{
			$smilies_text .= $str[$i].",";
		}
		else
		{
			$smilies_images .= $str[$i].",";
		}
	}

	// replace line breaks with commas
	$_POST['textAdvertsDesc'] = str_replace("\r\n",",",$_POST['textAdvertsDesc']);

	// update admin login password

	$incAdminPass = '';

	if(!empty($_POST['adminLogin']))
	{
		$incAdminPass = "adminLogin = '".md5($_POST['adminLogin'])."',";
	}

	// add date to db
	$sql = "UPDATE prochatrooms_config 
			SET	".$incAdminPass."
			avatars = '".$_POST['avatars']."',	 
			badwords = '".urlencode($_POST['badwords'])."',	 
			font_color = '".$_POST['font_color']."',	 
			font_size = '".$_POST['font_size']."',	 
			font_family = '".$_POST['font_family']."',	 
			sfx =  '".$_POST['sfx']."',
			smilies_text = '".$smilies_text."',
			smilies_images = '".$smilies_images."',	 
			gender = '".$_POST['gender']."',	 
			profileOn = '".$_POST['profileOn']."',	 
			profileUrl = '".$_POST['profileUrl']."',	 
			profileRef = '".$_POST['profileRef']."',	 
			privateOn = '".$_POST['privateOn']."',	 
			whisperOn = '".$_POST['whisperOn']."',	 
			webcamsOn = '".$_POST['webcamsOn']."',	 
			advertsOn = '".$_POST['advertsOn']."',	 
			enableUrl = '".$_POST['enableUrl']."',	 
			enableEmail = '".$_POST['enableEmail']."',
			enableShoutFilter = '".$_POST['enableShoutFilter']."',	 
			floodChat = '".$_POST['floodChat']."',	 	 
			newPm = '".$_POST['newPm']."',	
			newPmMin = '".$_POST['newPmMin']."',
			refreshRate = '".$_POST['refreshRate']."',	 
			totalMessages = '".$_POST['totalMessages']."',	 	 
			admin = '".urlencode($_POST['admin'])."',	 
			moderator = '".urlencode($_POST['moderator'])."',	 
			speaker = '".urlencode($_POST['speaker'])."',	 	 
			textAdverts = '".$_POST['textAdverts']."',	 
			textAdvertsDesc = '".$_POST['textAdvertsDesc']."',	 
			textAdvertsRate = '".$_POST['textAdvertsRate']."',	 
			userStatusMes = 'select,".urlencode($_POST['userStatusMes'])."',	  
			news = '".urlencode($_POST['news'])."'
			WHERE id = '1'";

	mysql_query($sql) 
	or die(mysql_error());

	return "Success! - Settings have been updated.";
}

/*
* get adverts
*
*/

function getAdminAdverts()
{
	$tmp=mysql_query("
		SELECT *   
		FROM prochatrooms_adverts
		ORDER BY id DESC
		") or die(mysql_error()); 

	$html  = '';
	$html .= '<tr><td colspan="2"><b>:: Add New Advert</b></td></tr>';
	$html .= '<tr><td colspan="2"><b>&nbsp;</b></td></tr>';
	$html .= '<tr><td width="10">&nbsp;</td><td>';
	$html .= 'Copy &amp; Paste your advertising code below,<br>';
	$html .= '<textarea name="text"></textarea><br>';
	$html .= '</td></tr>';
	$html .= '<tr><td>&nbsp;</td><td colspan="2"><input type="submit" name="update" value="Add Banner"><br><br></td></tr>';

	$html .= '</table>';
	$html .= '<br>';
	$html .= '<table>';

	$html .= '<tr class="header"><td colspan="2">:: Banner Adverts</td></tr>';
	$html .= '<tr class="header"><td width="50">ID</td><td>Advert</td></tr>';

	while($i = mysql_fetch_array($tmp)) 
	{
		$html .= '<tr><td>'.$i['id'].'</td><td>';
		$html .= stripslashes($i['text']).'<br>';
		$html .= '<input type="checkbox" name="del[]" value="'.$i['id'].'">Delete this advert?<br><br>';
		$html .= 'Displays: '.$i['displays'].'<br>';
		$html .= 'Clicked: '.$i['clicks'].'<br><br></td></tr>';
	}

	$html .= '<tr><td>&nbsp;</td><td colspan="2"><input type="submit" name="update" value="Update Banners"><br><br></td></tr>';

	return $html;
}

/*
* update adverts
*
*/

function updateAdminAdverts($_POST)
{
	if (isset($_POST['del']))
	{
		foreach ($_POST['del'] as $id)
		{
			$sql = "DELETE FROM prochatrooms_adverts
					WHERE id = '".$id."'";	 

			mysql_query($sql) 
			or die(mysql_error());
		}

		return "Success! - Advert(s) has been deleted.";

	}

	if (!empty($_POST['text']))
	{
		$sql = "INSERT INTO prochatrooms_adverts
			(
				text, 
				displays,
				clicks
			) 
			VALUES 
			(
				'".$_POST['text']."', 
				'0', 
				'0'
			)";

		mysql_query($sql) 
		or die(mysql_error()); 

		return "Success! - New advert has been added.";

	}

}

/*
* get games
*
*/

function getAdminGames()
{
	$tmp=mysql_query("
		SELECT *   
		FROM prochatrooms_games
		") or die(mysql_error()); 

	$html  = '<tr><td colspan="2"><b>:: Add New Game</b></td></tr>';
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	$html .= '<tr><td width="100">Title:</td><td><input type="text" name="title" value=""></td></tr>';
	$html .= '<tr><td>Description:</td><td><textarea name="desc"></textarea></td></tr>';
	$html .= '<tr><td>Thumbnail:</td><td><input type="file" name="thumb"></td></tr>';
	$html .= '<tr><td>.SWF File:</td><td><input type="file" name="swf"></td></tr>';
	$html .= '<tr><td>Width:</td><td><input type="text" name="width" value="400" size="3" maxlength="3"> pixels</td></tr>';
	$html .= '<tr><td>Height:</td><td><input type="text" name="height" value="300" size="3" maxlength="3"> pixels</td></tr>';
	$html .= '<tr><td>&nbsp;</td><td colspan="2"><input type="submit" name="update" value="Add Game"><br><br></td></tr>';

	$html .= '</table>';
	$html .= '<br>';
	$html .= '<table>';

	$html .= '<tr><td colspan="2"><b>:: Games Library</b></td></tr>';
	$html .= '<tr class="header"><td width="100">ID</td><td>Games</td></tr>';

	while($i = mysql_fetch_array($tmp)) 
	{
		$html .= '<tr><td>'.$i['game_ID'].'</td><td>';
		$html .= '<img style="cursor:pointer;" onclick="playGames('.$i['game_ID'].')" src=\'../plugins/games/images/'.$i['game_Thumb'].'\' width=\'70\' height=\'60\' align=\'top\' border=\'0\'>&nbsp;';
		$html .= urldecode($i['game_Desc']);
		$html .= '<br><input type="checkbox" name="del[]" value="'.$i['game_ID'].'">Delete this game?<br><br>';
		$html .= '</td></tr>';
	}

	$html .= '<tr><td>&nbsp;</td><td colspan="2"><input type="submit" name="update" value="Update Games"><br><br></td></tr>';

	return $html;
}

/*
* update games
*
*/

function updateAdminGames($_POST)
{
	if (isset($_POST['del']))
	{
		foreach ($_POST['del'] as $id)
		{
			$sql = "DELETE FROM prochatrooms_games
					WHERE game_ID = '".$id."'";	 

			mysql_query($sql) 
			or die(mysql_error());
		}

		return "Success! - Game(s) has been deleted.";

	}

	if (!empty($_POST['title']))
	{
		// do image upload
		$folder = "../plugins/games/images/";
		$img_name = $_FILES['thumb']['name'];
		$img_tmp_name = $_FILES['thumb']['tmp_name'];
		$img_ext = strtolower(substr($_FILES['thumb']['name'], -3));

		$allow_ext=array("jpg","gif","png","bmp");

		if(!in_array($img_ext,$allow_ext))
		{
			return " Error: [".$img_name."] - Image must be .jpg, .gif, .png or .bmp";
		}
		else
		{
			copy($img_tmp_name, $folder . "/" . $img_name) or die("Error: could not upload image");
		}
		
		// do .swf upload
		$folder = "../plugins/games/swf/";
		$swf_name = $_FILES['swf']['name'];
		$swf_tmp_name = $_FILES['swf']['tmp_name'];
		$swf_ext = strtolower(substr($_FILES['swf']['name'], -3));
		if ($swf_ext != 'swf')
		{
			return "Error: [".$swf_name."] - File is not a .swf";
		}
		else
		{
			copy($swf_tmp_name, $folder . "/" . $swf_name) or die("Error: could not upload .swf file");
		}

		$sql = "INSERT INTO prochatrooms_games
			(
				game_SwfFile, 
				game_Name ,
				game_Thumb,
				game_Width,
				game_Height, 
				game_Desc
			) 
			VALUES 
			(
				'".$_FILES['swf']['name']."', 
				'".urlencode($_POST['title'])."', 
				'".$_FILES['thumb']['name']."', 
				'".$_POST['width']."', 
				'".$_POST['height']."', 
				'".urlencode($_POST['desc'])."'
			)";

		mysql_query($sql) 
		or die(mysql_error()); 

		return "Success! - New game has been added.";

	}

}

/*
* get rooms
*
*/

function getAdminRooms($id)
{
	// return $id;

	$editRoom = '';

	if($id != '0')
	{
		$editRoom = "WHERE id='".$id."'";
	}

	$tmp=mysql_query("
		SELECT *   
		FROM prochatrooms_rooms
		".$editRoom."
		") or die(mysql_error()); 

	$html  = '';

	if($id == '0')
	{
		$html .= '<tr class="header"><td colspan="2">:: Add New Room</td></tr>';
		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
		$html .= '<input type="hidden" name="addRoom" value="1">';
		$html .= '<tr><td class="header" width="100">RoomName: </td><td><input type="text" name="room" value=""></td></tr>';
		$html .= '<tr><td class="header">Password: </td><td><input type="text" name="pass" value=""> (optional)</td></tr>';
		$html .= '<tr><td class="header">Background: </td><td><input type="text" name="bg" value=""> (upload image to folder <i>/images/</i> or enter <i>url</i> to image)</td></tr>';
		$html .= '<tr><td class="header">Description: </td><td><textarea name="desc"></textarea></td></tr>';

		$html .= '<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Add Room"></td></tr>';

		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';

		$html .= '</table>';
		$html .= '<br>';
		$html .= '<table>';

		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
		$html .= '<tr class="header"><td colspan="2">:: Room Details</td></tr>';
		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	}

	while($i = mysql_fetch_array($tmp)) 
	{
		if($id != '0')
		{
			$html .= '<tr class="header"><td colspan="2">:: Edit Room</td></tr>';
			$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
			$html .= '<input type="hidden" name="updateRoom" value="'.$i['id'].'">';
			$html .= '<tr><td class="header" width="100">RoomID: </td><td><input type="text" name="roomID" value="'.$i['id'].'"> (at least 1 room must have a roomID of <i>1</i>)</td></tr>';
			$html .= '<tr><td class="header">RoomName: </td><td><input type="text" name="room" value="'.urldecode($i['roomname']).'"></td></tr>';
			$html .= '<tr><td class="header">Password: </td><td><input type="text" name="pass" value="'.$password.'"> (leave blank if no change)</td></tr>';
			$html .= '<tr><td class="header">Background: </td><td><input type="text" name="bg" value="'.$i['roombg'].'"> (upload image to folder <i>/images/</i> or enter <i>url</i> to image)</td></tr>';
			$html .= '<tr><td class="header">Description: </td><td><textarea name="desc">'.urldecode($i['roomdesc']).'</textarea></td></tr>';
			$html .= '<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update Rooms"></td></tr>';
		}

		if($id == '0')
		{
			$password = 'No';

			if($i['roompassword'])
			{
				$password = 'Yes';
			}

			$html .= '<tr><td class="header" width="100">RoomID: </td><td>'.$i['id'].'</td></tr>';
			$html .= '<tr><td class="header">RoomName: </td><td>'.urldecode($i['roomname']).'</td></tr>';
			$html .= '<tr><td class="header">OwnerID: </td><td>'.$i['roomowner'].'</td></tr>';
			$html .= '<tr><td class="header">Password: </td><td>'.$password.'</td></tr>';
			$html .= '<tr><td class="header">Background: </td><td>'.$i['roombg'].'</td></tr>';
			$html .= '<tr><td class="header">Description: </td><td>'.urldecode($i['roomdesc']).'</td></tr>';

			$html .= '<tr><td>&nbsp;</td><td><input type="checkbox" name="edit" value="'.$i['id'].'">Edit this room?</td></tr>';
			$html .= '<tr><td>&nbsp;</td><td><input type="checkbox" name="del[]" value="'.$i['id'].'">Delete this room?</td></tr>';

			$html .= '<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update Rooms"></td></tr>';

			$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
		}
	}

	return $html;
}

/*
* update rooms
*
*/

function updateAdminRooms($_POST)
{
	if (isset($_POST['del']))
	{
		foreach ($_POST['del'] as $id)
		{
			$sql = "DELETE FROM prochatrooms_rooms
					WHERE id = '".$id."'";	 

			mysql_query($sql) 
			or die(mysql_error());
		}

		return "Success! - Room(s) has been deleted.";

	}

	if (!empty($_POST['room']))
	{
		if(!empty($_POST['updateRoom']))
		{
			if(!empty($_POST['pass']))
			{
				$updatePass = "roompassword = '".md5($_POST['pass'])."',";
			}

			$sql = "UPDATE prochatrooms_rooms
					SET id ='".$_POST['roomID']."',
					roomname = '".urlencode($_POST['room'])."', 
					roomowner = '1',
					".$updatePass."
					roomcreated = '0', 
					roombg = '".$_POST['bg']."',
					roomdesc = '".urlencode($_POST['desc'])."'
					WHERE id = '".$_POST['updateRoom']."'
					";

			mysql_query($sql) 
			or die(mysql_error()); 

			return "Success! - Room has been updated.";
		}

		if(!empty($_POST['addRoom']))
		{
			$roomID = date("U").rand(1,99999);

			if(!empty($_POST['pass']))
			{
				$roomPass = md5($_POST['pass']);
			}

			$sql = "INSERT INTO prochatrooms_rooms
				(
					id,
					roomname, 
					roomowner,
					roompassword,
					roomcreated, 
					roombg,
					roomdesc 
				) 
				VALUES 
				(
					'".$roomID ."',
					'".urlencode($_POST['room'])."', 
					'1', 
					'".$roomPass."', 
					'0', 
					'".$_POST['bg']."', 
					'".urlencode($_POST['desc'])."' 
				)";

			mysql_query($sql) 
			or die(mysql_error()); 

			return "Success! - New room has been added.";
		}

	}

}

/*
* get groups
*
*/ 


function getAdminGroups()
{
	$tmp=mysql_query("
		SELECT *  
		FROM prochatrooms_group
		ORDER BY id ASC
		") or die(mysql_error()); 

	$html  = '';
	$html .= '<tr><td colspan="8"><b>:: Add New Group</b></td></tr>';
	$html .= '<tr><td colspan="8"><b>&nbsp;</b></td></tr>';
	$html .= '<tr align="center">';
	$html .= '<td>Group ID</td>';
	$html .= '<td>Group Name</td>';
	$html .= '<td>Allow Chat</td>';
	$html .= '<td>Private Chat</td>';
	$html .= '<td>Show Webcam</td>';
	$html .= '<td>View Webcams</td>';
	$html .= '<td>Create Room</td>';
	$html .= '<td>&nbsp;</td>';
	$html .= '<td>&nbsp;</td>';
	$html .= '</tr>';
	$html .= '<tr align="center">';
	$html .= '<td><input type="text" name="id" value="" size="3"></td>';
	$html .= '<td><input type="text" name="groupName" value=""></td>';
	$html .= '<td>'.showSelectedID('groupChat','0').'</td>';
	$html .= '<td>'.showSelectedID('groupPChat','0').'</td>';
	$html .= '<td>'.showSelectedID('groupCams','0').'</td>';
	$html .= '<td>'.showSelectedID('groupWatch','0').'</td>';
	$html .= '<td>'.showSelectedID('groupRooms','0').'</td>';
	$html .= '<td><input type="submit" name="addGroup" value="Add Group"></td>';
	$html .= '<td>&nbsp;</td>';
	$html .= '</tr>';
	$html .= '<tr><td colspan="8"><b>&nbsp;</b></td></tr>';
	$html .= '<tr><td colspan="8"><hr></td></tr>';
	$html .= '<tr><td colspan="8"><b>:: User Groups</b></td></tr>';
	$html .= '<tr><td colspan="8"><b>&nbsp;</b></td></tr>';
	$html .= '<tr align="center">';
	$html .= '<td>Group ID</td>';
	$html .= '<td>Group Name</td>';
	$html .= '<td>Allow Chat</td>';
	$html .= '<td>Private Chat</td>';
	$html .= '<td>Show Webcam</td>';
	$html .= '<td>View Webcams</td>';
	$html .= '<td>Create Room</td>';
	$html .= '<td>Delete</td>';
	$html .= '</tr>';

	while($i = mysql_fetch_array($tmp)) 
	{
		$html .= '<tr align="center">';
		$html .= '<td>'.$i['id'].'</td>';
		$html .= '<td>'.urldecode($i['groupName']).'</td>';
		$html .= '<td>'.$i['groupChat'].'</td>';
		$html .= '<td>'.$i['groupPChat'].'</td>';
		$html .= '<td>'.$i['groupCams'].'</td>';
		$html .= '<td>'.$i['groupWatch'].'</td>';
		$html .= '<td>'.$i['groupRooms'].'</td>';
		$html .= '<td align="center"><input type="checkbox" name="del[]" value="'.$i['id'].'"></td>';
		$html .= '</tr>';
	}

	$html .= '<tr><td colspan="6">&nbsp;</td><td align="right">Select All?<input onclick="return checkUncheckAll_del(this.form);" type="checkbox" name="selectAll" value=""></td><td align="center"><input type="submit" name="update" value="Update Groups"><br><br></td></tr>';

	return $html;
}

/*
* update groups
*
*/ 

function updateAdminGroups($_POST)
{
	if (!empty($_POST['groupName']))
	{
		$sql = "INSERT INTO prochatrooms_group
			(
				id, 
				groupName,
				groupChat,
				groupPChat,
				groupCams,
				groupWatch,
				groupRooms
			) 
			VALUES 
			(
				'".$_POST['id']."', 
				'".urlencode($_POST['groupName'])."', 
				'".$_POST['groupChat']."', 
				'".$_POST['groupPChat']."', 
				'".$_POST['groupCams']."', 
				'".$_POST['groupWatch']."', 
				'".$_POST['groupRooms']."'
			)";

		mysql_query($sql) 
		or die(mysql_error()); 

		return "Success! - New group has been added.";

	}

	if (isset($_POST['del']))
	{
		foreach ($_POST['del'] as $id)
		{
			$sql = "DELETE FROM prochatrooms_group
					WHERE id = '".$id."'";	 

			mysql_query($sql) 
			or die(mysql_error());
		}

		return "Success! - Group(s) has been deleted.";

	}

}

/*
* get bans
*
*/

function getAdminBans()
{
	$tmp=mysql_query("
		SELECT id, username, userIP   
		FROM prochatrooms_users
		WHERE ban = '1'
		") or die(mysql_error()); 

	$html  = '';
	$html .= '<tr><td colspan="4"><b>:: Add New Ban</b></td></tr>';
	$html .= '<tr><td colspan="4"><b>&nbsp;</b></td></tr>';
	$html .= '<tr><td width="100">Username:</td><td colspan="3"><input type="text" name="banUser" value=""></td></tr>';
	$html .= '<tr><td>or, UserIP:</td><td colspan="3"><input type="text" name="banIP" value=""></td></tr>';
	$html .= '<tr><td>&nbsp;</td><td colspan="3"><input type="submit" name="update" value="Add Ban"><br><br></td></tr>';

	$html .= '</table>';
	$html .= '<br>';
	$html .= '<table>';

	$html .= '<tr class="header"><td colspan="4">:: Banned Members</td></tr>';

	if(mysql_num_rows($tmp))
	{
		$html .= '<tr><td colspan="4">&nbsp;</td></tr>';
		$html .= '<tr class="header"><td width="100">UserID</td><td width="100">Username</td><td width="100">UserIP</td><td align="center" width="100">Remove Ban</td></tr>';
	}

	if(!mysql_num_rows($tmp))
	{
		$html .= '<tr><td colspan="4">no results found ...</td></tr>';
	}

	while($i = mysql_fetch_array($tmp)) 
	{
		$html .= '<tr>';
		$html .= '<td>'.$i['id'].'</td>';
		$html .= '<td>'.urldecode($i['username']).'</td>';
		$html .= '<td>'.$i['userIP'].'</td>';
		$html .= '<td align="center"><input type="checkbox" name="del[]" value="'.$i['id'].'"></td>';
		$html .= '</tr>';
	}

	if(mysql_num_rows($tmp))
	{
		$html .= '<tr><td colspan="2">&nbsp;</td><td align="right">Select All Bans?<input onclick="return checkUncheckAll_del(this.form);" type="checkbox" name="selectAll" value=""></td><td align="center"><input type="submit" name="update" value="Update Bans"><br><br></td></tr>';
	}

	return $html;
}

/*
* update bans
*
*/

function updateAdminBans($_POST)
{
	if (isset($_POST['del']))
	{
		foreach ($_POST['del'] as $id)
		{
			$sql = "UPDATE prochatrooms_users
					SET ban = ''
					WHERE id = '".$id."'";	 

			mysql_query($sql) 
			or die(mysql_error());
		}

		return "Success! - User ban(s) has been updated.";

	}

	if (!empty($_POST['banUser']) || !empty($_POST['banIP']))
	{
		$sql = "UPDATE prochatrooms_users
				SET ban = '1'
				WHERE username = '".urlencode($_POST['banUser'])."'
				OR userIP = '".$_POST['banIP']."'";	 

		mysql_query($sql) 
		or die(mysql_error()); 

		return "Success! - New ban has been added.";

	}

}

/*
* get users
*
*/

function getAdminUsers($findUser)
{
	if($findUser)
	{
		$findUser = "%".urlencode($findUser)."%";
	}

	$tmp=mysql_query("
		SELECT *   
		FROM prochatrooms_users
		WHERE username LIKE '".$findUser."'
		AND username !='' 
		") or die(mysql_error()); 

	$html  = '';
	$html .= '<tr><td colspan="15"><b>:: Search All Users</b></td></tr>';
	$html .= '<tr><td colspan="15"><b>&nbsp;</b></td></tr>';
	$html .= '<tr><td width="100">Username:</td><td colspan="14"><input type="text" name="findUser" value="">&nbsp;<input type="submit" name="submit" value="Find!"> (enter a partial name for multiple results)</td></tr>';
	$html .= '<tr><td colspan="15"><b>&nbsp;</b></td></tr>';

	$html .= '</table>';
	$html .= '<br>';
	$html .= '<table>';

	$html .= '<tr class="header"><td colspan="15">:: User Details</td></tr>';

	if(mysql_num_rows($tmp))
	{
		$html .= '<tr><td colspan="15">&nbsp;</td></tr>';
		$html .= '<tr><td colspan="15">IMPORTANT: When editing users details, leave all <i>Password</i> fields blank if not changed</td></tr>';
		$html .= '<tr><td colspan="15">&nbsp;</td></tr>';

		$html .= '<tr class="header">';
		$html .= '<td align="center">Avatar</td>';
		$html .= '<td align="center">UserID</td>';
		$html .= '<td>Username</td>';
		$html .= '<td>Password</td>';
		$html .= '<td>Email Address</td>';
		$html .= '<td>UserIP</td>';
		$html .= '<td align="center">GroupID</td>';
		$html .= '<td align="center">RoomID</td>';
		$html .= '<td align="center">Online</td>';
		$html .= '<td align="center">eCredits Left</td>';
		$html .= '<td align="center">eCredits Earned</td>';
		$html .= '<td align="center">Points</td>';
		$html .= '<td align="center">Enabled</td>';
		$html .= '<td align="center">Update</td>';
		$html .= '<td align="center">Delete</td>';
		$html .= '</tr>';
	}

	if(!mysql_num_rows($tmp))
	{
		$html .= '<tr><td colspan="15">no results found, search for a username above ...</td></tr>';
	}

	while($i = mysql_fetch_array($tmp)) 
	{
		$html .= '<tr>';
		$html .= '<td align="center"><img src="../avatars/'.$i['avatar'].'"></td>';
		$html .= '<td align="center">'.$i['id'].'</td>';
		$html .= '<td>'.urldecode($i['username']).'</td>';
		$html .= '<td><input type="text" name="uPass" value=""></td>';
		$html .= '<td><input type="text" name="uEmail" value="'.$i['email'].'"></td>';
		$html .= '<td>'.$i['userIP'].'</td>';
		$html .= '<td align="center"><input size="3" type="text" name="uGroup" value="'.$i['userGroup'].'"></td>';
		$html .= '<td align="center">'.$i['room'].'</td>';
		$html .= '<td align="center">'.$i['online'].'</td>';
		$html .= '<td align="center"><input size="6" type="text" name="ueCredits" value="'.$i['eCredits'].'"></td>';
		$html .= '<td align="center"><input size="6" type="text" name="ueCreditsEarned" value="'.$i['eCreditsEarned'].'"></td>';
		$html .= '<td align="center"><input size="6" type="text" name="uPoints" value="'.$i['points'].'"></td>';
		$html .= '<td align="center"><input size="1" type="text" name="uEnabled" value="'.$i['enabled'].'"></td>';
		$html .= '<td align="center"><input type="checkbox" name="updateUser[]" value="'.$i['id'].'"></td>';
		$html .= '<td align="center"><input type="checkbox" name="del[]" value="'.$i['id'].'"></td>';
		$html .= '</tr>';
	}

	if(mysql_num_rows($tmp))
	{
		$html .= '<tr><td colspan="13">&nbsp;</td><td colspan="2" align="center"><input type="submit" name="update" value="Submit"><br><br></td></tr>';
	}

	$html .= '</table>';
	$html .= '<br>';
	$html .= '<table>';

	$html .= '<tr><td>';
	$html .= '<b>:: Display Online Users:</b>';
	$html .= '<br>';
	$html .= 'To show a list of online users in your chat room, copy and paste the code below into your web page. Adjust the width and height values to suit your web page. Replace <font color="red">YOURSITE.com</font> with your own domain name.<br><br>';
	$html .= '<b>Code:</b><br><br>';
	$html .= '<div>';
	$html .= '&#60;iframe src="http://www.<font color="red">YOURSITE.com</font>/prochatrooms/templates/default/online.php" width="200" height="400" border="0">&#60;/iframe>';
	$html .= '</div>';
	$html .= '<br>';
	$html .= '</td></tr>';

	return $html;
}

/*
* update users
*
*/

function updateAdminUsers($_POST)
{
	if (isset($_POST['del']))
	{
		foreach ($_POST['del'] as $id)
		{
			$sql = "DELETE FROM prochatrooms_users
					WHERE id = '".$id."'";	 

			mysql_query($sql) 
			or die(mysql_error());

			$sql = "DELETE FROM prochatrooms_profiles
					WHERE id = '".$id."'";	 

			mysql_query($sql) 
			or die(mysql_error());
		}

		return "Success! - User(s) has been deleted.";

	}

	if (isset($_POST['updateUser']))
	{
		foreach ($_POST['updateUser'] as $id)
		{
			$addPass = '';

			if(!empty($_POST['uPass']))
			{
				$addPass = " password = '".md5($_POST['uPass'])."', ";
			}

			$sql = "UPDATE prochatrooms_users
					SET ".$addPass." 
					email = '".$_POST['uEmail']."',
					eCredits = '".$_POST['ueCredits']."',
					eCreditsEarned = '".$_POST['ueCreditsEarned']."',
					points = '".$_POST['uPoints']."',
					enabled = '".$_POST['uEnabled']."',
					userGroup = '".$_POST['uGroup']."'
					WHERE id = '".$id."'";	 

			mysql_query($sql) 
			or die(mysql_error());
		}

		return "Success! - User(s) has been updated.";

	}

}

/*
* get profiles
*
*/

function getAdminProfiles($findUser)
{
	$tmp=mysql_query("
		SELECT *   
		FROM prochatrooms_profiles
		WHERE username = '".$findUser."'
		") or die(mysql_error()); 

	$html  = '';
	$html .= '<tr><td colspan="2"><b>:: Search All Profiles</b></td></tr>';
	$html .= '<tr><td colspan="2"><b>&nbsp;</b></td></tr>';
	$html .= '<tr><td width="100">Username:</td><td><input type="text" name="findUser" value="">&nbsp;<input type="submit" name="submit" value="Find!"> (enter full username)</td></tr>';
	$html .= '<tr><td colspan="2"><b>&nbsp;</b></td></tr>';

	$html .= '</table>';
	$html .= '<br>';
	$html .= '<table>';

	$html .= '<tr class="header"><td colspan="2">:: User Details</td></tr>';

	if(!mysql_num_rows($tmp))
	{
		$html .= '<tr><td colspan="2">no results found, search for a username above ...</td></tr>';
	}

	while($i = mysql_fetch_array($tmp)) 
	{
		$html .= '<input type="hidden" name="updateUser" value="'.$i['id'].'">';

		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
		$html .= '<tr><td>Username</td><td>'.urldecode($i['username']).'</td></tr>';
		$html .= '<tr><td>Real Name</td><td><input type="text" name="real_name" value="'.$i['real_name'].'"></td></tr>';
		$html .= '<tr><td>Age</td><td><select name="age">'.getUserAge($i['age']).'</select></td></tr>';
		$html .= '<tr><td>Gender</td><td><select name="gender">'.getUserGenders($i['gender']).'</select></td></tr>';
		$html .= '<tr><td>Photo</td><td><a href="../profiles/view.php?id='.$i['id'].'" target="_blank"><img src="../profiles/view.php?id='.$i['id'].'" height="100" width="120" border="0"></a></td></tr>';
		$html .= '<tr><td>&nbsp;</td><td><input type="checkbox" name="del" value="'.$i['id'].'"> Delete Image?</td></tr>';
		$html .= '<tr><td>Location</td><td><input type="text" name="location" value="'.urldecode($i['location']).'"></td></tr>';
		$html .= '<tr><td>Hobbies</td><td><input type="text" name="hobbies" value="'.urldecode($i['hobbies']).'"></td></tr>';
		$html .= '<tr><td>About Me</td><td><textarea name="aboutme">'.urldecode($i['aboutme']).'</textarea></td></tr>';
	}

	if(mysql_num_rows($tmp))
	{
		$html .= '<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update User"><br><br></td></tr>';
	}

	return $html;
}

/*
* update profiles
*
*/

function updateAdminProfiles($_POST)
{
	if (isset($_POST['updateUser']))
	{
		$delImage = '';

		if(!empty($_POST['del']))
		{
			$delImage = " photo = '', ";
		}

		$sql = "UPDATE prochatrooms_profiles
				SET ".$delImage." 
				real_name = '".urlencode($_POST['real_name'])."',
				age = '".$_POST['age']."',
				gender = '".$_POST['gender']."',
				location = '".urlencode($_POST['location'])."',
				hobbies = '".urlencode($_POST['hobbies'])."',
				aboutme = '".urlencode($_POST['aboutme'])."' 
				WHERE id = '".$_POST['updateUser']."'";	 

		mysql_query($sql) 
		or die(mysql_error());

		return "Success! - User profile has been updated.";

	}

}

/*
* get transcripts
*
*/

function getAdminTranscripts($findUser,$findRoom,$page)
{
	$results = '100';

	$prevPage = $page - $results;

	if($prevPage < 0)
	{
		$prevPage = 0;
	}

	$nextPage = $page + $results;

	if(!$findRoom)
	{
		$findRoom = '1';
	}

	if(!empty($findUser))
	{
		$findUser = "OR username = '".urlencode($findUser)."' OR tousername = '".urlencode($findUser)."'";
	}

	$tmp=mysql_query("SELECT *   
				FROM prochatrooms_message
				WHERE room = '".$findRoom."'
				".$findUser." 
				ORDER by id DESC 
				LIMIT ".$page.",".$results) 
				or die(mysql_error()); 

	$html  = '';
	$html .= '<tr><td colspan="6"><b>:: Select Room</b></td></tr>';
	$html .= '<tr><td colspan="6"><b>&nbsp;</b></td></tr>';
	$html .= '<tr><td width="100">RoomID:</td><td colspan="5"><input type="text" name="room" value="">&nbsp;<input type="submit" name="submit" value="Find!"></td></tr>';
	$html .= '<tr><td colspan="6"><b>&nbsp;</b></td></tr>';
	$html .= '<tr><td colspan="6"><b>:: or, Search Username</b></td></tr>';
	$html .= '<tr><td colspan="6"><b>&nbsp;</b></td></tr>';
	$html .= '<tr><td width="100">Username:</td><td colspan="5"><input type="text" name="user" value="">&nbsp;<input type="submit" name="submit" value="Find!"> (enter full username)</td></tr>';
	$html .= '<tr><td colspan="6"><b>&nbsp;</b></td></tr>';

	$html .= '</table>';
	$html .= '<br>';
	$html .= '<table>';

	$html .= '<tr class="header"><td colspan="6">:: Message History</td></tr>';
	$html .= '<tr><td colspan="6">&nbsp;</td></tr>';

	if(!mysql_num_rows($tmp))
	{
		$html .= '<tr><td colspan="6">no results found, select a room above...</td></tr>';
	}
	else
	{
		$html .= '<tr class="header"><td>ID</td><td>RoomID</td><td>Time</td><td>Username</td><td>To</td><td>Message</td></tr>';
	}

	while($i = mysql_fetch_array($tmp)) 
	{
		if($i['room'] != '0')
		{
			$i['message'] = urldecode($i['message']);

			$i['message'] = str_replace("[u]","",$i['message']);
			$i['message'] = str_replace("[/u]","",$i['message']);
			$i['message'] = str_replace("[i]","",$i['message']);
			$i['message'] = str_replace("[/i]","",$i['message']);
			$i['message'] = str_replace("[b]","",$i['message']);
			$i['message'] = str_replace("[/b]","",$i['message']);

			// explode message
			$i['message'] = explode("|", urldecode($i['message']));

			// format message
			$i['message'][4] = str_replace("plugins/share","../plugins/share",$i['message'][4]);
			$i['message'][4] = str_replace("[[","<",$i['message'][4]);
			$i['message'][4] = str_replace("]]",">",$i['message'][4]);

			$message = "<span style=\"color:".$i['message'][1].";font-size:".$i['message'][2].";font-family:".$i['message'][3].";\">".html_entity_decode(stripslashes($i['message'][4]))."</span>";

			// add <pre> if required
			// used for formatting multi-line messages.
			if($i['message'][6]=='1')
			{
				$message = "<pre>".$message."</pre>";
			}

			$html .= '<tr>';
			$html .= '<td width="50">'.$i['id'].'</td>';
			$html .= '<td width="100">'.$i['room'].'</td>';
			$html .= '<td width="100">'.date("H:i:s",$i['messtime']).'</td>';
			$html .= '<td width="100">'.urldecode($i['username']).'</td>';
			$html .= '<td width="100">'.urldecode($i['tousername']).'</td>';
			$html .= '<td>'.$message.'</td>';
			$html .= '</tr>';
		}
	}

	if(mysql_num_rows($tmp))
	{
		$html .= '<tr><td colspan="6">&nbsp;</td></tr>';
		$html .= '<tr><td colspan="6" align="center">';
		$html .= '<a href="?option=transcripts&room='.$findRoom.'&user='.$findUser.'&page='.$prevPage.'"><<< Prev</a>';
		$html .= ' | ';
		$html .= '<a href="?option=transcripts&room='.$findRoom.'&user='.$findUser.'&page='.$nextPage.'">Next >>></a>';
		$html .= '</td></tr>';
	}

	return $html;
}

/*
* get email
*
*/

function getAdminGroupEmail()
{
	$_POST['totalSend'] += $_POST['amount'];

	if(empty($_POST['amount']))
	{
		$_POST['amount'] = '1';
		$_POST['rateOfRefresh'] = '10';
	}

	$html  = '';
	$html .= '<input type="hidden" name="totalSend" value="'.$_POST['totalSend'].'">';

	$html .= '<tr><td colspan="2"><b>:: Email Settings</b></td></tr>';
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	$html .= '<tr><td colspan="2">HINT: If you do not own your web server, set <i>email speed</i> to low values.</td></tr>';
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	$html .= '<tr><td width="100">Email Speed:</td><td><input size="4" type="text" name="amount" value="'.$_POST['amount'].'"> email(s) every <input size="4" type="text" name="rateOfRefresh" value="'.$_POST['rateOfRefresh'].'">&nbsp;second(s)</td></tr>';
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';

	$html .= '</table>';
	$html .= '<br>';
	$html .= '<table>';

	$html .= '<tr><td colspan="2"><b>:: Send Email</b></td></tr>';
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	$html .= '<tr><td width="100">Send To:</td><td><select name="group"><option value="1">All Members</option></select></td></tr>';
	$html .= '<tr><td>or, Username:</td><td><input type="text" name="toUser" value="'.$_POST['toUser'].'"></td></tr>';
	$html .= '<tr><td>Subject:</td><td><input type="text" name="subject" value="'.$_POST['subject'].'"></td></tr>';
	$html .= '<tr><td>Message:</td><td><textarea name="message">'.$_POST['message'].'</textarea></td></tr>';
	$html .= '<tr><td>&nbsp;</td><td><input type="submit" name="send" value="Send Email"></td></tr>';

	$html .= '<tr><td colspan="2"><b>&nbsp;</b></td></tr>';

	return $html;
}

/*
* send email
*
*/

function sendAdminGroupEmail($_POST)
{
	// include files
	include("../includes/config.php");

	// create headers
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1\n";
	$headers .= "X-Priority: 3\n";
	$headers .= "X-MSMail-Priority: Normal\n";
	$headers .= "X-Mailer: php\n";
	$headers .= "From: \"" . $CONFIG['chatroomName'] . "\" <" . $CONFIG['chatroomEmail'] . ">\n";

	if($_POST['group'] == '1')
	{
		// all members
		$sendMailTo = "WHERE email != ''";	
	}

	if(!empty($_POST['toUser']))
	{
		// to username
		$sendMailTo = "WHERE username = '".$_POST['toUser']."'";
	}

	if(empty($_POST['totalSend']))
	{
		$_POST['totalSend'] = '0';
	}

	if(empty($_POST['amount']))
	{
		$_POST['amount'] = '0';
	}

	$tmp=mysql_query("SELECT *   
				FROM prochatrooms_users
				".$sendMailTo."
				ORDER by id ASC
				LIMIT ".$_POST['totalSend'].",".$_POST['amount']) 
				or die(mysql_error()); 

	$result = '0';
	$html = '';

	while($i = mysql_fetch_array($tmp)) 
	{
		// send email
		mail($i['email'], $_POST['subject'], $_POST['message'], $headers);

		$html .= "Email sent to: ".$i['email']."<br>";

		$result = '1';
	}

	if($result == 0)
	{
		$_POST = '';
		$html = "Email(s) have been sent.";
	}

	return $html;
}

/*
* get database
*
*/

function getAdminDatabase()
{
	$html  = '';
	$html .= '<tr><td colspan="2"><b>:: Database Maintenance</b></td></tr>';
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	$html .= '<tr><td colspan="2">IMPORTANT: <br><br>Any changes made below cannot be undone. <br>If in doubt, you are advised to backup your MySQL database first.</td></tr>';
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';

	$html .= '</table>';
	$html .= '<br>';
	$html .= '<table>';
	$html .= '<tr><td colspan="2"><b>:: Database Tables</b></td></tr>';
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';

	if(file_exists("../plugins/adverts/index.php"))
	{
		// adverts table
		$tmp=mysql_query("SELECT id FROM prochatrooms_adverts") or die(mysql_error()); 
		$totalRows = mysql_num_rows($tmp);

		$html .= '<tr><td width="100">MySQL Table:</td><td>prochatrooms_adverts</td></tr>';
		$html .= '<tr><td>Total Entries:</td><td>'.$totalRows.'</td></tr>';
		$html .= '<tr><td>Truncate:</td><td><input type="checkbox" name="prochatrooms_adverts[]" value="TRUNCATE"></td></tr>';
		$html .= '<tr><td>Optimize:</td><td><input type="checkbox" name="prochatrooms_adverts[]" value="OPTIMIZE"></td></tr>';
		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	}

	if(file_exists("../plugins/games/index.php"))
	{
		// games table
		$tmp=mysql_query("SELECT game_ID FROM prochatrooms_games") or die(mysql_error()); 
		$totalRows = mysql_num_rows($tmp);

		$html .= '<tr><td>MySQL Table:</td><td>prochatrooms_games</td></tr>';
		$html .= '<tr><td>Total Entries:</td><td>'.$totalRows.'</td></tr>';
		$html .= '<tr><td>Truncate:</td><td><input type="checkbox" name="prochatrooms_games[]" value="TRUNCATE"></td></tr>';
		$html .= '<tr><td>Optimize:</td><td><input type="checkbox" name="prochatrooms_games[]" value="OPTIMIZE"></td></tr>';	
		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	}

	// message table
	$tmp=mysql_query("SELECT id FROM prochatrooms_message") or die(mysql_error()); 
	$totalRows = mysql_num_rows($tmp);

	$html .= '<tr><td>MySQL Table:</td><td>prochatrooms_message</td></tr>';
	$html .= '<tr><td>Total Entries:</td><td>'.$totalRows.'</td></tr>';
	$html .= '<tr><td>Truncate:</td><td><input type="checkbox" name="prochatrooms_message[]" value="TRUNCATE"></td></tr>';
	$html .= '<tr><td>Optimize:</td><td><input type="checkbox" name="prochatrooms_message[]" value="OPTIMIZE"></td></tr>';	
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';

	if(file_exists("../plugins/moderated_chat/index.php"))
	{
		// moderated table
		$tmp=mysql_query("SELECT id FROM prochatrooms_moderated") or die(mysql_error()); 
		$totalRows = mysql_num_rows($tmp);

		$html .= '<tr><td>MySQL Table:</td><td>prochatrooms_moderated</td></tr>';
		$html .= '<tr><td>Total Entries:</td><td>'.$totalRows.'</td></tr>';
		$html .= '<tr><td>Truncate:</td><td><input type="checkbox" name="prochatrooms_moderated[]" value="TRUNCATE"></td></tr>';
		$html .= '<tr><td>Optimize:</td><td><input type="checkbox" name="prochatrooms_moderated[]" value="OPTIMIZE"></td></tr>';	
		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	}

	if(file_exists("../plugins/one2one/index.html"))
	{
		// one2one
		$tmp=mysql_query("SELECT id FROM prochatrooms_one2one") or die(mysql_error()); 
		$totalRows = mysql_num_rows($tmp);

		$html .= '<tr><td>MySQL Table:</td><td>prochatrooms_one2one</td></tr>';
		$html .= '<tr><td>Total Entries:</td><td>'.$totalRows.'</td></tr>';
		$html .= '<tr><td>Truncate:</td><td><input type="checkbox" name="prochatrooms_one2one[]" value="TRUNCATE"></td></tr>';
		$html .= '<tr><td>Optimize:</td><td><input type="checkbox" name="prochatrooms_one2one[]" value="OPTIMIZE"></td></tr>';	
		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	}

	// rooms table
	$tmp=mysql_query("SELECT id FROM prochatrooms_rooms") or die(mysql_error()); 
	$totalRows = mysql_num_rows($tmp);

	$html .= '<tr><td>MySQL Table:</td><td>prochatrooms_rooms</td></tr>';
	$html .= '<tr><td>Total Entries:</td><td>'.$totalRows.'</td></tr>';
	$html .= '<tr><td>Truncate:</td><td><input type="checkbox" name="prochatrooms_rooms[]" value="TRUNCATE"></td></tr>';
	$html .= '<tr><td>Optimize:</td><td><input type="checkbox" name="prochatrooms_rooms[]" value="OPTIMIZE"></td></tr>';	
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';

	if(file_exists("../plugins/share/index.php"))
	{
		// share table
		$tmp=mysql_query("SELECT id FROM prochatrooms_share") or die(mysql_error()); 
		$totalRows = mysql_num_rows($tmp);

		$html .= '<tr><td>MySQL Table:</td><td>prochatrooms_share</td></tr>';
		$html .= '<tr><td>Total Entries:</td><td>'.$totalRows.'</td></tr>';
		$html .= '<tr><td>Truncate:</td><td><input type="checkbox" name="prochatrooms_share[]" value="TRUNCATE"></td></tr>';
		$html .= '<tr><td>Optimize:</td><td><input type="checkbox" name="prochatrooms_share[]" value="OPTIMIZE"></td></tr>';	
		$html .= '<tr><td colspan="2">&nbsp;</td></tr>';
	}

	// users table
	$tmp=mysql_query("SELECT id FROM prochatrooms_users") or die(mysql_error()); 
	$totalRows = mysql_num_rows($tmp);

	$html .= '<tr><td>MySQL Table:</td><td>prochatrooms_users</td></tr>';
	$html .= '<tr><td>Total Entries:</td><td>'.$totalRows.'</td></tr>';
	$html .= '<tr><td>Truncate:</td><td><input type="checkbox" name="prochatrooms_users[]" value="TRUNCATE"></td></tr>';
	$html .= '<tr><td>Optimize:</td><td><input type="checkbox" name="prochatrooms_users[]" value="OPTIMIZE"></td></tr>';	
	$html .= '<tr><td colspan="2">&nbsp;</td></tr>';

	$html .= '<tr><td>&nbsp;</td><td><input type="submit" name="send" value="Update Database"></td></tr>';

	return $html;
}

/*
* update database
*
*/

function updateAdminDatabase($_POST)
{
	if (!empty($_POST['prochatrooms_adverts']))
	{
		foreach ($_POST['prochatrooms_adverts'] as $id)
		{
			$sql = $id." TABLE prochatrooms_adverts";	 
			mysql_query($sql) or die(mysql_error());
		}
	}

	if (!empty($_POST['prochatrooms_games']))
	{
		foreach ($_POST['prochatrooms_games'] as $id)
		{
			$sql = $id." TABLE prochatrooms_games";	 
			mysql_query($sql) or die(mysql_error());
		}
	}

	if (!empty($_POST['prochatrooms_message']))
	{
		foreach ($_POST['prochatrooms_message'] as $id)
		{
			$sql = $id." TABLE prochatrooms_message";	 
			mysql_query($sql) or die(mysql_error());
		}
	}

	if (!empty($_POST['prochatrooms_moderated']))
	{
		foreach ($_POST['prochatrooms_moderated'] as $id)
		{
			$sql = $id." TABLE prochatrooms_moderated";	 
			mysql_query($sql) or die(mysql_error());
		}
	}

	if (!empty($_POST['prochatrooms_one2one']))
	{
		foreach ($_POST['prochatrooms_one2one'] as $id)
		{
			$sql = $id." TABLE prochatrooms_one2one";	 
			mysql_query($sql) or die(mysql_error());
		}
	}

	if (!empty($_POST['prochatrooms_rooms']))
	{
		foreach ($_POST['prochatrooms_rooms'] as $id)
		{
			$sql = $id." TABLE prochatrooms_rooms";	 
			mysql_query($sql) or die(mysql_error());
		}
	}

	if (!empty($_POST['prochatrooms_share']))
	{
		foreach ($_POST['prochatrooms_share'] as $id)
		{
			$sql = $id." TABLE prochatrooms_share";	 
			mysql_query($sql) or die(mysql_error());

			if($id == 'TRUNCATE')
			{
				$dir = '../plugins/share/uploads/';

				// delete all files in folder
				foreach(glob($dir.'*') as $v)
				{
	    			unlink($v);
				}

				// create index.html file
				$newfile = fopen($dir."index.html", 'w') 
							or die("can't open file");

				fclose($newfile);
			}
		}
	}

	if (!empty($_POST['prochatrooms_users']))
	{
		foreach ($_POST['prochatrooms_users'] as $id)
		{
			$sql = $id." TABLE prochatrooms_users";	 
			mysql_query($sql) or die(mysql_error());

			$sql = $id." TABLE prochatrooms_profiles";	 
			mysql_query($sql) or die(mysql_error());
		}
	}

	return "Database maintenance completed.";
}


/*
* show HTML select on/off
*
*/

function showSelectedID($name,$id)
{
	if($id == '1')
	{
		$on = 'SELECTED';
	}

	$html  = '<select name="'.$name.'">';
	$html .= '<option value="0">Off</option>';
	$html .= '<option value="1" '.$on.'>On</option>';
	$html .= '</select>';

	return $html;
}