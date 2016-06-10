<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed');}
//	License for all code of this FreePBX module can be found in the license file inside the module directory
//	Copyright 2013 Schmooze Com Inc.
//


function ttsengines_get_all_engines()
{
	global $db;
	
	$sql = "select * from ttsengines";

	$results = $db->getAll($sql, DB_FETCHMODE_ASSOC);

	if (DB::IsError($results)) 
	{
		die_freepbx($result->getDebugInfo());
	}

	return $results;
}

function ttsengines_add_engine($enginename, $enginepath)
{
	global $db;

	$sql = "insert into ttsengines (name, path) values('$enginename', '$enginepath')";
	sql($sql);
}

function ttsengines_update_engine($engineid, $enginename, $enginepath)
{
	global $db;

	$sql = "update ttsengines set name = '$enginename', path = '$enginepath' where id = $engineid";
	sql($sql);
}

function ttsengines_delete_engine($engineid)
{
	global $db;

	$sql = "delete from ttsengines where id = $engineid";
	sql($sql);
}

function ttsengines_get_engine_path($enginename)
{
        global $db;

        $sql = "select path from ttsengines where name = '$enginename'";
        return $db->getRow($sql, DB_FETCHMODE_ASSOC);
}


function ttsengines_hook_grammar($viewing_itemid, $target_menuid) {
   	
    global $db;
    $engines = ttsengines_get_all_engines();
    
    //Determine which engine is currently selected
    $sql = "select tts_engine from grammar_config";
    $selected_ttsengine = $db->getRow($sql, DB_FETCHMODE_ASSOC);
	
    if ($target_menuid = "grammar")
    {
    
    $html.='<tr><td><a href=# class="info">'._("Text-to-Speech Engine:").'<span>'._("Choose either the free Flite engine (requires flite and app_flite) or the paid Cepstral engine (requires app_cepstral)").'<br></span></a></td><td align="right">';
    $html.='<select name="tts_engine" tabindex="'.++$tabindex.'">';

        if (empty($engines))
        {
            $html .= '<option value="flite">Flite</option>';
			$html .= '<option value="Swift" >Cepstral</option>';
        } else {
            //the grammar module doesn't care about the path but actually wants the application name
			foreach($engines as $engine)
            {
                $enginename = $engine['name'];
                $enginepath = $engine['path'];
                $html .= '<option value="';
                $html .= "$enginename";
                $html .= '"';
				//Show our use the one that have currently selected per our grammar_config database
				if ($selected_ttsengine['tts_engine'] == $enginename)
				{
					$html .= 'SELECTED';
				}
				$html .= '>';
                $html .= "$enginename";
                $html .= '</option>';
            }
        }
    
        $html .= '</select>';
		$html.='</td></tr>';
    }
    return $html;
}

function ttsengines_hookProcess_grammar($viewing_itemid,$request) {
	//dbug($_REQUEST);
	global $db;
	if ($_REQUEST['display'] == "grammar" && $_REQUEST['action']=='edtSpeech')
	{
		$results = $db->query("UPDATE grammar_config SET tts_engine='" .$_REQUEST['tts_engine']. "'");

	}
}
?>
