/*
* play sound
*
*/

function doSound(playSound)
{
	var flashvars = {};
	flashvars.sndfilename = playSound;
	var params = {};
	params.play = "true";
	params.loop = "false";
	params.menu = "false";
	params.scale = "noscale";
	params.wmode = "transparent";
    params.height = "100";
    params.width = "100";
	var attributes = {};
	attributes.align = "top";
	swfobject.embedSWF("swf/playSnd.swf", "playSndDiv", "100%", "100%", "9.0.0", "swf/expressInstall.swf", flashvars, params, attributes);
}