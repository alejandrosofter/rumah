<?php
#############################################
# Author: Pro Chatrooms
# Software: Pro Chatrooms
# Url: http://www.prochatrooms.com
# Support: support@prochatrooms.com
# Copyright 2007-2008 All Rights Reserved
# 
# PLUGIN - Games
#############################################
include("../db.php");
include("../globals.php");

if (!is_numeric($_GET['id'])) {die("error");} 

?>

	<html>
	<head>
	<title><?php echo $chatroom_name;?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $brower_char;?>" />
	<link rel="stylesheet" type="text/css" href="../style.css" />
	</head>
	<body class="body" marginwidth="0" marginheight="0" leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">
	<table class=broadcastbox cellpadding=2 cellspacing=0 border=0 bordercolor=#f5f5f5>
	<tr class=table_header>

	<?php

	// get games data
	$tmp=mysql_query("SELECT * FROM prochatrooms_games WHERE game_ID = '".$_GET['id']."'");
	while($i=mysql_fetch_array($tmp)) {

	?>

	<tr class="table_header">
	<td>

	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="<?php echo ($i['game_Width']);?>" height="<?php echo ($i['game_Height']);?>">
	<param name="movie" value="swf/<?php echo ($i['game_SwfFile']);?>" />
	<param name="quality" value="high" />
	<embed src="swf/<?php echo ($i['game_SwfFile']);?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="<?php echo ($i['game_Width']);?>" height="<?php echo ($i['game_Height']);?>"></embed>
	</object>

	</td>
	</tr>

	<?php } ?>

	</table>
	</body>
	</html>