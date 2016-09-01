<?php
$dataurl = "ajax.php?module=ttsengines&command=getJSON&jdata=grid";
?>
<div id="toolbar-all">
	<a href="?display=ttsengines&view=form" class="btn btn-default"><i class ="fa fa-plus"></i>&nbsp;<?php echo _("Add TTS Engine");?></a>
</div>
<table id="ttsenginrgrid" data-url="<?php echo $dataurl?>" data-cache="false" data-toolbar="#toolbar-all" data-maintain-selected="true" data-show-columns="true" data-show-toggle="true" data-toggle="table" data-pagination="true" data-search="true" class="table table-striped">
	<thead>
		<tr>
			<th data-field="path" data-sortable="true"><?php echo _("Path")?></th>
			<th data-field="name" data-sortable="true"><?php echo _("Engine")?></th>
			<th data-field="id" data-formatter="linkFormatter" class="col-md-2"><?php echo _("Actions")?></th>
		</tr>
	</thead>
</table>
<script>

function linkFormatter(value, row, index){
	var html = '<a href="?display=ttsengines&view=form&edit='+value+'"><i class="fa fa-pencil"></i></a>';
	html += '&nbsp;<a href="?display=ttsengines&action=delete&engineid='+value+'" class="delAction"><i class="fa fa-trash"></i></a>';
	return html;
}
</script>
