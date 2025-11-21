<?php

// MySQL setup, change as necessary
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'mysql-user-with-privileges-for-database');
define('MYSQL_PASS', 'mysql-user-password');
define('MYSQL_DB', 'mysql-database-name');

// CSV column mappings

/* #### DO NOT EDIT ANYTHING BELOW THIS LINE!!! #### */

try {
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
} catch (mysqli_sql_exception $e) {
	print "MySQL connection failed: " . $e->getMessage();
}


?>
