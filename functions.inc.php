<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed');}
//	License for all code of this FreePBX module can be found in the license file inside the module directory
//	Copyright 2013 Schmooze Com Inc.
//	Copyright 2018 Sangoma Technologies.



function ttsengines_get_all_engines(){
	return FreePBX::Ttsengines()->listAll();
}

function ttsengines_add_engine($enginename, $enginepath){
    return FreePBX::Ttsengines()->add($enginename, $enginepath);
}

function ttsengines_update_engine($engineid, $enginename, $enginepath){
    return FreePBX::Ttsengines()->update($engineid, $enginename, $enginepath);
}

function ttsengines_delete_engine($engineid){
    return FreePBX::Ttsengines()->delete($enginename);
}

function ttsengines_get_engine_path($enginename){
        global $db;
        $sql = "select path from ttsengines where name = '$enginename'";
        return $db->getRow($sql, DB_FETCHMODE_ASSOC);
}