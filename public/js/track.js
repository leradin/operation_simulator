  	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});

	// Table Tracks
	$('#table_tracks').dataTable({
		"bPaginate": true,
		"bSort": true,
		"sSearch" : true,
		"bPaging":         false,
		"oLanguage": {
		    "sUrl": appUrl+"js/plugins/datatables/Spanish.js"
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

	function saveImageSymbology(dataURL,sidc){
    	$.ajax({
	        type: "GET",
            url: appUrl+"saveImageSymbology",
            data: { 
                imgBase64: dataURL,
                sidc :sidc
            }
        }).done(function(o) {
	    	console.log('saved'); 
    	});
    }