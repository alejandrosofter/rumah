<?php
#############################################
# Author: Pro Chatrooms
# Software: Pro Chatrooms
# Url: http://www.prochatrooms.com
# Support: support@prochatrooms.com
# Copyright 2007-2008 All Rights Reserved
#############################################

###### DO NOT EDIT BELOW ###############
include_once '../../globals.php';
include_once '../../db.php';
include_once '../../config.php';
########################################

?>
<html>
<title>Pro Chat Rooms - Version <?php echo $version;?> - Installation</title>
<head>
<link rel="stylesheet" type="text/css" href="../../style.css" />
</head>
<body class="body" marginwidth="10" marginheight="4" leftmargin="10" rightmargin="10" topmargin="4" bottommargin="0">
<a href="index.php"><img src="../../images/chat.gif" align="absmiddle" border="0" alt="Pro Chat Rooms - Installation"></a>
<br><br>
<table align="center" width=100% border=0 class=message_box><tr><td align=center>
<b>Pro Chat Rooms - Game Pack Installation</b>
</td></tr></table>

<!-- start install -->

<?php if (!$_POST){?>
<script language="JavaScript">
<!--
function formCheck(form) {
if (!(install_licence.licence.checked)) {alert( "Please agree to the software licence. ");return false ;}
}
// -->
</script>
<br>
<table width="100%" align="center"><tr><td align=center>
<table cellpadding="10" width="400" border=0 style="border: 1px solid #84B2DE;background-color: #FFFFFF;font-family: Arial, Verdana;font-size: 12px;font-style: normal;">
<tr><td align=center width="60">
<img src="images/help.gif" align="absmiddle">
</td><td align="center">
<form OnSubmit="return formCheck(this)" action="index.php" method="post" name="install_licence">
<br>
<br>
<b>Welcome to the Pro Chat Rooms - Game Pack installation.</b>
<br>
<br>
<input type="checkbox" name="licence" onClick="document.install_licence['submit'].disabled =(document.install_licence['submit'].disabled)? false : true">
I have read and agree to the <a href="http://prochatrooms.com/software_licence.php" target="_blank">software licence</a>.
<br>
<br>
<input type="hidden" name="i" value="1">
<input type="submit" id="submit" name="submitthis" value="Continue" class="user_buttons_large" disabled>
</form>
<br>
<br>
</td></tr></table>
</td></tr></table>
<?php }?>

<!-- install - step 1 -->

