<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

session_start();

define('DB_SERVER','localhost');
define('DB_PORT','3306');
define('DB_USERNAME','root');
define('DB_PASSWORD','vertrigo');
define('DB_NAME','cometchat');
define('DB_NAME_SISTEMA','gfoxV3');
define('TABLE_PREFIX','cometchat_');
define('DB_USERTABLE','users');
define('DB_USERTABLE_NAME','name');
define('DB_USERTABLE_USERID','userid');
define('DB_USERTABLE_LASTACTIVITY','lastactivity');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* BASE URL */

define('BASE_URL','cometchat/');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* LANGUAGE */

// Actualice su lenguaje aqu�
$language[0] = 'Opciones del Chat';
$language[1] = 'Ingresa tu mensaje y presiona Enter!';
$language[2] = 'Mi Estado';
$language[3] = 'Disponible';
$language[4] = 'Ocupado';
$language[5] = 'Invisible';
$language[6] = 'Buscar Amigos';
$language[7] = '<a href="index.php?option=com_community&view=search&Itemid=174">Buscar Amigos para agregar</a>';
$language[8] = 'Por favor logueate para usar el Chat.';
$language[9] = 'Amigos en linea';
$language[10] = 'Yo';
$language[11] = 'Ponerme fuera de linea';
$language[12] = 'En linea';
$language[13] = 'Desactivar notificaciones sonoras';
$language[14] = 'No tienes amigos, por favor agrega algunos para usar el Chat.';
$language[15] = 'Nuevos mensajes...';
$language[16] = '';
$language[17] =	"Fuera de linea";

$status['available'] = "Estoy disponible";
$status['busy']      = "Estoy ocupado";
$status['offline']   = "Estoy fuera de linea";
$status['invisible'] = "Estoy fuera de linea";

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ICONS */

$trayicon[] = array('home.png','Inicio','index.php');
$trayicon[] = array('chatrooms.png','Salas de Chat',BASE_URL.'modules/chatrooms/index.php','_popup','502','300');
$trayicon[] = array('yin-yang.png','Cambiar theme',BASE_URL.'modules/themechanger/index.php','_popup','200','100');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* PLUGINS */

$plugins = array(

	'filetransfer',
	'divider',
	'clearconversation',
	'chathistory',
	'chattime'

);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* SMILEYS */

$smileys = array( 

	':)'	=>	'smiley',
	':-)'	=>	'smiley',
	':('	=>	'smiley-sad',
	':-('	=>	'smiley-sad',
	':D'	=>	'smiley-lol',
	';-)'	=>	'smiley-wink',
	';)'	=>	'smiley-wink',
	':o'	=>	'smiley-surprise',
	':-o'	=>	'smiley-surprise',
	'8-)'	=>	'smiley-cool',
	'8)'	=>	'smiley-cool',
	':|'	=>	'smiley-neutral',
	':-|'	=>	'smiley-neutral',
	":'("	=>	'smiley-cry',
	":'-("	=>	'smiley-cry',
	":p"	=>	'smiley-razz',
	":-p"	=>	'smiley-razz',
	":s"	=>	'smiley-confuse',
	":-s"	=>	'smiley-confuse',
	":x"	=>	'smiley-mad',
	":-x"	=>	'smiley-mad',

);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* BANNED WORDS */

$bannedWords = array(
         /* palabras bloqueadas*/
	'puta','puto','gay','perra','culo','culo marica','jopo'

); 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADMIN */

define('ADMIN_USER','admin');
define('ADMIN_PASS','admin');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* COOKIE */

$cookiePrefix = 'cc_';				// Modifique s�lo si tenga los casos de CometChat m�ltiples en el mismo sitio

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* THEME */

$theme = 'default';					// Default theme, 

