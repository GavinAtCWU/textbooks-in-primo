<?php

define('TEST_MODE_ONLY', true);
define('TEST_ISBN', '9780395362907'); // The Hobbit

include('includes/config.php');
include('includes/class.tip.php');
$tip = new TIP();

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
<title>Textbooks In Primo (TIP)</title>
<style>
<?php include('style.css'); ?>
</style>
<script>
<?php include('script.js'); ?>
</script>
</head>

<body>

<h1><a href="index.php"><b>T</b>extbooks <b>I</b>n <b>P</b>rimo</a></h1>

<div id="content">

<h2>Setup Results</h2>

<?php

if(USE_WORLDCAT_API) {
	print "<h3>Test WorldCat Search API:</h3>\n";
	$tip->get_isbns_worldcat(TEST_ISBN, WORLDCAT_API_CLIENT_ID, WORLDCAT_API_SECRET, WORLDCAT_API_URL_BASE, TEST_MODE_ONLY);
}

print "<h3>Test Primo / Alma APIs:</h3>\n";
$tip->get_isbns_primo(TEST_ISBN, PRIMO_SEARCH_API_URL, TEST_MODE_ONLY);

print "<h3>Test MySQL Database Connection:</h3>\n";
try {
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
	print "<p class=\"success\">MySQL connection successful.</p>\n";
} catch(mysqli_sql_exception $e) {
	print "<p class=\"error\">MySQL connection issue: '" . $e->getMessage() . "'</p>\n";
}

?>

</div>

</body>

</html>
