<div id="toolbar-cbbnav">
   <a href="?display=ttsengines" class="btn btn-default"><i class="fa fa-list"></i>&nbsp;<?php echo _("List TTS Engine")?></a>
   <a href='?display=ttsengines&view=form' class="btn btn-default"><i class = 'fa fa-plus'></i>&nbsp;<?php echo _("Add TTS Engine")?></a>
</div>
<table  id="table-all-side"
	data-url="ajax.php?module=ttsengines&amp;command=getJSON&amp;jdata=grid" 
	data-toolbar="#toolbar-cbbnav"
	data-cache="false" 
	data-toggle="table" 
	data-search="true" 
	class="table" 
	>
    <thead>
        <tr>
            <th data-sortable="true" data-field="path"><?php echo _('Path')?></th>
            <th data-sortable="true" data-field="name"><?php echo _('Engine')?></th>
        </tr>
    </thead>
</table>
<script type="text/javascript">

  $("#table-all-side").on('click-row.bs.table',function(e,row,elem){
     console.log(row);
    window.location = '?display=ttsengines&view=form&edit='+row['id'];
  })
</script>
