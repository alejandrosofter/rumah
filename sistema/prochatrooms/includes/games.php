<?php
#############################################
# Author: Pro Chatrooms
# Software: Pro Chatrooms
# Url: http://www.prochatrooms.com
# Support: support@prochatrooms.com
# Copyright 2007-2008 All Rights Reserved
#############################################
if(!file_exists("../globals.php")){die;}
include("../globals.php");
include("../db.php");

if(isset($_SESSION['pro_chatrooms_admin']) && $_SESSION['pro_chatrooms_password_admin'] == md5($admin_password)){

// delete games

if (isset ( $_POST['submit'] )) {
if (isset ( $_POST['del'] )) {
$delete_item = $_POST['del'];
foreach ( $delete_item as $deleting_item ) { 
mysql_query("DELETE FROM prochatrooms_games 
WHERE game_ID = '".$deleting_item."'");
$game_deleted ='1';

}
}
}

// add game

if($_POST && $add_new_game && !isset ($_POST['del'])){

$check_game_exists="
SELECT *
FROM prochatrooms_games 
WHERE game_SwfFile = '$_swf' 
ORDER BY game_ID ASC
";

$find_game=mysql_query($check_game_exists);
$games_num_rows = mysql_num_rows($find_game);

if($games_num_rows){$game_exists='1';}else{

// do image upload
$folder = "../games/images/";
$img_name = $_FILES['_thumbnail']['name'];
$img_tmp_name = $_FILES['_thumbnail']['tmp_name'];
$img_ext = strtolower(substr($_FILES['_swf']['name'], -3));
if($type == 'img' && ($ext != 'jpg' && $ext != 'gif' && $ext != 'png' && $ext != 'bmp')){$game_image_error='1';}
else{copy ($img_tmp_name, $folder."/".$img_name) or die ("Error: could not upload image");}

// do .swf upload
$folder = "../games/swf/";
$swf_name = $_FILES['_swf']['name'];
$swf_tmp_name = $_FILES['_swf']['tmp_name'];
$swf_ext = strtolower(substr($_FILES['_swf']['name'], -3));
if($swf_ext!='swf'){$game_format_error='1';}
else{copy ($swf_tmp_name, $folder."/".$swf_name) or die ("Error: could not upload .swf file");}

if(!$game_format_error && !$game_image_error){

// if alls ok, add to database

$sql = "INSERT INTO prochatrooms_games (
game_SwfFile, 
game_Thumb, 
game_Name, 
game_Width, 
game_Height,
game_Desc
) VALUES (
'$swf_name', 
'$img_name',  
'".htmlspecialchars($_title, ENT_QUOTES)."',
'".htmlspecialchars($_width, ENT_QUOTES)."' ,
'".htmlspecialchars($_height, ENT_QUOTES)."',
'".htmlspecialchars($_description, ENT_QUOTES)."'
)";mysql_query($sql) or die(mysql_error());
$game_created = '1';
}
}
}

// update games

if($_POST && $edit_room && !isset ($_POST['del'])){

$sql = "UPDATE prochatrooms_games SET 
game_Name = '".htmlspecialchars($_title, ENT_QUOTES)."',
game_Width = '".htmlspecialchars($_width, ENT_QUOTES)."' ,
game_Height = '".htmlspecialchars($_height, ENT_QUOTES)."',
game_Desc = '".htmlspecialchars($_description, ENT_QUOTES)."'
WHERE game_ID = '$gID'";mysql_query($sql) or die(mysql_error());
$game_edited = '1';

}

// get rooms

if (!$r){$r='0';}
$t_results=10;

$tmp=mysql_query("
SELECT *
FROM prochatrooms_games 
ORDER BY game_ID ASC LIMIT $r , $t_results
"); 

if($game_image_error || $game_format_error || $game_deleted || $game_exists || $game_created || $game_edited){
echo "<br><table width='100%' border='0' class='message_input'><tr><td><font color=red>";

if($game_format_error){echo "Error - Game thumbnail must be either, .jpg, .gif, .png or .bmp<br>";}
if($game_format_error){echo "Error - Game must be .swf<br>";}
if($game_deleted){echo "Success! Game has been deleted...<br>";}
if($game_exists){echo "Game already exists... Please choose another game to upload.<br>";}
if($game_created){echo "Success! New game has been created...<br>";}
if($game_edited){echo "Success: Game details have been updated...<br>";}

echo "</font></td></tr></table>";
}

$_SESSION['do_gID'] = '';
$_SESSION['do_gname'] = '';
$_SESSION['do_gdesc'] = '';
$_SESSION['do_gwidth'] = '';
$_SESSION['do_gheight'] = '';

if($do=='edit'){

$tmp=mysql_query("SELECT * FROM prochatrooms_games WHERE game_ID = '".mysql_real_escape_string($game)."'"); 
while($i = mysql_fetch_array($tmp)) {
$_SESSION['do_gID'] = $i['game_ID'];
$_SESSION['do_gname'] = $i['game_Name'];
$_SESSION['do_gdesc'] = $i['game_Desc'];
$_SESSION['do_gwidth'] = $i['game_Width'];
$_SESSION['do_gheight'] = $i['game_Height'];
}

}
?>

<br>

<table width="100%" align="center" class="message_input" border=0>
<form name='edit_game' enctype='multipart/form-data' action='index.php?action=games&r=<?php echo $pagea;?>' method='post'>
<?php if($do=='edit'){?>
<input type="hidden" name="edit_room" value="1">
<input type="hidden" name="gID" value="<?php echo $_SESSION['do_gID'];?>">
<?php }else{?>
<input type="hidden" name="add_new_game" value="1">
<?php }?>
<tr><td colspan="2">
<?php if($do=='edit'){?>
<b>Edit Game Details*</b>
<?php }else{?>
<b>Add New Game*</b>
<?php }?>
</td></tr>

<tr><td width="100">
Title:
</td><td>
<input type="text" name="_title" value="<?php echo $_SESSION['do_gname'];?>">
</td></tr>

<tr><td width="100">
Description:
</td><td>
<textarea cols="27" rows="5" name="_description"><?php echo $_SESSION['do_gdesc'];?></textarea>
</td></tr>

<?php if($do!='edit'){ ?>

<tr><td width="100">
Thumbnail:
</td><td>
<input type="file" name="_thumbnail">
</td></tr>

<tr><td width="100">
.SWF File:
</td><td>
<input type="file" name="_swf">
</td></tr>

<?php }?>

<tr><td width="100">
Width:
</td><td>
<input type="text" name="_width" value="<?php echo $_SESSION['do_gwidth'];?>" size="4">pixels
</td></tr>

<tr><td width="100">
Height:
</td><td>
<input type="text" name="_height" value="<?php echo $_SESSION['do_gheight'];?>" size="4">pixels
</td></tr>

<tr><td width="100">
&nbsp;
</td><td>
<?php if($do=='edit'){?>
<input type="submit" name="submit" value="Update Game">
<?php }else{?>
<input type="submit" name="submit" value="Add Game">
<?php }?>
</td></tr>
</form>
</table>


<br>

<script language="javascript">
<!--
// this function loads the share file
function playGames(gameID, gWidth, gHeight){
window.open('../games/play.php?id='+ gameID,'playgames','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=1,width= '+ gWidth +' ,height= '+ gHeight +' ,left=380,top=220');
}
// -->
</script>

<?php

if($do!='edit'){

echo "<form name='game_details' action='index.php?action=games' method='post'>";
echo "<input type='hidden' name='r' value='".$r."'>";
echo "<table width='100%' border='0' class='message_input'>";
echo "<tr><td width='5%'><b>Image</b></td><td width='15%'><b>Title</b></td><td width='65%'><b>Description</b></td><td width='5%' align='center'><b>Play</b></td><td width='5%' align='center'><b>Edit</b></td><td width='5%' align='center'><b>Delete</b></td></tr>";

while($i = mysql_fetch_array($tmp)) {

if($i['game_Desc']==''){$i['game_Desc']='<i>- none -</i>';}

// define heights
$new_width = $i['game_Width'] +8;
$new_height = $i['game_Height'] +8;

$i['game_Thumb'] = "<img src='../games/images/".$i['game_Thumb']."' height='60' width='70' border='0'>";

echo "<tr><td width='5%'>".$i['game_Thumb']."</td><td width='15%'>".$i['game_Name']."</td><td width='65%'>".html_entity_decode($i['game_Desc'])."</td><td width='5%' align='center'><a href='javascript:playGames(".$i['game_ID'].",".$new_width.",".$new_height.");'><img src='../games/joystick.gif' border=0></a></td><td width='5%' align='center'><a href='index.php?action=games&do=edit&game=".$i['game_ID']."'><img src='images/edit.gif' height='24' width='24' border='0'></a></td><td width='5%' align='center'><input type='checkbox' name='del[]' value='".$i['game_ID']."'></td></tr>";

}

$count_games = mysql_num_rows($tmp);
if($count_games){
echo "<tr><td colspan='5'>&nbsp;</td><td align='center'><input type='submit' name='submit' value='Submit'></td></tr>";
}else{
echo "<tr><td colspan='6'>&nbsp;</td></td></tr>";
echo "<tr><td colspan='6' align='center'>There are no games to display - (<a href='index.php?action=games'>Refresh Page</a>)</td></td></tr>";
}

echo "</table>";
echo "<form>";
echo "<br>";

}

?>

<?php if($do!='edit'){ ?>

<table width="100%" align="center" class="message_input" border=0>
<tr><td colspan="2">
<b>*IMPORTANT</b>: You must CHMOD the folders '<font color=red>prochatrooms/games/images</font>' and '<font color=red>prochatrooms/games/swf</font>' to 755, 775 or 777 (dependent on your server settings).
</td></tr>
</table>
<br>

<?php }?>


<?php if($do!='edit'){ ?>

<table width="100%" align="center" class="message_input"><tr><td align="center">

<?php

$sql="
SELECT *
FROM prochatrooms_games 
ORDER BY game_ID ASC
";

$result=mysql_query($sql);
$tnum_rows = mysql_num_rows($result);
$num_rows = mysql_num_rows($result);
$num_rows = ceil($num_rows/$t_results);

?>

Displaying 
<?php 
$rr = $r + 1;
if ($tnum_rows == '0') {$rr = $rr-1;} 
echo "$rr -";
$re = $r + $t_results;
if ($re > $tnum_rows){echo " $tnum_rows";}else{echo " $re";}
?>
&nbsp;of 
<?php echo $tnum_rows;?> 
Results
<br>

<?php

$pagea = $r - $t_results;

if ($pagea < 0){$pagea = 0;}

if ($r != '0'){?><a href="?action=games&r=<?php echo $pagea;?>" title="<<< Prev"><<< Prev</a><php ?}?>
&nbsp;
<?php 

$pageb = $r + $t_results; 
if ($r == 0){$r = $r - $t_results;} 

if ($tnum_rows != '0'){
if ($pageb != $num_rows * $t_results){
?>
<a href="?action=games&r=<?php echo $pageb;?>" title="Next >>>">Next >>></a>
<?php 
}
}
}
if($r==0 && $tnum_rows != '0' && $tnum_rows >= $t_results){?>
<a href="?action=games&r=<?php echo $t_results;?>" title="Next >>>">Next >>></a>
<?php }?>
</td></tr></table>
</td></tr></table>

<?php }?>

<?php
}else{die;}
?>