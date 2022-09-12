
<?php
//connection to mysql
$db = new mysqli('localhost', 'root', 'kiki', 'projectdcb');
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}
?>