if ($_COOKIE[$cookiePrefix."theme"]) {
	$theme = $_COOKIE[$cookiePrefix."theme"];
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* MISCELLANEOUS */

$autoPopupChatbox = 0;				// Auto-open chatbox when a new message arrives
$messageBeep = 1;					// Beep on arrival of new messages (user can over-ride this setting)
$minHeartbeat = 3000;				// Minimum poll-time
$maxHeartbeat = 12000;				// Maximum poll-time
define('REFRESH_BUDDYLIST','60');	// Time in seconds after which the user's "Who's Online" list is refreshed
define('ONLINE_TIMEOUT','30');		// Time in seconds after which a user is considered offline
define('DISABLE_SMILEYS','0');		// Set to 1 if you want to disable smileys
define('DISABLE_LINKING','0');		// Set to 1 if you want to disable auto linking
define('DISABLE_YOUTUBE','0');		// Set to 1 if you want to disable YouTube thumbnail

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADVANCED */

define('DEV_MODE','1');					// Set to 1 only during development
define('ERROR_LOGGING','1');			// Set to 1 to log all errors (error.log file)
define('SET_SESSION_NAME','');			// Session name
define('DO_NOT_START_SESSION','1');		// Set to 1 if you have already started the session
define('DO_NOT_DESTROY_SESSION','1');	// Set to 1 if you do not want to destroy session on logout

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* FUNCTIONS */

function getUserID() {
		$userid = 0; // Return 0 if user is not logged in
	
	if (!empty($_SESSION['userid'])) {
		$userid = $_SESSION['userid'];
	}

	return $userid;


}

function getFriendsList($userid,$time) {
		$tablaUsuarios=DB_NAME_SISTEMA.".usuarios ";
		$tablaSesiones=DB_NAME_SISTEMA.".sesiones ";
		$sql = "select $tablaUsuarios.idUsuario as userid, $tablaUsuarios.nombre as username, '' as lastactivity,  '' as link, '' as avatar, '' as message, IF(SUBSTRING_INDEX( GROUP_CONCAT(CAST($tablaSesiones.fechaEgresa AS CHAR) ORDER BY $tablaSesiones.idSesion desc), ',', 1 )=0,'online','offline')  as status " .
				"from $tablaUsuarios".
						"left join $tablaSesiones on $tablaSesiones.idUsuario = $tablaUsuarios.idUsuario  ".
						"group by $tablaUsuarios.idUsuario";
				//				"left join ".TABLE_PREFIX."community_users on ".TABLE_PREFIX."community_users.userid = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." " .
				//						"where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' AND ".TABLE_PREFIX.DB_USERTABLE.".activation ='1' order by username asc");

	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link,  ".TABLE_PREFIX."community_users.avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid  left join ".TABLE_PREFIX."community_users on ".TABLE_PREFIX."community_users.userid = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$today	= ''.date("Y-m-d H:i:s", time()).'';
	$sql = ("update `".TABLE_PREFIX.DB_USERTABLE."` set ".DB_USERTABLE_LASTACTIVITY." = '".getTimeStamp()."' where ".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {

	$sql = ("select ".TABLE_PREFIX."community_users.status message, cometchat_status.status from ".TABLE_PREFIX."community_users left join cometchat_status on ".TABLE_PREFIX."community_users.userid = cometchat_status.userid where ".TABLE_PREFIX."community_users.userid = ".mysql_real_escape_string($userid));
	return $sql;
}

function getLink($link) {
    return 'users.php?id='.$link;
}

function getAvatar($image) {
   if (is_file(dirname(dirname(__FILE__)).'/images/avatar/'.$image.'')) {
        return 'images/avatar/'.$image.'';
    } else {
        return 'images/avatar/default_thumb.jpg';
    }

}

function getTimeStamp() {
		return time();
}

function processTime($time) {
		return time();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* HOOKS */

function hooks_statusupdate($userid,$statusmessage) {
	$sql = ("update `".TABLE_PREFIX."community_users` set ".TABLE_PREFIX."community_users.status = '".mysql_real_escape_string(sanitize($statusmessage))."' where ".TABLE_PREFIX."community_users.userid = '".mysql_real_escape_string($userid)."'");	
	$query = mysql_query($sql);

}

function hooks_forcefriends() {
	
}

function hooks_activityupdate($userid,$status) {

}

function hooks_message($userid,$unsanitizedmessage) {
	
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
