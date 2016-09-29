<?php
 
require_once dirname(dirname(__FILE__))."/configuration.php";
$config = new JConfig;
define('DB_SERVER',$config->host);
define('DB_PORT','3306');
define('DB_USERNAME',$config->user);
define('DB_PASSWORD',$config->password);
define('DB_NAME',$config->db);
define('TABLE_PREFIX',$config->dbprefix);
define('DB_USERTABLE','users');
define('DB_USERTABLE_NAME','name');
define('DB_USERTABLE_USERID','id');
define('DB_USERTABLE_LASTACTIVITY','lastactivity');
session_start();
define( '_JEXEC', 1 );
define( 'DS', DIRECTORY_SEPARATOR );
define('JPATH_BASE', dirname(dirname(__FILE__)) );
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();
$my =& JFactory::getUser();



// Path to CometChat (default: cometchat/) [must have trailing /]
define('BASE_URL','cometchat/');

// Update your language here
$language[0] = 'Opciones del Chat';
$language[1] = 'Ingresa tu mensaje y presiona Enter!';
$language[2] = 'Mi Estado';
$language[3] = 'Disponible';
$language[4] = 'Ocupado';
$language[5] = 'Invisible';
$language[6] = 'Buscar Amigos';
$language[7] = '<a href="index.php?option=com_community&view=search&Itemid=300">Buscar Amigos para agregar</a>';
$language[8] = 'Por favor logueate para usar el Chat.';
$language[9] = 'Amigos en linea';
$language[10] = 'Yo';
$language[11] = 'Ponerme fuera de linea';
$language[12] = 'En linea';
$language[13] = 'Desactivar notificaciones sonoras';
$language[14] = 'No tienes amigos, por favor agrega algunos para usar el Chat.';
$language[15] = 'Nuevos mensajes...';
$language[16] = '';

$status['available'] = "Estoy disponible";
$status['busy'] = "Estoy ocupado";
$status['offline'] = "Estoy fuera de linea";

// To add/remove an icon, simply remove/add a "//" (no quotes) before it
// $trayicon[] = array('home.png','Sample Link One','http://www.google.com');

$trayicon[] = array('home.png','Inicio','/');
$trayicon[] = array('chatrooms.png','Salas de Chat',BASE_URL.'modules/chatrooms/index.php','_popup','502','300');
$trayicon[] = array('map.png','Conoc&eacute; la Comunidad','index.php');
$trayicon[] = array('yin-yang.png','Estilo','index.php');
$trayicon[] = array('yin-yang.png','Change theme',BASE_URL.'modules/themechanger/index.php','_popup','200','100');


// Plugins

$plugins = array('filetransfer','divider','clearconversation','chattime');

// Admin username and password

define('ADMIN_USER','admin');
define('ADMIN_PASS','admin');

$autoPopupChatbox = 0;
$messageBeep = 1;

// Theme to be used
$theme = 'default';

$minHeartbeat = 3000;
$maxHeartbeat = 12000;

// Set the time in seconds after which the users buddylist is refreshed (default: 60)
define('REFRESH_BUDDYLIST','60');

// Set the time in seconds after which a user is considered offline if no response is received (default: 120)
define('ONLINE_TIMEOUT','30');

// Smileys
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

// Set to 1 if you want to disable smileys (default: 0)
define('DISABLE_SMILEYS','0');

// Set to 1 if you want to disable auto linking (default: 0)
define('DISABLE_LINKING','0');

// Set to 1 if you want to disable auto linking (default: 0)
define('DISABLE_YOUTUBE','1');


// Set banned words here
$bannedWords = array("nastyword","nastyword1","nastyword2","nastyword3","nastyword4"); 

error_reporting(E_ALL);
ini_set('display_errors','Off');
ini_set('log_errors', 'On');
ini_set('error_log', 'error.log');

define('SET_SESSION_NAME','');
define('DO_NOT_START_SESSION','1');
define('DO_NOT_DESTROY_SESSION','1');




/* Do NOT edit below unless you know what you are doing */

function getUserID() {
	$userid = 0;
	
	$my =& JFactory::getUser();

	if (!empty($my->id)) {
		$userid = $my->id;
		$_SESSION['cometchat_userid'] = $userid;
	}

	if (!empty($_SESSION['cometchat_userid'])) {
		$userid = $_SESSION['cometchat_userid'];
	}

	return $userid;
}

function getFriendsList($userid,$time) {
	$sql = ("select distinct(".TABLE_PREFIX."users.id) userid, ".TABLE_PREFIX."users.name username, UNIX_TIMESTAMP(".TABLE_PREFIX."users.lastvisitDate) lastactivity, ".TABLE_PREFIX."community_users.status message, cometchat_status.status, ".TABLE_PREFIX."community_users.thumb avatar, ".TABLE_PREFIX."users.id link from ".TABLE_PREFIX."community_connection join ".TABLE_PREFIX."users on  ".TABLE_PREFIX."community_connection.connect_to = ".TABLE_PREFIX."users.id left join cometchat_status on ".TABLE_PREFIX."users.id = cometchat_status.userid  left join ".TABLE_PREFIX."community_users on ".TABLE_PREFIX."community_users.userid = ".TABLE_PREFIX."community_connection.connect_to where ".TABLE_PREFIX."community_connection.status = '1' and ".TABLE_PREFIX."community_connection.connect_from = '".mysql_real_escape_string($userid)."' order by username asc");

	return $sql;
}

function getUserDetails($userid) {
	$sql = ("select ".TABLE_PREFIX."users.id userid, ".TABLE_PREFIX."users.name username, UNIX_TIMESTAMP(".TABLE_PREFIX."users.lastvisitDate) lastactivity, ".TABLE_PREFIX."community_users.thumb avatar, ".TABLE_PREFIX."users.id link, cometchat_status.message, cometchat_status.status from ".TABLE_PREFIX."users left join cometchat_status on ".TABLE_PREFIX."users.id = cometchat_status.userid  left join ".TABLE_PREFIX."community_users on ".TABLE_PREFIX."community_users.userid = ".TABLE_PREFIX."users.id where ".TABLE_PREFIX."users.id = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function updateLastActivity($userid) {
	$today	=& JFactory::getDate();
	$sql = ("update ".TABLE_PREFIX."users set lastvisitDate = '".$today->toMySQL()."' where id = '".mysql_real_escape_string($userid)."'");
	return $sql;
}

function getUserStatus($userid) {
	$sql = ("select ".TABLE_PREFIX."community_users.status message, cometchat_status.status from ".TABLE_PREFIX."community_users left join cometchat_status on ".TABLE_PREFIX."community_users.userid = cometchat_status.userid where ".TABLE_PREFIX."community_users.userid = ".mysql_real_escape_string($userid));
	return $sql;
}

function getLink($link) {
	return str_replace('cometchat/','',JURI::root()).'/index.php?option=com_community&view=profile&userid='.$link;
}

function getAvatar($image) {
	return str_replace('cometchat/','',JURI::root()).$image;
}

function getTimeStamp() {
	$today	=& JFactory::getDate()->toMySQL();
	return strtotime($today);
}

function hooks_statusupdate($userid,$statusmessage) {
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