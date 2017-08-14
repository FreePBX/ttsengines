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
	$("#enginename").val(input);
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
			return true;
		});
		$('form').submit(function(e) {
			if (!e.isDefaultPrevented()){
				$(".destdropdown2").filter(".hidden").remove();
		        }
		});
	}
});
