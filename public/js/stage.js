$(document).ready(function(){
	table = $('#table_meteorological_phenomenons').dataTable({
		"bPaginate": true,
		"bSort": true,
		"sSearch" : true,
		"bPaging": false,
		"bDestroy": true,
		"oLanguage": {
		    "sUrl": appUrl+"js/plugins/datatables/Spanish.js"
		},
		"aoColumnDefs": [
            { "bVisible": true, "aTargets": [0] }
        ]
	});
 
	/* Add a click handler to the rows - this could be used as a callback */
	$("#table_meteorological_phenomenons tbody tr").click( function( ) {
		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');			
		}else{
			table.$('tr.active').removeClass('active');
			$(this).addClass('active');
			var position = table.fnGetPosition(this); // getting the clicked row position
			var meteorologicalPhenomenonId = table.fnGetData(position)[0];
			$('#meteorological_phenomenon_id').val(meteorologicalPhenomenonId);
			$("#mModal").modal('show');
			isMeterologicalPhenomenon = false;
			//processData(getStage(stageId));
		}
	});

	$(window).bind('resize', function () {
    	table.fnAdjustColumnSizing();
  	});
});