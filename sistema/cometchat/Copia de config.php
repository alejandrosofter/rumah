<?php

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* DATABASE */

define('_JEXEC',1);
define('DS',DIRECTORY_SEPARATOR);
define('JPATH_BASE',dirname(dirname(__FILE__)));
session_start();
//require_once dirname(dirname(__FILE__))."/configuration.php";
//require_once dirname(dirname(__FILE__)).'/includes/defines.php';
//require_once dirname(dirname(__FILE__)).'/includes/framework.php';

///$config = new JConfig;

define('DB_SERVER','localhost');
define('DB_PORT','3306');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','cometchat');
define('TABLE_PREFIX','cometchat_');
define('DB_USERTABLE','users');
define('DB_USERTABLE_NAME','name');
define('DB_USERTABLE_USERID','userid');
define('DB_USERTABLE_LASTACTIVITY','lastactivity');


//$mainframe =& JFactory::getApplication('site');
//$mainframe->initialise();

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* BASE URL */

define('BASE_URL','cometchat/');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* LANGUAGE */

// Update your language here
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

	'puta','puto','gay','perra','culo','culo marica','jopo'

); 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* ADMIN */

define('ADMIN_USER','admin');
define('ADMIN_PASS','admin');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* COOKIE */

$cookiePrefix = 'cc_';				// Modify only if you have multiple CometChat instances on the same site

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* THEME */

$theme = 'default';					// Default theme, if no cookie preference is found

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
	/*$userid = 0; // Return 0 if user is not logged in

        if (!empty($_COOKIE['sessionhash'])) {
	    $sql = ("select userid from ".TABLE_PREFIX."session 
            where sessionhash = '".mysql_real_escape_string($_COOKIE['sessionhash'])."'");
	    $query = mysql_query($sql);
	    $session = mysql_fetch_array($query);
	    $userid = $session['userid'];
        }

	return $userid;*/
		$userid = 0; // Return 0 if user is not logged in
	
	if (!empty($_SESSION['userid'])) {
		$userid = $_SESSION['userid'];
	}

	return $userid;


}

function getFriendsList($userid,$time) {
		$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link,  ".TABLE_PREFIX.DB_USERTABLE.".avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid  left join ".TABLE_PREFIX."community_users on ".TABLE_PREFIX."community_users.userid = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." <> '".mysql_real_escape_string($userid)."' AND ".TABLE_PREFIX.DB_USERTABLE.".activation ='1' order by username asc");

	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." userid, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_NAME." username, ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_LASTACTIVITY." lastactivity,  ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." link,  ".TABLE_PREFIX."community_users.thumb avatar, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX.DB_USERTABLE." left join cometchat_status on ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = cometchat_status.userid  left join ".TABLE_PREFIX."community_users on ".TABLE_PREFIX."community_users.userid = ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." where ".TABLE_PREFIX.DB_USERTABLE.".".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$today	= ''.date("Y-m-d H:i:s", time()).'';
	$sql = ("update `".TABLE_PREFIX.DB_USERTABLE."` set ".DB_USERTABLE_LASTACTIVITY." = '".getTimeStamp()."' where ".DB_USERTABLE_USERID." = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {
	//$sql = ("select ".TABLE_PREFIX."community_users.status message, cometchat_status.status from ".TABLE_PREFIX."community_users left join cometchat_status on ".TABLE_PREFIX."community_users.userid = cometchat_status.userid where ".TABLE_PREFIX."community_users.userid = ".mysql_real_escape_string($userid));
		$sql = ("select cometchat_status.message, cometchat_status.status from cometchat_status where cometchat_status.userid = ".mysql_real_escape_string($userid));

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
	/*$tiempo1 = ''.date("Y-m-d H:i:s", time()).'';
	return $tiempo1;*/
		return time();
}

function processTime($time) {
	/*$time = ''.date("Y-m-d H:i:s", time()).'';
	return $time;*/
		return time();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* HOOKS */

/*function hooks_statusupdate($userid,$statusmessage) {
	require_once( JPATH_BASE.DS.'components'.DS.'com_community'.DS.'libraries'.DS.'core.php');

 	$db	= & JFactory::getDBO();
	$my	=& CFactory::getUser();
		
	require_once( COMMUNITY_COM_PATH.DS.'libraries' . DS . 'apps.php' );
	
	$appsLib	=& CAppPlugins::getInstance();
	$appsLib->loadApplications();
		
	$args 	= array();
	$args[]	= $my->id;
	$args[]	= $my->getStatus();	
	$args[]	= $statusmessage;
	$appsLib->triggerEvent( 'onProfileStatusUpdate' , $args );
		
	$today	=& JFactory::getDate();
	$data	= new stdClass();
	$data->userid		= $userid;
	$data->status		= $statusmessage; 		
	$data->posted_on    = $today->toMySQL();
		
	$db->updateObject( '#__community_users' , $data , 'userid' );
		
	if($db->getErrorNum()) {
		JError::raiseError( 500, $db->stderr());
	}


	$sql = ("insert into ".TABLE_PREFIX."community_activities (actor,target,title,app,cid,created,points) values ('".$userid."','".$userid."','{actor} ".mysql_real_escape_string(sanitize($statusmessage))."','profile',$userid, '".$today->toMySQL()."',1)");
	$query = mysql_query($sql);	
}
*/
function hooks_forcefriends() {
	
}

function hooks_activityupdate($userid,$status) {

}

function hooks_message($userid,$unsanitizedmessage) {
	
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////