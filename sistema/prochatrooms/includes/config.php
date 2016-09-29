<?php

/*
* chat room details
*
*/

$CONFIG['chatroomName']  = 'CHAT FOXIS';
$CONFIG['chatroomEmail'] = 'alejandro@foxis.com.ar';
$CONFIG['chatroomUrl']   = 'http://foxis.sytes.net/prochatrooms/';

/*
* chat room template
* eg. default
*/

$CONFIG['template'] = 'default';

/*
* integrated with CMS
* allows users to auto-login
*/

$CONFIG['CMS'] = '0'; // 0 No, 1 Yes

/*
* enable guest mode
* allows guests to login to chat room
*/

$CONFIG['guestMode']  = '1'; // 0 No, 1 Yes - allow guests to login

/*
* default user group 
* (if no $_SESSION['userGroup'] is set on login)
*/

$CONFIG['userGroup']  = '1';

/*
* eCredits
*
*/

$CONFIG['eCreditsOn']       = '0';   // 0 Off, 1 On
$CONFIG['eCredits']         = '1';   // deducts eCredits per min from user account 
$CONFIG['eCreditsCost']     = '2';   // each individual eCredit costs (to purchase)
$CONFIG['eCreditsCurrency'] = 'USD'; // currency (GBP, USD, YEN)
$CONFIG['eCreditsEmail']    = 'your@mail.com'; // your paypal email

/*
* Intelli-Bot settings
*
*/

$CONFIG['intelliBot'] = '0'; // 0 Off, 1 On
$CONFIG['intelliBotName'] = 'Intelli-Bot';   
$CONFIG['intelliBotAvi'] = 'pc.gif'; 
$CONFIG['intellibotRoomID'] = '1'; 

/*
* moderated chat
* requires moderated chat plugin
*/

$CONFIG['moderatedChatPlugin'] = '0'; // 0 Off, 1 On

/*
* invisible admins
* requires invisible admins plugin
*/

$CONFIG['invisibleAdminsPlugin'] = '0'; // 0 Off, 1 On

/*
* virtual credits
* requires virtual credits plugin
*/

$CONFIG['virtualCreditsPlugin'] = '0'; // 0 Off, 1 On

/*
* events
* requires events plugin
*/

$CONFIG['eventsPlugin'] = '0'; // 0 Off, 1 On

/*
* one2one
* requires one2one plugin
*/

$CONFIG['one2onePlugin'] = '0'; // 0 Off, 1 On

/*
* default login room 
* use ID value, do not use room name
*/

$CONFIG['defaultRoom'] = '1';

/*
* language file(s)
* 
*/

$CONFIG['lang'] = array();

$CONFIG['lang'][0] = 'espanol.php'; // empty
$CONFIG['lang'][1] = 'espanol.php';

/*
* kick time for abusive users
* users are unable to relogin until time has expired
*/

$CONFIG['kickTime'] = '15'; // minutes

/*
* silence time for abusive users
* users are unable to type until time has expired
*/

$CONFIG['silent'] = '1'; // minutes

/*
* single/multi room
* single - shows only 1 room name in userlist
* multi - shows all room names in userlist
*/

$CONFIG['singleRoom'] = '0'; // 0 multi rooms, 1 single rooms

/*
* registration
* require email confirmation for new accounts (excludes guests)
*/

$CONFIG['approve'] = '0'; // 0 No, 1 Yes

/*
* ban user by IP
*
*/

$CONFIG['banIP'] = '0'; // 0 No, 1 Yes

/*
* text styles
* 
*/

$CONFIG['text'] = array();

$CONFIG['text']['bold'] = '0'; 
$CONFIG['text']['underline'] = '0'; 
$CONFIG['text']['italic'] = '0'; 
$CONFIG['text']['color'] = '#000000'; 
$CONFIG['text']['size'] = '12px'; 
$CONFIG['text']['family'] = 'verdana'; 

/*
* idle timeout
* 15 mins = 900 seconds
*/

$CONFIG['idleTimeout'] = '28800'; // seconds

/*
* idle logout timeout
* 60 mins  = 3600 seconds
*/

$CONFIG['idleLogoutTimeout'] = '28800'; // seconds

/*
* auto login (admin area)
* allow admin users in chat room to auto login to admin area
*/

$CONFIG['adminArea'] = '0'; // 0 No, 1 Yes

/*
* salt
* random security code
*/

$CONFIG['salt'] = '!$*_3214'; // use random characters

/*
* activity timeout
* auto updates user online/offline
*/

$CONFIG['activeTimeout'] = '900'; // seconds

/*
* Software Version
*/

include("version.php");
?>