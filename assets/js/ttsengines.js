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
