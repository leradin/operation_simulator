/*  Exercise */
	var studentsArray = getStudents();
	var source = Rx.Observable.fromArray(studentsArray);
	
	var subscription = source.subscribe(
    function (x) {
        console.log('Next: ' + x);
    },
    function (err) {
        console.log('Error: ' + err);
    },
    function () {
        console.log('Completed');
    });

    const subject = new Rx.Subject();

	subject.subscribe(x => console.log(x),
                  error => console.error(error),
                  () => console.log('done'));

  	var tableMeteorologicalPhenomenons = $('#meteorological_phenomenons').dataTable({
		"bPaginate": true,
		"bSort": true,
		"sSearch" : true,
		"bPaging": false,
		"oLanguage": {
		    "sUrl": appUrl+"js/plugins/datatables/Spanish.js"
		},
		//"aoColumnDefs": [{
    	    //"mRender": function ( data, type, row ) {
            //    return testRender2(data);
            //},
        //    "aTargets": [4]
        //}]
	});

	/* Add a click handler to the rows - this could be used as a callback */
	$("#meteorological_phenomenons tbody tr").click( function( ) {
		if ( $(this).hasClass('active') ) {
			$(this).removeClass('active');			
		}else{
			tableMeteorologicalPhenomenons.$('tr.active').removeClass('active');
			$(this).addClass('active');
			var position = tableMeteorologicalPhenomenons.fnGetPosition(this); // getting the clicked row position
			var stageId = tableMeteorologicalPhenomenons.fnGetData(position)[0];
			$('#meteorological_phenomenon_id').val(stageId);
			//processData(getStage(stageId));
		}
	});

	function processData(dataArray){
		$('#extra-info').empty();
		$.each(dataArray,function(i,cabin) {
			var cabinHtml = "<div class='col-md-4'>"+
                "<div class='widget'>"+
                    "<div class='head'>"+
                        "<div class='icon'><i class='icosg-star3'></i></div>"+
                        "<h2>"+cabin.name+"</h2>"+                        
                        "<div class='items' style='width: 100px;'>"+
                            "<div class='progress small'>"+
                            	"<div class='progress-bar progress-bar-warning tip' style='width: "+((cabin.computers.length*100)/5)+"%;' data-original-title='70%'></div>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                    "<div class='block-fluid events'>";
			var computerHtml;
			$.each(cabin.computers,function(j, computer) {
				computerHtml =  "<div class='item'>"+
                        			"<div class='date'>"+
	                                	"<div class='caption'><span class='glyphicon glyphicon-star'></span></div>"+
	                                	"<span class='day'>"+computer.id+"</span>"+
	                                	"<span class='month'>"+computer.label_arduino+"</span>"+
	                            	"</div>"+
	                            	"<div class='info'>"+
		                                "<a href='#'>"+computer.name+"</a>"+
		                                "<p>Etiqueta "+computer.label_arduino+"</p>"+
		                                "<p>Dirección IP "+computer.ip_address+"</p>"+
		                                "<div class='TAR'>"+
	                                	"<select name=student[] id="+computer.id+" class=validate[required]>"+
	                                	"<option value=>Seleccionar Estudiante</option>";
	                    				$.each(studentsArray,function(i,student){
	                                    	computerHtml += "<option value="+student.id+"_"+computer.id+">("+student.enrollment+") "+student.degree.name+" - "+student.names+" "+student.lastnames+" - "+student.ascription.abbreviation+"</option>";
	                                	});
		                                computerHtml += "</select></div>"+                                
	                            	"</div>"+
                        		"</div>";
                        		cabinHtml+=computerHtml;
			});

			cabinHtml += "</div>"+
                "</div>"+                
        	"</div>";
        	$('#extra-info').append(cabinHtml);
        	$(window).trigger('resize');
		});
	}

	function getStage(exerciseId){
		var result = "";

		$.ajax({
			url: appUrl+"/getStage/"+exerciseId,
			async:false,
			success:function(data){
				result = data;
			}
		});

		return result;
	}

	function getStudents(){
		var result = "";

		$.ajax({
			url: appUrl+"/getStudents",
			async:false,
			success:function(data){
				result = data;
			}
		});
		console.log(result);
		return result;
	}

	function getTracks(){
		var result = "";

		$.ajax({
			url: appUrl+"/getTracks",
			async:false,
			success:function(data){
				result = data;
			}
		});
		console.log(result);
		return result;
	}

	$('select').live('change',function(){
		studentsArray.push({'alma' : 'alama'});
	});

	function removeItem(value){
		$.grep(studentsArray, function(element) {
			console.log(element.id);
   			return element.id != value
		});
	}

	/////
	var max_fields      = 500; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var trackForm = '<div class="row">'+
            '<div class="col-md-2"><input type="text" placeholder="Blanco '+x+'" class="form-control validate[required,maxSize[50]] text-input" name="track[]"/>'+
            '</div>'+
            	'<div class="col-md-1">'+
                	'<input type="text" placeholder="Rumbo '+x+'" class="form-control validate[required,maxSize[50]] text-input" name="course[]"/>'+
                '</div>'+
                '<div class="col-md-1">'+
                	'<input type="text" placeholder="Velocidad '+x+'" class="form-control validate[required,maxSize[50]] text-input" name="speed[]"/>'+
                '</div>'+
                '<div class="col-md-2">'+
                	'<input type="text" onclick="openModalMap(this)" readonly="readonly" placeholder="Posición '+x+'" class="form-control validate[required,maxSize[50]] text-input" name="position[]"/>'+
                '</div>'+
                '<div class="col-md-2">'+
                	'<select class="validate[required]" name="object_type[]" class="validate[required]">'+
            		'<option value="">Tipo de Objeto</option>'+
            		'<option value="1">PI</option>'+
            		'<option value="2">PO</option>'+
            		'<option value="3">KING_AIR</option>'+
            		'<option value="4">BOAT (GO FAST)</option>'+
                	'</select>'+
                '</div>'+
            	'<div class="col-md-3">'+
                	'<select class="validate[required]" id="symbology'+x+'" name="symbology[]">'+
            		'<option value="">Tipo de Blanco</option>';
            		$.each(getTracks(),function(i,el){
    					trackForm += '<option value="'+el.value+'" data-imagesrc="'+el.imageSrc+'">'+el.text+'</option>';
            		});
                	trackForm += '</select>'+
                '</div>'+
                '<a href="#" class="btn btn-link remove_field">Quitar</a>'+
            '<hr /></div>'; //add input box
            $(wrapper).append(trackForm);
            createDdSlick("symbology"+x);
            $(window).trigger('resize');
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).closest('div .row').remove(); x--;
    });


	$('#symbology1').ddslick({
		height : '300px',
    	onSelected: function(selectedData){
        //callback function: do something with selectedData;
    	}   
	});

	$('#enable_track').on('change', function() {
		if($(this).is(':checked')) {
			// enable all elements form tracks
			$(".input_fields_wrap *").attr("disabled", false);
			return false;
		}
		// disable all elements form tracks
		$(".input_fields_wrap *").attr("disabled", "disabled").off('click');
	});

	function createDdSlick(idElement){
		$('#'+idElement).ddslick({
			height : '300px',
	    	onSelected: function(selectedData){
	        //callback function: do something with selectedData;
	    	}   
		});
	}

	$(window).trigger('resize');