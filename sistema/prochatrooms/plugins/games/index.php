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
include("languages/default.php");
if(!isset($_SESSION['pro_chatrooms'])){die;}
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
	<td colspan=5 align=center><b><?php echo C_LANG1;?></b></td></tr>

	<?php

	// get games data
	$tmp=mysql_query("SELECT * FROM prochatrooms_games");
	while($i=mysql_fetch_array($tmp)) {
	$new_Width = $i['game_Width'] + 8;
	$new_Height = $i['game_Height'] + 8;
	?>

	<tr class="table_header">
	<td><img src="images/<?php echo ($i['game_Thumb']);?>" width="70" height="60"></td><td><?php echo ($i['game_Desc']);?><br>
	<a href="javascript:void(0);" onClick="window.open('play.php?id=<?php echo ($i['game_ID']);?>','play_game','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=1,width=<?php echo $new_Width;?>,height=<?php echo $new_Height;?>,left=380,top=120');return false;"><?php echo C_LANG2;?></a>
	</td>
	</tr>

	<?php } ?>

	<tr class=table_header>
	<td align=center colspan=5><input type="button" class="smilie_button" name="button" value="<?php echo C_MAIN23;?>" onClick="javascript:window.close();" title="<?php echo C_MAIN23;?>"></td></tr>
	</table>
	</body>
	</html>