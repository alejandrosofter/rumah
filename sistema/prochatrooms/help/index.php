<?php 
#############################################
# Author: Pro Chatrooms
# Software: Pro Chatrooms
# Url: http://www.prochatrooms.com
# Support: support@prochatrooms.com
include("../includes/config.php");
#############################################
?>
<html>
<head>
<title>Pro Chat Rooms - User Help <?php echo $CONFIG['version'];?></title>
<link rel='stylesheet' type='text/css' href='../templates/<?php echo $CONFIG['template'];?>/style.css' />

<style>

h2
{
	font-family: Verdana, Arial;
	font-size: 20px;
	font-weight: bold;
	color: #336699;
}

table
{
	font-family: Verdana, Arial;
	font-size: 12px;
	font-style: normal;
	color: #003366;
}

a
{
	font-family: Verdana, Arial;
	font-size: 12px;
	font-style: normal;
	color: #003366;
}

a:link {text-decoration: none}
a:visited {text-decoration: none}
a:active {text-decoration: none}
a:hover {text-decoration: underline;}

</style>

</head>
<body class='body' style="margin: 0 8px 8px 8px;">

<div class="roomheader">
	Chat Room - User Help <?php echo $CONFIG['version'];?>
</div>

<a name="top"></a>

<table width="100%">
<tr><td width="150" valign="top">

<div>
<b>Options</b><br>
&#187; <a href="#sendmessage">Send Message</a><br>
&#187; <a href="#smilies">Smilies/Emoticons</a><br>
&#187; <a href="#avatars">Avatars</a><br>
&#187; <a href="#sharefiles">Share Files</a><br>
&#187; <a href="#textstyles">Text Styles</a><br>
&#187; <a href="#sfx">Sound Effects</a><br>
&#187; <a href="#ringbell">Ring Bell</a><br>
&#187; <a href="#games">Games</a><br>
&#187; <a href="#transcripts">Transcripts</a><br>
&#187; <a href="#disconnect">Disconnect</a><br>
&#187; <a href="#banusers">Ban User</a><br>
&#187; <a href="#modchat">Moderated Chat</a><br>
&#187; <a href="#autoscroll">Auto Scroll</a><br>
&#187; <a href="#sounds">Sounds</a><br>
&#187; <a href="#privatechat">Private Chat</a><br>
&#187; <a href="#roomlist">Create a Room</a><br>
&#187; <a href="#userlist">Users/Room List</a><br>
<br><b>IRC Commands</b><br>
&#187; <a href="#irc">Roll Dice</a><br>
&#187; <a href="#irc">Status Messages</a><br>
&#187; <a href="#irc">Action Messages</a><br>
&#187; <a href="#irc">Announce Messages</a><br>
&#187; <a href="#irc">Silence User</a><br>
&#187; <a href="#irc">Password Rooms</a>
</div>

</td><td>

<a name="sendmessage"></a>
<table border='0'>
<tr><td>
<b>:: Send Message</b><br>
<img src="images/messagebar.gif"><br>
To send a message to other chat room users, type your message in the message box as shown above and click the 'Send' button.
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="smilies"></a>
<table border='0'>
<tr><td>
<b>:: Smilies/Emoticons</b><br>
<img src="images/smilies.gif"><br>
This feature allows you to add smilies/emoticons to your chat messages. To add a smilie/emoticon to your message, click the smilie/emoticon button and a window will appear with a preset selection of smilies/emoticons. Click the smilie/emoticon you would like to add to your message.</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="avatars"></a>
<table border='0'>
<tr><td>
<b>:: Avatars</b><br>
<img src="images/avatars.gif"><br>
This feature allows you to display an avatar next to your name and chat messages. To choose an avatar, click the avatar button and a window will appear with a preset selection of avatars. Click the avatar you would like to use.</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="sharefiles"></a>
<table border='0'>
<tr><td>
<b>:: Share Files*</b><br>
<img src="images/share.gif"><br>
This feature allows you share photos/images with other chat room users. To share your image, click the share button and a window will appear prompting you to upload your image. You can share your image with all users or privately during conversations.
<br><br>
*This feature is an additional plugin and may not be available, contact your chat room administrator for more details.
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="sfx"></a>
<table border='0'>
<tr><td>
<b>:: Sound Effects (SFX)</b><br>
<img src="images/sfx.gif"><br>
This feature allows you use sound effects in the chat room. To play a sound effect, click the 'SFX' icon and click on a sound effect.
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="ringbell"></a>
<table border='0'>
<tr><td>
<b>:: Ring Bell</b><br>
<img src="images/bell.gif"><br>
This feature allows you to ring a bell to attract the attention of other room users.
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="games"></a>
<table border='0'>
<tr><td>
<b>:: Games*</b><br>
<img src="images/games.gif"><br>
This feature allows you to play games in the chat room. To play a game, click the 'Games' icon and click on a game of your choice.
<br><br>
*This feature is an additional plugin and may not be available, contact your chat room administrator for more details.
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="textstyles"></a>
<table border='0'>
<tr><td>
<b>:: Text Styles</b><br>
<img src="images/textstyles.gif"><br>
This feature allows you to change your text style (font, colours and sizes). Select an option by clicking the icon <b>A | B</b> in the chat room.</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="transcripts"></a>
<table border='0'>
<tr><td>
<b>:: Transcripts</b><br>
<img src="images/transcripts.gif"><br>
This feature allows you to view a history of all current chat messages.</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="disconnect"></a>
<table border='0'>
<tr><td>
<b>:: Disconnect</b><br>
<img src="images/disconnect.gif"><br>
This button will disconnect you from your current chat session.
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="modchat"></a>
<table border='0'>
<tr><td>
<b>:: Moderated Chat*</b><br>
<img src="images/modchat.gif"><br>
If the chat room administrator has enabled 'moderated chat', each message must be approved before it is shown in the main chat window.
<br><br>
*This feature is an additional plugin and may not be available, contact your chat room administrator for more details. 
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="sounds"></a>
<table border='0'>
<tr><td>
<b>:: Sounds</b><br>
<img src="images/sounds.gif"><br>
To enable/disable sounds in the chat room, click the box next to the text 'Sounds'.
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="autoscroll"></a>
<table border='0'>
<tr><td>
<b>:: Auto Scroll</b><br>
<img src="images/autoscroll.gif"><br>
To enable/disable auto scrolling of the chat screen, click the box next to the text 'Auto Scroll'.
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="privatechat"></a>
<table border='0'>
<tr><td>
<b>:: Private Chat</b><br>
<img src="images/whisper.gif"><br>
To send private messages, enter the <i>username</i> of the user you wish to chat privately with in the box as shown in the picture above. Then type your message and press 'Send'.
 You can also start a private conversation by clicking a username in the userlist and select the option to 'Private Chat'. This will open a new private chat window.</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="roomlist"></a>
