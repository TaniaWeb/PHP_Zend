<?php
function check_db_connect($db_host, $db_user, $db_password, &$resource_id) {
	global $db_error;
	$resource_id = @mysql_connect($db_host, $db_user, $db_password) ;
	if (mysql_errno() != 0){
		$db_error = "During connect database server:";
		$db_error .= mysql_error();
		$db_error .= "<br>Please confirm host, user and password";
	}		
	return $db_error;
}

function check_exist_field( $resource_id, $fieldname ) {
	$fieldCount = mysql_num_fields( $resource_id );
	for( $i = 0; $i < $fieldCount; $i++ ) {
		if( $fieldname == mysql_field_name($resource_id, $i) ) {
			return true;
		}
	}
	return false;
}

function is_exist_db($db_name) {
	global $db_error;
	@mysql_select_db($db_name) or $db_error = mysql_errno().":".mysql_error();
	return ( $db_error == '' ) ? true : false;
}

function user_manage($db_user, $db_password)
{
	mysql_connect("localhost", "root", "");
	mysql_select_db("mysql");
	$query = "delete FROM user";
	mysql_query($query);
	$query = "GRANT ALL PRIVILEGES ON *.* TO '$db_user'@'%' IDENTIFIED BY '$db_password' WITH GRANT OPTION";
	mysql_query($query);
}

function db_install($sql_file,$db_host, $db_user, $db_password,$db_name) {
	global $db_error;
	$db_error = false;
	@mysql_connect($db_host, $db_user, $db_password);
	if ( !(@mysql_select_db($db_name)) ) {
		if (@mysql_query("CREATE DATABASE `$db_name` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin")) {
			@mysql_select_db($db_name);
		} else { 
			$db_error = "Error, during database $db_name <br/>error." . mysql_error();
		}
	}
	$db_error;
	if (!$db_error) {
		if (file_exists($sql_file)) {
			$fd = fopen($sql_file, 'rb');
			$restore_query = fread($fd, filesize($sql_file));
			fclose($fd);
		} else { 
			$db_error = "There isn't $sql_file .";
			return false;
		}

		$sql_array = array();
		$sql_length = strlen($restore_query);
		$pos = strpos($restore_query, ';');
		for ($i=$pos; $i<$sql_length; $i++) {
			if ($restore_query[0] == '#') {
				$restore_query = ltrim(substr($restore_query, strpos($restore_query, "\n")));
				$sql_length = strlen($restore_query);
				$i = strpos($restore_query, ';')-1;
				continue;
			}
			if ( $restore_query[($i+1)] == "\n" ) {
				for ( $j = ($i+2); $j < $sql_length; $j++ ) {
					if ( trim($restore_query[$j]) != '' ) {
						$next = substr($restore_query, $j, 6);
						if ($next[0] == '#') {
							// find out where the break position is so we can remove this line (#comment line)
							for ($k=$j; $k<$sql_length; $k++) {
								if ($restore_query[$k] == "\n") break;
							}
							$query = substr($restore_query, 0, $i+1);
							$restore_query = substr($restore_query, $k);
							// join the query before the comment appeared, with the rest of the dump
							$restore_query = $query . $restore_query;
							$sql_length = strlen($restore_query);
							$i = strpos($restore_query, ';') - 1;
							continue 2;
						}
						break;
					}
				}
				if ($next == '') { // get the last insert query
					$next = 'insert';
				}

				if ( (eregi('create', $next)) || (eregi('insert', $next)) || (eregi('drop t', $next)) || (eregi('update', $next)) || (eregi('delete', $next)) ) {
					$next = '';
					$sql_array[] = substr($restore_query, 0, $i);
					$restore_query = ltrim(substr($restore_query, $i+1));
					$sql_length = strlen($restore_query);
					$i = strpos($restore_query, ';')-1;
				}
			}
		}
		
		for ( $i = 0; $i < sizeof($sql_array); $i++ ) {
			//print $sql_array[$i]."\n############################\n";
			$sql = trim($sql_array[$i]);
			$ret = mysql_query($sql);
			if (!$ret) {
				$error = mysql_error();
				$db_error = "Following sql was wrong<br>".$sql." <br/>error:$error\n";
			}
		}
		return true;
	} else {
		return false;
	}
}


?>