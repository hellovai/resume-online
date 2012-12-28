<?php
mysql_connect($config['db_hostname'], $config['db_username'], $config['db_password']) or die();
mysql_select_db($config['db_name']);
?>
