$(document).ready(function(){

	// General
	$("a,button,span,select").tooltip({
		show: {
		    effect: "slideDown",
		    delay: 250
		}
	});
	table = $('#table').dataTable({
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
	$("#table tbody tr").click( function( ) {
		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');			
		}else{
			table.$('tr.active').removeClass('active');
			$(this).addClass('active');
			var position = table.fnGetPosition(this); // getting the clicked row position
			var stageId = table.fnGetData(position)[0];
			$('#stage_id').val(stageId);
			processData(getStage(stageId));
		}
	});

	$(window).bind('resize', function () {
    	table.fnAdjustColumnSizing();
  	});

	$.datepicker.regional['es'] = {
	    closeText: 'Cerrar',
	    prevText: '<Ant',
	    nextText: 'Sig>',
	    currentText: 'Hoy',
	    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
	    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
	    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
	    weekHeader: 'Sm',
	    dateFormat: 'yy-mm-dd',
	    firstDay: 1,
	    isRTL: false,
	    showMonthAfterYear: false,
	    yearSuffix: ''
  	};

  	$.datepicker.setDefaults($.datepicker.regional['es']);

	$.timepicker.setDefaults($.timepicker.regional['es']);
	$('.datetime').datetimepicker({
		timeFormat: 'HH:mm:ss'
	});
});
