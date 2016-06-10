<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed');}
global $db;

$sql = "create table if not exists ttsengines (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), path VARCHAR(255))";

$result = $db->query($sql);

if(DB::IsError($result)) 
{
	die_freepbx($result->getDebugInfo());
}

$sql = "SELECT name FROM ttsengines where name = 'flite'";

$check = $db->getRow($sql, DB_FETCHMODE_ASSOC);

if(empty($check)) 
{
	$sql = "insert into ttsengines (name, path) values('flite', '/usr/bin/flite')";
	$result = $db->query($sql);

	if(DB::IsError($result)) 
	{
                die_freepbx($result->getDebugInfo());
	} 
}
