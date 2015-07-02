<?php

$dbh = mysql_connect(SQLHOST, SQLUSERNAME, SQLPASSWORD);
mysql_select_db(SQLDATABASE);

@mysql_query("SET NAMES 'utf8'");

	
?>
