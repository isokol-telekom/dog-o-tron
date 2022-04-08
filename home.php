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
// => connect to DB

require 'access_data.php';

$db_link = @mysql_connect($sql_server,$sql_user,$sql_pwd);
if($db_link) {

	if(@mysql_query("set character set utf8") ) {
		
		if(@mysql_select_db($sql_db)) {
			$continue = true;
			
			echo '<hr>';
			
// ----------------------------------------------------------------------------

	$sql_query = " select * from aaa_dog";

#echo $sql_query.'<br>';

	$result = @mysql_query($sql_query);
	$kolo = @mysql_fetch_assoc($result);
	@mysql_free_result($result);
	
	echo '<table width="800" align="center">
	
	<tr>
		<th colspan="2">'.'.$kolo['beh_info'].'.'</th>
	</tr>

	<tr>
		<td align="center">
		
		<b style="font-size:72;">'.$kolo['draha_1'].'</b>

	
		</td>
		
		<td align="center">
		
		<b style="font-size:72;">'.$kolo['draha_2'].'</b>

		
		
		</td>
	
	</tr>
	</table>';

		};	// if(@mysql_select_db($sql_db)) ...
		
	};	// if(@mysql_query("SET CHARACTER SET utf8") ) ...
	
};	// if($db_link) ...


echo '</body>
</html>';

// => ukoncenie spojenia s db
@mysql_close($db_link);
?>