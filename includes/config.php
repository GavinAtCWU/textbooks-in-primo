<?php

// API keys
define('WORLDCAT_REG_ID', 1234);
define('WORLDCAT_CLIENT_ID', 'worldcat-client-id');
define('WORLDCAT_SECRET', 'worldcat-secret');
define('PRIMO_SEARCH_API_KEY', 'primo-search-api-key');

// MySQL setup, change as necessary
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'mysql-user-with-privileges-for-database');
define('MYSQL_PASS', 'mysql-user-password');
define('MYSQL_DB', 'mysql-database-name');

// Field mappings
define('FIELDS', array(
		'textbook_title' => array(
		),
		'textbook_isbn' => array(
		),
		'course_name' => array(
		),
		'course_section' => array(
		),
		'course_professor_name' => array(
		),
		'course_professor_email' => array(
		)
	)
);

/* #### DO NOT EDIT ANYTHING BELOW THIS LINE!!! #### */

try {
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
} catch (mysqli_sql_exception $e) {
	print "MySQL connection failed: " . $e->getMessage();
}


?>
