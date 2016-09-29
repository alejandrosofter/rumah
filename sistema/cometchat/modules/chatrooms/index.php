<?php

include dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."modules.php";

unset($_SESSION['cometchat_chatroomslist']);

if ($userid == 0) {
echo <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Chatrooms</title> 
<link type="text/css" rel="stylesheet" media="all" href="themes/{$theme}/chatrooms.css" /> 
</head>
<body>

<div class="container">
<div class="cometchat_tabpopup currentchatroom">

<div class="cometchat_tabcontenttext" id="cometchat_tabcontenttext" style="width:100%;height:100%"><div class="welcomemessage">Logueate para usar nuestra Salas de Chat.</div></div>

</div>
</div>
</body>
</html>
EOD;
} else {

	echo <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Chatrooms</title> 
<link type="text/css" rel="stylesheet" media="all" href="themes/{$theme}/chatrooms.css" /> 
<script src="http://localhost/charter/cometchat/js/jquery.js"></script>
<script src="chatrooms.js"></script>
</head>
<body>

<div class="container">
<div class="cometchat_tabpopup currentchatroom">

<div class="cometchat_tabcontenttext" id="cometchat_tabcontenttext"><div class="welcomemessage">Ingresa en una de las Salas de la derecha o <a href="javascript:void(0);" onclick="javascript:createChatroom();">crear la tuya</a>. Las Sala de Chat que hayas creado ser&aacute;n eliminadas autom&aacute;ticamente despu&eacute;s de 10 minutos de inactividad.</div></div>
<div class="cometchat_tabcontentinput"><textarea class="cometchat_textarea"></textarea></div>

</div>
<div class="chatbox">
<div id="chatrooms"></div>
<a onclick="javascript:createChatroom();" style="cursor: pointer"><div class="createchatroom">Crear Sala de Chat</div></a>

</div>
</div>
</body>
</html>
EOD;

}

?>