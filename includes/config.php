<?php

/*
 * Customization Section
 */


/* APIs setup */

// Change false to true if you want to pool ISBN numbers from WorldCat in addition to Primo (OPTIONAL)
// You will need to also set valid values for WORLDCAT_API_CLIENT_ID and WORLDCAT_API_SECRET below.
define('USE_WORLDCAT_API', false);

// Change the default value (worldcat-client-id) to your client ID for the WorldCat Search API
define('WORLDCAT_API_CLIENT_ID', 'worldcat-client-id');

// Change the default value (worldcat-secret) to your secret for the WorldCat Search API
define('WORLDCAT_API_SECRET', 'worldcat-secret');

// Change the defult value (ex-libris-api-key) to your Ex Libris API key
define('EX_LIBRIS_API_KEY', 'ex-libris-api-key');

// Change the default value (primo-api-host) to the fully qualified hostname of your Primo API
// Ex: api-na.hosted.exlibrisgroup.com
define('PRIMO_API_HOST', 'primo-api-host');

// Change the default value (primo-local-tab) to your Primo *local* tab
// Ex: CWU_RESOURCES
define('PRIMO_LOCAL_TAB', 'primo-local-tab');

// Change the default value (primo-local-scope) to your Primo *local* scope
// Ex: CWU_RESOURCES
define('PRIMO_LOCAL_SCOPE', 'primo-local-scope');

// Change the default value (primo-vid) to your Primo view ID
// Ex: 01ALLIANCE_CWU:CWU
define('PRIMO_VID', 'primo-vid');


/* MySQL database setup */

define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'mysql-user-with-privileges-for-database');
define('MYSQL_PASS', 'mysql-user-password');
define('MYSQL_DB', 'mysql-database-name');


/* Fields setup */
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

/*
 * "DO NOT EDIT" Section
 */

define('WORLDCAT_API_URL_BASE', 'https://metadata.api.oclc.org/worldcat/search/brief-bibs?q=bn:');

define('PRIMO_SEARCH_API_URL', 'https://' .
	PRIMO_API_HOST .
	'/primo/v1/search?q=isbn,contains,ISBN&tab=' .
	PRIMO_LOCAL_TAB .
	'&scope=' .
	PRIMO_LOCAL_SCOPE .
	'&vid=' .
	PRIMO_VID .
	'&pcAvailability=true&limit=50&apikey=' .
	EX_LIBRIS_API_KEY
);

?>
