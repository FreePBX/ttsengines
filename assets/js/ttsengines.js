var custom = '<input type="text" id="enginename" name="enginename" class="form-control">';
$("#enginename").change(function() {
	if($(this).val() == "custom") {
		var val = $(this).data("value");
		$(this).after(custom);
		$(this).remove();
		$("#enginename").val(val);
	}
});

if($("#enginename").val() == "custom") {
	var input = $("#enginename").data("value");
	$("#enginename").after(custom);
	$("#enginename").remove();
	$("#enginename").val(val);
}
$(document).ready(function() {
	var theForm = document.frm_ttsengines;
	if(typeof theForm !== 'undefined'){
		$('form').unbind( "submit");
		$('form[name="frm_ttsengines"]').submit(function() {
			var tmp_path = theForm.enginepath.value.trim();
			if (tmp_path == ""){
				return warnInvalid(theForm.enginepath, _("Please enter a valid Engine Path."));
			}else{
				if($.inArray(tmp_path, enginepaths) != -1){
					return warnInvalid(theForm.enginepath, tmp_path  + _(" already used, please use a different Engine Path."));
			        }
		 	}
			var tmp_name = theForm.enginename.value.trim();
			if (tmp_name == ""){
				return warnInvalid(theForm.enginename, _("Please enter a valid Engine Name."));
			}else{
				if($.inArray(tmp_name, enginenames) != -1){
					return warnInvalid(theForm.enginename, tmp_name  + _(" already used, please use a different Engine Name."));
				}
			}
			return true;
		});
		$('form').submit(function(e) {
			if (!e.isDefaultPrevented()){
				$(".destdropdown2").filter(".hidden").remove();
		        }
		});
	}
});