<table border='0'>
<tr><td>
<b>:: Create a Room*</b><br>
<img src="images/create_room.gif"><br>
To add your own room, enter your room name in the field provided and click 'Add'.
<br><br>
To password protect a room, type '/pass <i>yourpassword</i>' (without the quotes). Any user trying to enter the room will now need to enter a password first.
<br><br>
*This feature may not be available, contact your chat room administrator for more details. 
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="userlist"></a>
<table border='0'>
<tr><td>
<b>:: Users/Room List</b><br>
<img src="images/userlist.gif"><br>
This section displays details about the chat room you are in and all other room users. To enter a chat room, simply click the room name in the list. Some rooms may require passwords to join. If you do not know the password to enter the room, click another room name in the list to join a different room.
<br><br>
<b>:: Default Symbols</b><br>
(A) Administrator<br>
(M) Moderator<br>
(S) Approved Speaker<br>
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<a name="irc"></a>
<table border='0'>
<tr><td>
<b>:: IRC Type Commands</b><br><br>

1) /roll <i>ndn</i><br>
In the message bar, type '/roll <i>ndn</i>' (without the quotes). This command allows you to simulate rolling dice in the chat room. For example, type '/roll <i>3d3</i>' to auto-generate a number between 3 and 9.<br><br>
2) /status <i>message</i><br>
In the message bar, type '/status <i>message</i>' (without the quotes). This command allows you to change your user status in the userlist. Example: type '/status <i>brb</i>' (without the quotes) to change your status in the userlist to '<i>username</i> (brb)'. You can type any custom message to appear as your status (example: '/status <i>on the phone</i>'). <br><br>
3) /action <i>message</i><br>
In the message bar, type '/action <i>message</i>' (without the quotes). This command allows you to add fun action messages. Example: Type '/action <i>files around the room</i>' (without the quotes) and a message will appear in the main chat window informing other users that '<i>username</i> flies around the room'. <br><br>
4) /announce <i>message</i> (admins only)<br>
In the message bar, type '/announce <i>message</i>' (without the quotes). This command allows you to send announcements to all chat users in every chat room (these will be displayed both on screen and by pop up notifications).<br><br>
5) /silence <i>username</i> (admins &amp; moderators only)<br>
In the message bar, type '/silence <i>username</i>' (without the quotes). This command will prevent a user from typing messages in both the main chat room and private windows for a preset period of time. Once the preset time has elapsed, the user is then able to join back in and type messages.<br><br>
6) /pass <i>yourpassword</i> (user created rooms only)<br>
In the message bar, type '/pass <i>yourpassword</i>' (without the quotes). This command allows a user to password protected any user created room.<br><br>
</td></tr>
</table>

<table width="100%" border='0'>
<tr><td align="right">
<a class="nav_top" href="#top">[back to top]</a>
</td></tr>
</table>

<!--
DO NOT REMOVE THE COPYRIGHT NOTICE LINE BELOW UNLESS YOUR LICENCE TYPE PERMITS THIS.
REMOVAL OF THE COPYRIGHT INFORMATION WITHOUT PERMISSION WILL TERMINATE YOUR LICENCE.
-->

<?php if(!file_exists("../rembrand/index.php")){?>
	<div style="text-align:center;">
		&copy;2007-<?php echo date("Y");?> Powered by <a class="copyright" href="http://www.prochatrooms.com" target="_blank" alt="Powered By ProChatRooms.com" title="Powered By ProChatRooms.com">Pro Chat Rooms</a>
	</div>
<?php }?>

</td></tr>
</table>


</body>
</html>