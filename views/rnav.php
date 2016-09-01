
<table data-url="ajax.php?module=ttsengines&amp;command=getJSON&amp;jdata=grid" data-cache="false" data-toggle="table" data-search="true" class="table" id="table-all-side">
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
