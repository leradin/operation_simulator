// Validate that unit type "Mando" not request motors number
$('#unit_type_id').live('change',function(){

	// If value is equal to 4 then hidden field "number_engines" 
	// Else show field "number_engines"
	if($(this).val() == 4){
		$('#number_engines').attr('disabled',true).hide();
		$('#number_engines').parent().prev().hide();
		$('#number_engines').next().hide();
	}else{
		$('#number_engines').attr('disabled',false).show();
		$('#number_engines').parent().prev().show();
		$('#number_engines').next().show();
	}
});

