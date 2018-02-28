$(document).ready(function(){
	// General
	$("a,button,span,select").tooltip({
		show: {
		    effect: "slideDown",
		    delay: 250
		}
	});

	var table = $('#table').dataTable({
		"bPaginate": true,
		"bSort": true,
		"sSearch" : true,
		"bPaging": false,
		"bDestroy": true,
		"oLanguage": {
		    "sUrl": "http://127.0.0.1:8000/js/plugins/datatables/Spanish.js"
		},
		//"aoColumnDefs": [
        //    { "bVisible": false, "aTargets": [0] }
        //]
	}).fnDestroy();

	$(window).bind('resize', function () {
    	table.fnAdjustColumnSizing();
  	});

	// Table Tracks
	$('#table_tracks').dataTable({
		"bPaginate": true,
		"bSort": true,
		"sSearch" : true,
		"bPaging":         false,
		"oLanguage": {
		    "sUrl": "http://127.0.0.1:8000/js/plugins/datatables/Spanish.js"
		},
		"aoColumnDefs": [
    	{
    	    "mRender": function ( data, type, row ) {
                return testRender2(data);
            },
            "aTargets": [4]
        }
        ]
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
	    dateFormat: 'dd/mm/yy',
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


	$("#table tbody tr").click( function( e ) {
		var sTitle;
        var nTds = $('td', this);
        var sBrowser = $(nTds[1]).text();
        var sGrade = $(nTds[-1]).text();
        if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
        }
        else {
            $('#table tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
            
        }
    });

  

});