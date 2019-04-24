<?php
$ttsengines = FreePBX::Ttsengines();
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed');}
	$edit = $_GET['edit'];
	$enginename = false;
	$enginepath = false;
	// Handle adding/updating an engine
	if (((isset($_REQUEST['delete']) && $_REQUEST['delete']) || ($_REQUEST['action'] == 'delete'))
		&& isset($_REQUEST['engineid'])){
		ttsengines_delete_engine($_REQUEST['engineid']);
	}
	else if ($_POST['edit']){
		$ttsengines->update($_POST['engineid'], $_POST['enginename'], $_POST['enginepath']);
		redirect_standard();
	}
	else if ($_POST['addengine']){
		$ttsengines->add($_POST['enginename'], $_POST['enginepath']);
		redirect_standard();
	}

	$engines = $ttsengines->listAll();
	$info = show_help(_('On this page you can manage text to speech engines on your system. When you add an engine you give it a name, and the full path to the engine on your system. After doing this the engine will be available on the text to speech page.'));
	$heading = _('Text to Speech Engines');
	$delurl = '';
	$vars = array();
	if(isset($_REQUEST['view']) && $_REQUEST['view'] == 'form'){
		if(isset($edit)){
			$vars['data'] = $ttsengines->getEngine($edit);
			$data = $vars['data'];
			$vars['enginename'] = isset($data['name'])?$data['name']:'';
			$vars['enginepath'] = isset($data['path'])?$data['path']:'';
			$vars['delurl'] = '?display=ttsengines&action=delete&engineid='.$edit;
			$vars['edit'] = $edit;
		}
		$vars['all_engines'] = $engines;

		$content = load_view(__DIR__.'/views/form.php',$vars);
	}else{
		$content = load_view(__DIR__.'/views/grid.php',$vars);
	}

?>
<div class="container-fluid">
	<h1><?php echo $heading?></h1>
		<?php echo $info?>
	<div class = "display full-border">
		<div class="row">
			<div class="col-sm-12">
				<div class="fpbx-container">
					<div class="display full-border">
						<?php echo $content ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
