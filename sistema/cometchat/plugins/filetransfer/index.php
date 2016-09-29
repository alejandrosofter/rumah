<?php

include dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."plugins.php";

$toId = $_GET['id'];

echo <<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Enviar un Archivo</title> 

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
    text-align: center;
}

.small {
	font-weight:bold;
}
</style>

<script type="text/javascript" src="styleinput.js"></script>

<style type="text/css" title="text/css">

.SI-FILES-STYLIZED label.cabinet
{
	width: 97px;
	height: 25px;
	background: url(send.gif) 0 0 no-repeat;

	display: block;
	overflow: hidden;
	cursor: pointer;
}

.SI-FILES-STYLIZED label.cabinet input.file
{
	position: relative;
	height: 100%;
	width: auto;
	opacity: 0;
	-moz-opacity: 0;
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
}

</style>

</head>
<body><form name="upload" action="upload.php" method="post" enctype="multipart/form-data">
<div style="width:98%;margin:0 auto;margin-top: 5px;">
<div style="border-left: 1px solid #11648F;border-top: 1px solid #11648F;border-right: 1px solid #11648F;background-color:#3E92BD;color:#fff;padding:5px;font-weight:bold;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size: 14px;letter-spacing:0px;padding-left:10px;text-align:left;">&iquest;Qu&eacute; archivo deseas enviar?</div>

<div style="border-left: 1px solid #cccccc;border-bottom: 1px solid #cccccc;border-right: 1px solid #cccccc;background-color:#fffff;color:#333;padding:5px;font-weight:normal;font-family:'lucida grande',tahoma,verdana,arial,sans-serif;font-size:11px;padding:20px 10px;text-align:left;">

<div style="padding-bottom:15px;text-align:left;">Por favor selecciona el archivo clickeando el siguiente bot&oacute;n.</div>
<div id="select-0" style="text-decoration:none;color:#333;text-align:left;display:block;height:30px;padding-bottom:10px;"><label class="cabinet"><input type="file" class="file" name="Filedata" onchange="javascript:document.upload.submit()"/></label></div>

<div style="clear:block"></div>


<div style="text-align:left;"><b>IMPORTANTE:</b> No env&iacute;es material protegido por Derechos de Autor. Estar&aacute;s violando el permiso o derecho del propietario.</div>

<input type="hidden" name="to" value="{$toId}">

</div>
</div>
</div>

<script>
SI.Files.stylizeAll();
</script>
</form>
</body>
</html>
EOD;
