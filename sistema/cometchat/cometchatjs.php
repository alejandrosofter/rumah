<?php

/*

CometChat
Copyright (c) 2009 Inscripts

CometChat ('the Software') is a copyrighted work of authorship. Inscripts 
retains ownership of the Software and any copies of it, regardless of the 
form in which the copies may exist. This license is not a sale of the 
original Software or any copies.

By installing and using CometChat on your server, you agree to the following
terms and conditions. Such agreement is either on your own behalf or on behalf
of any corporate entity which employs you or which you represent
('Corporate Licensee'). In this Agreement, 'you' includes both the reader
and any Corporate Licensee and 'Inscripts' means Inscripts (I) Private Limited:

CometChat license grants you the right to run one instance (a single installation)
of the Software on one web server and one web site for each license purchased.
Each license may power one instance of the Software on one domain. For each 
installed instance of the Software, a separate license is required. 
The Software is licensed only to you. You may not rent, lease, sublicense, sell,
assign, pledge, transfer or otherwise dispose of the Software in any form, on
a temporary or permanent basis, without the prior written consent of Inscripts. 

The license is effective until terminated. You may terminate it
at any time by uninstalling the Software and destroying any copies in any form. 

The Software source code may be altered (at your risk) 

All Software copyright notices within the scripts must remain unchanged (and visible). 

The Software may not be used for anything that would represent or is associated
with an Intellectual Property violation, including, but not limited to, 
engaging in any activity that infringes or misappropriates the intellectual property
rights of others, including copyrights, trademarks, service marks, trade secrets, 
software piracy, and patents held by individuals, corporations, or other entities. 

If any of the terms of this Agreement are violated, Inscripts reserves the right 
to revoke the Software license at any time. 

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

include_once (dirname(__FILE__).DIRECTORY_SEPARATOR."config.php");

$useragent = (isset($_SERVER["HTTP_USER_AGENT"]) ) ? $_SERVER["HTTP_USER_AGENT"] : $HTTP_USER_AGENT;

if (phpversion() >= '4.0.4pl1' && (strstr($useragent,'compatible') || strstr($useragent,'Gecko'))) {
	if (extension_loaded('zlib')) {
		ob_start('ob_gzhandler');
	}
}

header('Content-type: text/javascript;charset=utf-8');
header('Expires: '.gmdate("D, d M Y H:i:s", time() + 3600*24*365).' GMT');

$settings = '';

for ($i=0;$i<count($language);$i++) {
	$settings .= "_2[".$i."] = '".$language[$i]."';\n";
}

for ($i=0;$i<count($trayicon);$i++) {
	$settings .= "_3[".$i."] = ['".implode("','",$trayicon[$i])."'];\n";
}

$settings .= "var _4 = ['".implode("','",$plugins)."'];\n";

$settings .= "var _5 = ".$autoPopupChatbox.";";
$settings .= "var _6 = ".$messageBeep.";";
$settings .= "var _7 = '".$theme."';";
$settings .= "var _8 = ".$minHeartbeat.";";
$settings .= "var _9 = ".$maxHeartbeat.";";
$settings .= "var _a = '".$cookiePrefix."';";

include_once (dirname(__FILE__)."/js/libraries.js");echo "\n\n";

include_once (dirname(__FILE__)."/js/cometchat.js");echo "\n\n";

foreach ($plugins as $plugin) {
	if ($plugin != 'divider') {
		include_once (dirname(__FILE__)."/plugins/".$plugin."/init.js");echo "\n\n";
	}
}
//$x0c="\x62a\x73\x656\x34\x5fd\x65c\157\144\x65";
//$x0d="\x64irn\141\155\145";include($x0d(__FILE__)."\x2f\154\151c\145\x6es\x65.\160\x68p");
//echo $x0c($x0c($license));
echo ('jqcc(document)["ready"]( function(){  jqcc["cometchat"](); jqcc["cometchat"]["eabad1be5eed94cb0232f71c2e5ce5"]()  }) ');

