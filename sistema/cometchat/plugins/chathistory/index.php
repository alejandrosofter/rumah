<?php

include dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."plugins.php";

$body = '';

logs();

function logsview() {
	global $db;
	$usertable = DB_USERTABLE;
	$usertable_username = DB_USERTABLE_NAME;
	$usertable_userid = DB_USERTABLE_USERID;
	global $body;	
	global $userid;

	$data = array();

	if (!empty($_GET['id'])) {
		$data = preg_split("/,/",base64_decode($_GET['id']));
	}

	$sql = ("select m1.*, f.$usertable_username fromu, t.$usertable_username tou from cometchat m1, ".TABLE_PREFIX."$usertable f, ".TABLE_PREFIX."$usertable t  where  f.$usertable_userid = m1.from and t.$usertable_userid = m1.to and ((m1.from = '".mysql_real_escape_string($userid)."') or (m1.to = '".mysql_real_escape_string($userid)."')) and m1.id >= $data[0] and m1.id < $data[1] order by id");

	if (!empty($_GET['history'])) {
		$history = $_GET['history'];
		$sql = ("select m1.*, f.$usertable_username fromu, t.$usertable_username tou from cometchat m1, ".TABLE_PREFIX."$usertable f, ".TABLE_PREFIX."$usertable t  where  f.$usertable_userid = m1.from and t.$usertable_userid = m1.to and ((m1.from = '".mysql_real_escape_string($userid)."' and m1.to = '".mysql_real_escape_string($history)."') or (m1.to = '".mysql_real_escape_string($userid)."' and m1.from = '".mysql_real_escape_string($history)."')) and m1.id >= $data[0] and m1.id < $data[1] order by id");
	}  

	$query = mysql_query($sql); 

	$chatdata = '';
	$previd = '';
	$lines = 0;
	$s = 0;
	while ($chat = mysql_fetch_array($query)) {

		if ($s == 0) { $s = $chat['sent']; }		
		$requester = $chat['fromu'];
		if ($chat['from'] == '1') {
			$requester = $chat['tou'];
			$chat['fromu'] = 'Me';
		}

		$time = date('g:iA', $chat['sent']);
		$chat['message'] = strip_tags($chat['message']);
		
		$display = $chat['fromu'].':';
		$chatnoline = '';
		if ($previd == $chat['fromu']) {
			$display = '';
			$time = '';
			$chatnoline = '';
		}
$lines++;
		$chatdata = <<<EOD
 $chatdata
<div class="chat chatnoline">
<div class="chatrequest" style="text-align:right;padding-right:5px;"><b>$display</b></div>
<div class="chatmessage chatnowrap">{$chat['message']}</div>
<div class="chattime">$time</div>
<div style="clear:both"></div>
</div> 

EOD;
		$previd = $chat['fromu'];
	}

	$time = date('d/m/Y', $s);

	if (!empty($_GET['history'])) {
		$history = '?history='.$_GET['history'];
	}

	$body = <<<EOD
	<script>
		jQuery(document).ready(function () {
 
		});
	</script>
	<div class="chatbar"><div style="float:left">Conversaci&oacute;n de Chat con $requester ($lines lineas)<br> el $time</div><div style="float:right;padding-right:7px;"><a href="index.php$history">Volver</a></div><div style="clear:both"></div></div>
	$chatdata
EOD;

	template();
}

