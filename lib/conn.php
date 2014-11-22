<?php
$c = mysql_connect('localhost', 'root', 'vertrigo');
mysql_select_db('buriphp');
// trata o encoding
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');