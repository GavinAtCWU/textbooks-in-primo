<ul id="menu">
<?php

$links = array(
	'display_textbooks' => 'Display Textbooks',
	'import_csv' => 'Import CSV File'
);
foreach($links as $action => $label) {
	$class = '';
	if(!isset($_REQUEST['action']) && $action == 'display_textbooks') {
		$class = ' class="selected"';
	}
	else if($_REQUEST['action'] == $action) {
		$class = ' class="selected"';
	}
 	print "<li><a href=\"?action=$action\"$class>$label</a></li>\n";
}

?>
</ul>