function logs() {
	global $db;
	$usertable = DB_USERTABLE;
	$usertable_username = DB_USERTABLE_NAME;
	$usertable_userid = DB_USERTABLE_USERID;
	global $body;	
	global $userid;


	if (!empty($_GET['id'])) { logsview(); }

		$sql = ("select m1.*, f.$usertable_username fromu, t.$usertable_username tou from cometchat m1, ".TABLE_PREFIX."$usertable f, ".TABLE_PREFIX."$usertable t  
	where  f.$usertable_userid = m1.from and t.$usertable_userid = m1.to and ((m1.from = '".mysql_real_escape_string($userid)."') or (m1.to = '".mysql_real_escape_string($userid)."')) and (m1.sent) > ALL
	(select (m2.sent)+1800 from cometchat m2
	where ((m2.to = m1.to and m2.from = m1.from) or (m2.to = m1.from and m2.from = m1.to))
	and m2.sent <= m1.sent and m2.id < m1.id) order by id desc");
	
	if (!empty($_GET['history'])) {
		$history = $_GET['history'];

		$sql = ("select m1.*, f.$usertable_username fromu, t.$usertable_username tou from cometchat m1, ".TABLE_PREFIX."$usertable f, ".TABLE_PREFIX."$usertable t  
	where  f.$usertable_userid = m1.from and t.$usertable_userid = m1.to and ((m1.from = '".mysql_real_escape_string($userid)."' and m1.to = '".mysql_real_escape_string($history)."') or (m1.to = '".mysql_real_escape_string($userid)."' and m1.from = '".mysql_real_escape_string($history)."')) and (m1.sent) > ALL
	(select (m2.sent)+1800 from cometchat m2
	where ((m2.to = m1.to and m2.from = m1.from) or (m2.to = m1.from and m2.from = m1.to))
	and m2.sent <= m1.sent and m2.id < m1.id) order by id desc");
	}  

	$query = mysql_query($sql); 

	$chatdata = '<table>';
	$previd = 1000000;

	while ($chat = mysql_fetch_array($query)) {

		$requester = $chat['fromu'];
		if ($chat['from'] == '1') {
			$requester = $chat['tou'];
			$chat['fromu'] = 'Me';
		}

		$time = date('g:iA M dS', $chat['sent']);
		$chat['message'] = strip_tags($chat['message']);
		$encode = base64_encode($chat['id'].",".$previd);


		$chatdata = <<<EOD
 $chatdata
<div class="chat" id="{$encode}">
			 
			<div class="chatmessage"><b>{$chat['fromu']}</b>: {$chat['message']}</div>
			<div class="chattime">$time</div>
			<div style="clear:both"></div>
</div> 

EOD;
		$previd = $chat['id'];
	}

	$chatdata .= '</table>';

	$history = '';

	if (!empty($_GET['history'])) {
		$history = '+"&history='.$_GET['history'].'"';
	}

	$body = <<<EOD
	<script>
		jQuery(document).ready(function () {
			$('.chat').mouseover(function() {
				$(this).addClass('chatbg');
			});

			$('.chat').mouseout(function() {
				$(this).removeClass('chatbg');
			});

			$('.chat').click(function() {
				var id = $(this).attr('id');
				location.href = "?action=logs&id="+id$history;
			});
		});
	</script>	
	$chatdata
EOD;

	template();
}


function template() {
global $body;

echo <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Historial de Chat</title> 

<style>
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-weight: inherit;
	font-style: inherit;
	font-size: 100%;
	font-family: inherit;
	vertical-align: baseline;
}

#container {
	margin:0 auto;
	width: 400px;
	padding:20px;
}

#content {
	border-left: 1px solid #ccc;
	border-right: 1px solid #ccc;
	border-bottom: 1px solid #ccc;
	padding: 15px;
}

.message {
	padding: 0px;
	width: 200px;
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
 	background-color: #eeeeee;  
	border-bottom: 1px solid #ccc;
	margin-bottom: 5px;
 
	-moz-border-radius-topleft:7px;
	-moz-border-radius-topright:7px;
}

.messageright {
	float:left;
	padding-left: 10px;
	padding-right: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	width: 265px;
/*	border-left: 1px dotted #0f5d7e; */
}

.messagetime {
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:9px;
	font-weight: bold;
	color: #666666;
}

.chat {
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
	color: #666666;
	padding-top:7px;
	padding-bottom:7px;
	border-bottom:1px solid #ccc;
	display: block;
	width: 350px;
}

.chat a {
	text-decoration: none;
	color: black;
}

a {
	color: black;
}

.chatrequest {
	float:left;
	width:50px;
	padding-left: 5px;
	height: 12px;
	overflow: hidden;
}

.chatmessage {
	float:left;
	width: 220px;

	padding-left:5px;
}

.chattime {
	font-size: 10px;
	float:right;
	text-align: right;
	padding-right: 5px;
}

.chatbg {
	background-color: #efefef;
}

.chatnoline {
	border-bottom: 0px !important;
}

.chattopline {
	border-top:1px solid #ccc;
}

.chatnowrap {
	height: default;
	overflow: show;
}

.chatbar {
	font-weight: bold;
	background-color: #eeeeee;
	border-bottom:1px solid #ccc;
 	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
	color: #666666;
	padding-top:7px;
	padding-bottom:7px;
	padding-left: 7px;
}

 
body {
	overflow-y:scroll;
}


</style>
<script src="../../js/jquery.js"></script>

</head>
<body>
<div style="width:98%;margin:0 auto;margin-top: 5px;">
<div style="border-left: 1px solid #11648F;border-top: 1px solid #11648F;border-right: 1px solid #11648F;background-color:#3E92BD;color:#fff;padding:5px;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size: 14px;letter-spacing:0px;padding-left:10px;text-align:left;">Historial de Chat</div>

<div style="border-left: 1px solid #cccccc;border-bottom: 1px solid #cccccc;border-right: 1px solid #cccccc;background-color:#fffff;color:#333;padding:5px;font-weight:normal;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;padding:10px 10px;text-align:left;margin-bottom:10px;">

$body

</div>
</div>
</div>
</body>
</html>
EOD;
exit;
}