<?php if ($_POST && $i=='1'){?>
<br>
<table width="100%" align="center"><tr><td align=center>
<table cellpadding="10" width="500" border=0 style="border: 1px solid #84B2DE;background-color: #FFFFFF;font-family: Arial, Verdana;font-size: 12px;font-style: normal;">
<tr><td align=center width="60">
<img src="images/help.gif" align="absmiddle">
</td><td align="center">
<table width=500 border=0 border=0 style="font-family: Arial, Verdana;font-size: 12px;font-style: normal;">
<tr><td><b>Congratulations, you have completed the Pro Chat Rooms - Game Pack installation.<br><br>Below is your MySQL Table Installation Report.</b><br><br></td></tr>
<tr><td><b>Install Results</b></td></tr>

<tr><td>

<?php

//
// Drop table if exists for fresh installation
// 

$sql = "DROP TABLE IF EXISTS `prochatrooms_games`";mysql_query($sql);

// 
// Table structure for table `prochatrooms_games`
// 

$sql = "CREATE TABLE IF NOT EXISTS `prochatrooms_games` (
  `game_ID` bigint(20) NOT NULL auto_increment,
  `game_SwfFile` varchar(200) NOT NULL default '',
  `game_Name` varchar(100) NOT NULL default '',
  `game_Thumb` varchar(200) NOT NULL default '',
  `game_Width` varchar(8) NOT NULL default '',
  `game_Height` varchar(8) NOT NULL default '',
  `game_Desc` varchar(100) NOT NULL default '',
  UNIQUE KEY `game_ID` (`game_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ";

if(mysql_query($sql)) echo "&#187; prochatrooms_games - <font color=\"#33FF00\"><b>INSTALLED</b></font>";
else echo "&#187; prochatrooms_games - <font color=\"#FF0000\"><b>FAIL</b></font>";

//
// Dumping data for table `prochatrooms_games`
// 

$sql = "INSERT INTO `prochatrooms_games` (`game_ID`, `game_SwfFile`, `game_Name`, `game_Thumb`, `game_Width`, `game_Height`, `game_Desc`) VALUES 
(1, '3FootNinja.swf', '3 Foot Ninja', 'ninjasmallicon.gif', '400', '300', 'Cool online fighting game, great fun'),
(2, 'alienattackwm.swf', 'Alien', 'aliensmallicon.gif', '400', '300', '\"DEFEND THE BASE\" from evil aliens!'),
(3, 'baseballonefile.swf', 'Baseball', 'baseballsmallicon.gif', '400', '300', 'Have a nice relaxing game of baseball online!'),
(4, 'battleships.swf', 'Battleships', 'battleshipssmallicon.gif', '400', '300', 'Come and play the classic game of battleships'),
(5, 'trapshoot.swf', 'Trap Shot', 'trapshootsmallicon.gif', '400', '300', 'PULL!!! go on.. shoot those clay pigeons'),
(6, 'stressgame.swf', 'Stress Game', 'paintsmallicon.gif', '400', '300', 'Take your stress out on these little smilie faces.'),
(7, 'bug.swf', 'Bug on a wire', 'bugsmallicon.gif', '400', '300', 'Run along the wire for as long as you can'),
(8, 'tennis.swf', 'Tennis Ace', 'acesmallicon.jpg', '400', '300', 'Like tennis?? You will love this game!'),
(9, 'samuraiwm.swf', 'Samurai Warrior', 'samuraismallicon.jpg', '400', '300', 'A tekken style beat ''em up.'),
(10, 'mars_stand_miniclip.swf', 'Mars Mission', 'missionsmallicon.gif', '400', '300', 'Cool alien invaders game, great fun!')";

if(mysql_query($sql)) echo "<br>&#187; 10 x game pack - <font color=\"#33FF00\"><b>INSTALLED</b></font>";
else echo "<br>&#187; 10 x game pack - <font color=\"#FF0000\"><b>FAIL</b></font>";

?>

</td></tr>

<tr><td>&nbsp;</td></tr>
<tr><td><b>Results Explained</b></td></tr>
<tr><td><font color="#33FF00"><b>INSTALLED</b></font> - Table already exists or has been successfully created.</td></tr>
<tr><td><font color="orange"><b>N/A</b></font> - Table is not required for this installation.</td></tr>
<tr><td><font color="#FF0000"><b>FAIL</b></font> - Table did not install correctly.</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><b>Important!</b></td></tr>
<tr><td>If all tables have successfully installed, please delete the folder '<b>games/install</b>'.</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><b>Admin Details</b></td></tr>
<tr><td>Username: admin</td></tr>
<tr><td>Password: adminpass</td></tr>
<tr><td>Login: <a href="../../admin/" target="_blank">Click Here</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td><b>Thank you for choosing Pro Chat Rooms.</b></td></tr>
</table>
</td></tr></table>

<?php }?>


<br>
<table align=center width=100% border=0 class=message_box><tr><td align=center>
If you require support during the installation process, please <a href="http://www.prochatrooms.com/contact.php" target="_blank">contact us</a>.<br>
</td></tr>
<tr><td align=center class=messenger_table>
&copy; Copyright 2007 - <?php echo date("Y");?> <a href="http://www.prochatrooms.com/index.php" target="_blank">Pro Chat Rooms</a> All Rights Reserved.
</td></tr></table>
