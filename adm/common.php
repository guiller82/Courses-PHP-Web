<?php

$dbh = mysql_connect(SQLHOST,SQLUSERNAME,SQLPASSWORD);
mysql_select_db(SQLDATABASE);
@mysql_query("SET NAMES 'utf8'");

function Logout()
{
session_unregister("session");
session_unset();
session_destroy();
}

?>
