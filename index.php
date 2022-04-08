<?php 
// ============================================================================
// => HTML HEADER
echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<title>HOT DOGS</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="is.css">
	</head>
<body>';

// ============================================================================
// system seting
error_reporting(E_ALL);
ini_set('display_errors', True);
date_default_timezone_set('Europe/Bratislava');

// ============================================================================
// read data
#require 'appl_config_data.php';
require 'access_data.php';
#require 'is_funkcie.php';

// ============================================================================
// => connect to DB

$continue = false;

$db_link = @mysql_connect($sql_server,$sql_user,$sql_pwd);
if($db_link) {

	if(@mysql_query("set character set utf8") ) {
		
		if(@mysql_select_db($sql_db)) {

#echo $sql_query.'<br>';

			unset($tmp_action);
			
			$tmp_action = explode(',',$_POST['my_action']);
			
#print_r($tmp_action);
			
			if($tmp_action[1] == 'add_info') {
				
				$beh_info = addslashes($_POST['beh_info']);

				$sql_query = " update aaa_dog set beh_info = '".$beh_info."' ";

#echo $sql_query;

				$result = @mysql_query($sql_query);
				@mysql_free_result($result);
			}	
			
			if($tmp_action[1] == 'd1_+') {
				$sql_query = " update aaa_dog set draha_1 = draha_1 + 1 ";
				$result = @mysql_query($sql_query);
				@mysql_free_result($result);
			}

			if($tmp_action[1] == 'd1_-') {
				$sql_query = " update aaa_dog set draha_1 = draha_1 - 1 ";
				$result = @mysql_query($sql_query);
				@mysql_free_result($result);
			}
			
			if($tmp_action[1] == 'd1_0') {
				$sql_query = " update aaa_dog set draha_1 = 0 ";
				$result = @mysql_query($sql_query);
				@mysql_free_result($result);
			}
			
			
			if($tmp_action[1] == 'd2_+') {
				$sql_query = " update aaa_dog set draha_2 = draha_2 + 1 ";
				$result = @mysql_query($sql_query);
				@mysql_free_result($result);
			}

			if($tmp_action[1] == 'd2_-') {
				$sql_query = " update aaa_dog set draha_2 = draha_2 - 1 ";
				$result = @mysql_query($sql_query);
				@mysql_free_result($result);
			}
			
			if($tmp_action[1] == 'd2_0') {
				$sql_query = " update aaa_dog set draha_2 = 0 ";
				$result = @mysql_query($sql_query);
				@mysql_free_result($result);
			}
		#	print_r($tmp_action);


		// ----------------------------------------------------------------------------

			$sql_query = " select * from aaa_dog";
			
			$result = @mysql_query($sql_query);
			$kolo = @mysql_fetch_assoc($result);
			@mysql_free_result($result);
			
			echo '<table width="800" align="center">

			<tr>
				<th colspan="2" style="font-size:36;"><hr>'.$kolo['beh_info'].'<hr></th>
			</tr>
			
			<tr>
				<td align="center">
				
				<b style="font-size:36;">Dráha 1</b>
				
				<br>
				
				<b style="font-size:72;">'.$kolo['draha_1'].'</b>
			
				<form action="index.php" method="post">
					<input type="hidden" name="my_action" value="race,d1_+">
					<input type="submit" name="submit" value="+" title="Preteky" style="font-size:72;width:200;background-color:Green;">
				</form>
				
				<br>
				
				<form action="index.php" method="post">
					<input type="hidden" name="my_action" value="race,d1_-">
					<input type="submit" name="submit" value="-" title="Preteky" style="font-size:72;width:200;background-color:Red;">
				</form>
				
				<br>
				
				<form action="index.php" method="post">
					<input type="hidden" name="my_action" value="race,d1_0">
					<input type="submit" name="submit" value="reset" title="Preteky" style="font-size:72;width:200;background-color:transparent;">
				</form>
				
				
				</td>
				
				<td align="center">
				
				
				<b style="font-size:36;">Dráha 2</b>
				
				<br>
				
				<b style="font-size:72;">'.$kolo['draha_2'].'</b>
				
				<form action="index.php" method="post">
					<input type="hidden" name="my_action" value="race,d2_+">
					<input type="submit" name="submit" value="+" title="Preteky" style="font-size:72;width:200;background-color:Green;">
				</form>
				
				<br>
				
				<form action="index.php" method="post">
					<input type="hidden" name="my_action" value="race,d2_-">
					<input type="submit" name="submit" value="-" title="Preteky" style="font-size:72;width:200;background-color:Red;">
				</form>

				<br>
				
				<form action="index.php" method="post">
					<input type="hidden" name="my_action" value="race,d2_0">
					<input type="submit" name="submit" value="reset" title="Preteky" style="font-size:72;width:200;background-color:transparent;">
				</form>

				</td>
			
			</tr>
			
			
			<tr>
				<th colspan="2">
				<hr>
				<form action="index.php" method="post">
					<input type="text" name="beh_info" value="'.$kolo['beh_info'].'" style="width:690;">
					<input type="hidden" name="my_action" value="race,add_info">
					<input type="submit" name="submit" value="Zapíš" title="Preteky" style="font-size:10;width:100;background-color:transparent;">
				</form>
				<hr>
				</th>
			</tr>
			
			
			</table>';

		};	// if(@mysql_select_db($sql_db)) ...
		
	};	// if(@mysql_query("SET CHARACTER SET utf8") ) ...
	
}; // if(@mysql_query("SET CHARACTER SET utf8") ) ...

} else {

echo @mysql_error();

}; // if($db_link) ...


echo '</body>
</html>';

// => ukoncenie spojenia s db
@mysql_close($db_link);
?>