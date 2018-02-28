$(document).ready(function(){
    // Bootstrap tooltip
    $(".tip").tooltip({placement: 'top', trigger: 'hover'});
    $(".tipb").tooltip({placement: 'bottom', trigger: 'hover'});
    $(".tipl").tooltip({placement: 'left', trigger: 'hover'});
    $(".tipr").tooltip({placement: 'right', trigger: 'hover'});
    
    if($('#main_calendar').length > 0){
    
        // fullcalendar
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var calendar = $('#main_calendar').fullCalendar({
                header: {		
                        left: 'prev,next',
                        center: 'title',
                        right: '',
                        right: 'month,agendaWeek,agendaDay'
                },   
                selectable: true,
                selectHelper: true,
                select: function(start, end) {

                        $('#fcAddEvent').modal('show');

                        $("#fcAddEventButton").click(function(){

                            var title = $("#fcAddEventTitle").val();

                            if(title){
                                calendar.fullCalendar('renderEvent',
                                            {
                                                    title: title,
                                                    start: start,
                                                    end: end
                                            },true
                                    );
                                    notify('Fullcalendar','New Event: '+title+';<br/>start: '+start+';<br/>end: '+end+';');
                            }

                            $('#fcAddEvent').modal('hide'); 
                            $("#fcAddEventTitle").val('');
                            calendar.fullCalendar('unselect');
                        });                    
                },
                editable: true,
                eventDrop: function(event, delta) {               
                    notify('Fullcalendar','Event: '+event.title+' = '+delta);
                },
                //eventSources: ['php/ajax_fullcalendar.php']            
                events: {
                    url: "php/ajax_fullcalendar.php",
                    success: function(){
                        notify('Fullcalendar','Success ajax load');
                    }
                }
        });    

    }
    
    // Pnotify notifier
        $.pnotify.defaults.history = false;
        $.pnotify.defaults.delay = 3000;                                      
               
    // Fancybox
    if($("a.fb").length > 0){
        $("a.fb").fancybox({padding: 10,
                            'transitionIn'  : 'elastic',
                            'transitionOut' : 'elastic',
                            'speedIn'       : 600, 
                            'speedOut'      : 200
                        });
    }
    // Uniform
        $("input:checkbox, input:radio").not('input.ibtn').uniform();
    
    // Select2
    if($(".select").length > 0){
        $(".select").select2({
             maximumSelectionLength: 2
        });
        $(".select")
        .on("change", function(e) {             
            notify('Select','Value changed: '+e.val);
            console.log(e);
        });
        }
    // Tagsinput
    if($(".tags").length > 0)
        $(".tags").tagsInput({'width':'100%',
                              'height':'auto',
                              'onAddTag': function(text){
                                notify('Tags input','Added tag: '+text);
                              },
                              'onRemoveTag': function(text){
                                notify('Tags input','Removed tag: '+text);  
                              }});
        
    // Masked input        
    if($("input[class^=mask_]").length > 0){
        $("input.mask_tin").mask('99-9999999',{completed:function(){
                                                notify('Masked input','mask_tin completed');                                                
                                              }});
        $("input.mask_ssn").mask('999-99-9999',{completed:function(){
                                                notify('Masked input','mask_ssn completed');                                                
                                              }});        
        $("input.mask_date").mask('9999-99-99',{completed:function(){
                                                notify('Masked input','mask_date completed');
                                              }});
        $("input.mask_product").mask('a*-999-a999',{completed:function(){
                                                notify('Masked input','mask_product completed');
                                              }});
        $("input.mask_phone").mask('99 (999) 999-99-99',{completed:function(){
                                                notify('Masked input','mask_phone completed');
                                              }});
        $("input.mask_phone_ext").mask('99 (999) 999-9999? x99999',{completed:function(){
                                                notify('Masked input','mask_phone_ext completed');
                                              }});
        $("input.mask_credit").mask('9999-9999-9999-9999',{completed:function(){
                                                notify('Masked input','mask_credit completed');
                                              }});        
        $("input.mask_percent").mask('99%',{completed:function(){
                                                notify('Masked input','mask_percent completed');
                                              }});                                          
    }
    itemLast = {};
    // Multiselect    
    if($("#ms").length > 0)
        $("#ms").multiSelect({
            afterSelect: function(value, text){
                notify('Opcion','Seleleccionada: '+text+'['+value+']');
            },
            afterDeselect: function(value, text){
                notify('Opcion','Deseleccionada: '+text+'['+value+']');
            }});

    if($("#ms_stage").length > 0)
        $("#ms_stage").multiSelect({
            afterSelect: function(value, text){
                notify('Cabinas','Seleccionada: '+text+'['+value+']');
                $("#fModal").modal('show');
                itemLast.key = value;
                itemLast.value = text;
                $(".modal-title").text("Configuración de la cabina "+itemLast.value); 
            },
            afterDeselect: function(value, text){
                notify('Cabinas','Deseleccionada: '+text+'['+value+']');
                $('#'+value).remove();
                //$('#ms_stage').multiSelect('deselect', value);
            }});



    
    if($("#msc").length > 0){
        $("#msc").multiSelect({
            selectableHeader: "<div class='multipleselect-header'>Selectable item</div>",
            selectedHeader: "<div class='multipleselect-header'>Selected items</div>",
            afterSelect: function(value, text){
                notify('Multiselect','Selected: '+text+'['+value+']');
            },
            afterDeselect: function(value, text){
                notify('Multiselect','Deselected: '+text+'['+value+']');
            }            
        });
        
        $("#ms_select").click(function(){
            $('#msc').multiSelect('select_all');
        });
        $("#ms_deselect").click(function(){
            $('#msc').multiSelect('deselect_all');
        });        
    }
    
    
    // Breadcrumb
    if($(".breadCrumb").length > 0) $(".breadCrumb").jBreadCrumb({easing:'swing'});
    
    // Validation
    if($("#validate").length > 0)
        $("#validate, #validate_custom").validationEngine('attach',{promptPosition : "topLeft"});
    
    // Datepicker
    $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
    
    if($("#datepicker").length > 0){
        
        $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd',
                                       onSelect: function(date){
                                            notify('Datepicker', 'Date: '+date)
                                     }});
    }
        
    
    // Wizard
    if($("#wizard").length > 0) $('#wizard').stepy();
    
    if($("#wizard_validate").length > 0){
        
        $("#wizard_validate").validationEngine('attach',{promptPosition : "topLeft"});
        
        $('#wizard_validate').stepy({
            back: function(index) {                                                                
                //if(!$("#wizard_validate").validationEngine('validate')) return false; //uncomment if u need to validate on back click                
            }, 
            next: function(index) {                
                if(!$("#wizard_validate").validationEngine('validate')) return false;                
            }, 
            finish: function(index) {                
                if(!$("#wizard_validate").validationEngine('validate')) return false;
            }            
        });
    }

    if($("#wizard_ajax").length > 0){
        
        $("#wizard_ajax").validationEngine('attach',{promptPosition : "topLeft"});
        
        $('#wizard_ajax').stepy({
            back: function(index) {                
                return false;
            }, 
            next: function(index) {                
                if(!$("#wizard_ajax").validationEngine('validate')) return false;
                
                
                
                if((index-2) == 0){
                    $.post('php/ajax_wizard.php',{login: $("#wizard_ajax input[name=login]").val(),
                                                email: $("#wizard_ajax input[name=email]").val()},
                                                function(data){
                                                        if(data == 'success')
                                                            $('#wizard_ajax').stepy('step', index);
                                                        else
                                                            $('#wizard_ajax input[name=login]').validationEngine('showPrompt', 'Response doesn\'t match', 'error','topLeft', true);
                                                });                    
                    return false;
                }                                                
                                
                if((index-2) == 1){
                    $.post('php/ajax_wizard.php',{hash: $("#wizard_ajax input[name=hash]").val()},
                                                  function(data){
                                                    if(data == 'success')
                                                        $('#wizard_ajax').stepy('step', index);
                                                    else
                                                        $('#wizard_ajax input[name=hash]').validationEngine('showPrompt', 'Response doesn\'t match', 'error','topLeft', true);
                                                  });                                
                    return false;
                }

            },
            finish: function(index) {                
                if(!$("#wizard_ajax").validationEngine('validate')) return false;
                
                notify('Wizard','Form #wizard_ajax submited with:<br/>'+$("#wizard_ajax").serialize());
            }            
        });
    }

    // eof wizard
    
    // accordion
    if($(".accordion").length > 0) $(".accordion").accordion({heightStyle: "content"});
    // eof accordion
    
    // tabs
    if($(".tabs").length > 0) $(".tabs").tabs();
    // eof tabs
    
    // sortable    
    if($("#sort_1").length > 0){
        $("#sort_1").sortable();
        $("#sort_1").disableSelection();    
    }
    // eof sortable
    
    // selectable 
    if($("#select_1").length > 0) $("#select_1").selectable();
    //eof selectable
    
    // progressbars
    if($("#progressbar_default").length > 0)
        $("#progressbar_default").progressbar({value: 65});
    
    if($("#progressbar_animated").length > 0){        
        $("#progressbar_animated").progressbar({value: 0});
        $("#sAProgress").click(function(){
            $("#progressbar_animated").progressbar('destroy');
            var iNow = new Date().setTime(new Date().getTime() + 0 * 1000);
            var iEnd = new Date().setTime(new Date().getTime() + 5 * 1000);
            $("#progressbar_animated").anim_progressbar({start: iNow, finish: iEnd, interval: 1});
        });
    }
    
    if($("#progressbar_delay").length > 0){        
        $("#progressbar_delay").progressbar({value: 0});
        $("#sWDProgress").click(function(){
            $("#progressbar_delay").progressbar('destroy');
            var iNow1 = new Date().setTime(new Date().getTime() + 3 * 1000);
            var iEnd1 = new Date().setTime(new Date().getTime() + 6 * 1000);
            $("#progressbar_delay").anim_progressbar({start: iNow1, finish: iEnd1, interval: 1});
        });
    }
    // eof progressbars
    
    // spinner
        $( "#spinner" ).spinner();
        $( "#spinner1" ).spinner({culture: "en-US", min: 5, max: 1000, step: 10, start: 10, numberFormat: "C"});
    // eof spinner
    
    // sliders
        $("#slider_1").slider({
            value: 60,
            orientation: "horizontal",
            range: "min",
            animate: true,
            slide: function( event, ui ) {
                $( "#slider_1_amount" ).html( "$" + ui.value );
            },
            stop: function( event, ui ) {
                notify('Slider','#slider_1: '+ui.value);
            }
        });
        
        $("#slider_2").slider({
            values: [ 17, 67 ],
            orientation: "horizontal",
            range: true,
            animate: true,
            slide: function( event, ui ) {
                $( "#slider_2_amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            },
            stop: function( event, ui ) {
                notify('Slider','#slider_2: '+ui.values[0]+' - '+ui.values[ 1 ]);
            }            
        });    
            
        $("#slider_3").slider({
            orientation: "vertical",
            range: "min",
            min: 0,
            max: 100,
            value: 10,            
            stop: function( event, ui ) {
                notify('Slider','#slider_3: '+ui.value);
            }            
        }); 

        $("#slider_4").slider({
            orientation: "vertical",
            range: true,
            values: [ 17, 67 ],
            stop: function( event, ui ) {
                notify('Slider','#slider_4: '+ui.values[0]+' - '+ui.values[1]);
            }
        }); 

        $("#slider_5").slider({
            orientation: "vertical",            
            range: "max",
            min: 1,
            max: 10,
            value: 2,
            stop: function( event, ui ) {
                notify('Slider','#slider_5: '+ui.value);
            }            
        });     
    // eof sliders
    
    // popovers
    
    $("#popover_top").popover({placement: 'top', title: 'Popover title', content: 'Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit.'});
    $("#popover_right").popover({placement: 'right', title: 'Popover title', content: 'Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit.'});
    $("#popover_bottom").popover({placement: 'bottom', title: 'Popover title', content: 'Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit.'});
    $("#popover_left").popover({placement: 'left', title: 'Popover title', content: 'Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit.'});
    
    // eof popovers
    
    // jQuery dialogs

        $("#jDialog_default").dialog({autoOpen: false});        
        $("#jDialog_default_button").click(function(){
            $("#jDialog_default").dialog('open');
        });
        
        $("#jDialog_modal").dialog({autoOpen: false, modal: true});        
        $("#jDialog_modal_button").click(function(){
            $("#jDialog_modal").dialog('open');
        });        
        
        $("#jDialog_form").dialog({autoOpen: false, 
                                modal: true,
                                width: 400,
                                buttons: {                            
                                    "Submit": function() {
                                        $( this ).dialog( "close" );
                                    },
                                    Cancel: function() {
                                        $( this ).dialog( "close" );
                                    }
        }});
    
        $("#jDialog_form_button").click(function(){$("#jDialog_form").dialog('open')});        
        
        
        
    // eof dialogs
    
    // dataTable
        if($(".table").length > 0)
            $(".table").dataTable({bFilter: false, bInfo: false, bPaginate: false, bLengthChange: false,                                                                       
                                   bSort: true,
                                   bAutoWidth: true,
                                   "aoColumnDefs": [{"bSortable": false,
                                                     "aTargets": [ -1 , 0]}]});
        if($(".fTable").length > 0)
            $(".fTable").dataTable({bSort: true, 
                                    "iDisplayLength": 10, "aLengthMenu": [5,10,25,50,100], // can be removed for basic 10 items per page
                                    "aoColumnDefs": [{"bSortable": false,
                                                     "aTargets": [ -1 , 0]}]});
        
        if($(".fpTable").length > 0)
            $(".fpTable").dataTable({bSort: true, 
                                     bAutoWidth: true,
                                    "iDisplayLength": 5, "aLengthMenu": [5,10,25,50,100], // can be removed for basic 10 items per page
                                    "sPaginationType": "full_numbers",
                                    "aoColumnDefs": [{"bSortable": false,
                                                     "aTargets": [ -1 , 0]}]});
        
        if($(".aTable").length > 0){
            $(".aTable").dataTable({bSort: true,                                     
                                    "sPaginationType": "full_numbers",
                                    "bProcessing": true,
                                    "sAjaxSource": 'php/ajax_datatable.php'});        
                                
                                
            setTimeout(function(){
                $(".navigation").height($(document).height()-30);
            },500);
        }
        
    // eif dataTable
    
    // media         
    if($("#video").length > 0){        
        var video = new MediaElementPlayer('#video',{
            success: function(media, node, player){                   
                var events = ['loadstart', 'play','pause', 'ended'];
                
                for (var i=0, il=events.length; i<il; i++) {
                    media.addEventListener(events[i], function(e) {
                            notify('Video','#video: '+ e.type);
                    });                    
                }      
                
            }
        });                        
        
        $("#videoPlay").click(function(){            
            video.play();
        });
        $("#videoPause").click(function(){            
            video.pause();
        });
    }
    if($('audio').length > 0 || $('video').length > 0) $('audio,video').mediaelementplayer();
    // eof media
    
    //wysiwyg editor
    if($("#wysiwyg").length > 0){
        wEditor = $("#wysiwyg").cleditor({width:"100%", height:"300px"});
    }          
    if($("#mail_wysiwyg").length > 0)
        m_editor = $("#mail_wysiwyg").cleditor({width:"100%", height:"100%",controls:"bold italic underline strikethrough | font size style | color highlight removeformat | bullets numbering | outdent alignleft center alignright justify"})[0].focus();    
    
    // eof wysiwyg editor
    
    //syntax highlight
    if($("pre[class^=brush]").length > 0){
        SyntaxHighlighter.defaults['toolbar'] = false;
        SyntaxHighlighter.all();   
    }
    //eof syntax highlight
    
    // easy pie chart
    if($(".epc-green").length > 0)
        $('.epc .epc-green').easyPieChart({animate: 100,barColor: '#468847',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square'});
    if($(".epc-orange").length > 0)
        $('.epc .epc-orange').easyPieChart({animate: 100, barColor: '#F89406',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square'});
    if($(".epc-red").length > 0)
        $('.epc .epc-red').easyPieChart({animate: 100,barColor: '#B94A48',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square'});    
    if($(".epcm-green").length > 0)
        $('.epc .epcm-green').easyPieChart({animate: 100,barColor: '#468847',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square',size: 90});
    if($(".epcm-orange").length > 0)
        $('.epc .epcm-orange').easyPieChart({animate: 100, barColor: '#F89406',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square',size: 90});
    if($(".epcm-red").length > 0)
        $('.epc .epcm-red').easyPieChart({animate: 100,barColor: '#B94A48',trackColor: '#FFFFFF',scaleColor: '#888888',lineWidth: '5',lineCap: 'square',size: 90});        
    
    // eof easy pie chart
    
    // knob circle charts
    if($(".knob").length > 0 && $.browser.version != '8.0') 
        $(".knob").knob();    
    else
       $(".kchart").html('doesnt supported');
    // eof knob    
    
    // file tree
    if($("#fileTree").length > 0){
        $("#fileTree").fileTree({ root: '../../assets/filetree/', script: 'php/filetree/jqueryFileTree.php' }, function(file) { 
            notify('File Tree','File: '+file);            
        });        
    }
    if($("#fileTree1").length > 0){
        $("#fileTree1").fileTree({ root: '../../assets/filetree/', script: 'php/filetree/jqueryFileTree.php' }, function(file) { 
            notify('File Tree','File: '+file);            
        });        
    }    
    // eof file tree
    
    // File uploader
    if($("#uploader_v5").length > 0){
        $("#uploader_v5").pluploadQueue({		
                runtimes : 'html5',
                url : 'php/pluploader/upload.php',
                max_file_size : '1mb',
                chunk_size : '1mb',
                unique_names : true,
                dragdrop : true,
                resize : {width : 320, height : 240, quality : 100},
                filters : [
                        {title : "Image files", extensions : "jpg,gif,png"},
                        {title : "Zip files", extensions : "zip"}
                ],
                FilesAdded: function(editor,files){
                    alert(files);
                }
        });
    }
    if($("#uploader_v4").length > 0){
        $("#uploader_v4").pluploadQueue({		
                runtimes : 'html4',
                url : 'php/pluploader/upload.php',
                unique_names : true,
                filters : [
                        {title : "Image files", extensions : "jpg,gif,png"},
                        {title : "Zip files", extensions : "zip"}
                ]
        });
    }   
    // eof file uploader
    
    // sparklines 

        $(".mChartBar").sparkline('html',{ enableTagOptions: true, disableHiddenCheck: true});
        
    // eof sparklines
        
    /* Draggable blocks */        
    
    if($(".sortableContent").length > 0){

        var scid = 'sC_'+$(".sortableContent").attr('id');
        //$.cookies.del( scid );
        var sCdata = $.cookies.get( scid );          
        
        if(null != sCdata){
            for(row=0;row<Object.size(sCdata); row++){                
                for(column=0;column<Object.size(sCdata[row]);column++){                    
                    for(block=0;block<Object.size(sCdata[row][column]);block++){                        
                        $("#"+sCdata[row][column][block]).appendTo(".sortableContent .scRow:eq("+row+") .scCol:eq("+column+")");                        
                    }
                }               
            }            
        }                                   
       
        $(".sortableContent .scCol").sortable({
            connectWith: ".sortableContent .scCol",
            items: "> .widget",
            handle: ".head",
            placeholder: "scPlaceholder",
            start: function(event,ui){
                $(".scPlaceholder").height(ui.item.height());
            },
            stop: function(event, ui){                                

                var sorted = {};
                var row = 0;
                $(".sortableContent .scRow").each(function(){                    
                    sorted[row] = {};
                    $(this).find(".scCol").each(function(){
                        var column = $(this).index();                        
                        sorted[row][column] = {};

                        $(this).find('.widget').each(function(){
                            sorted[row][column][$(this).index()] = $(this).attr('id');
                        });
                    });
                    row++;
                });
                alert(JSON.stringify(sorted));
                $.cookies.set( scid, JSON.stringify(sorted));                
            }
        }).disableSelection();
    }
    /* eof Draggable blocks */  
    
    // slidernav
    if($(".slidernav").length > 0)
        $(".slidernav").sliderNav();
    
    // eof slidernav
    
    // isotope gallery
    if($('#isotope').length > 0)
        $('#isotope').isotope({    
            itemSelector : '.item',
            layoutMode : 'fitRows'
        });
    
    
    $("#removeFilter").click(function(){
        $('#isotope').isotope({ filter: '' });
    });    
    $("#filterByCity").click(function(){
        $('#isotope').isotope({ filter: '.city' });
    });
    $("#filterByNature").click(function(){
        $('#isotope').isotope({ filter: '.nature' });
    });
    $("#filterByCats").click(function(){
        $('#isotope').isotope({ filter: '.cat' });
    });    
    // eof isotope gallery
    
    
    // jCrop, image cropping        
    if($('#cropping').length > 0)
        $('#cropping').Jcrop({            
            onSelect: function(cords){
                notify('Cropping','width: '+Math.ceil(cords.w)+'x'+Math.ceil(cords.h)+'<br/> Coords: x: '+Math.ceil(cords.x)+'; y: '+Math.ceil(cords.y)+'; x2: '+Math.ceil(cords.x2)+'; y2: '+Math.ceil(cords.y2));
                $('#crop_x').val(cords.x);
                $('#crop_y').val(cords.y);
                $('#crop_w').val(cords.w);
                $('#crop_h').val(cords.h);
            },
            setSelect: [ 150,50, 360,50 ],
            aspectRatio: 16 / 9
        });       
   
    // eof jCrop
    //jNotes
    if($('.jquery-note').length > 0)
        $('.jquery-note').jQueryNotes({operator: 'php/jnotes/notes.php',allowLink: false});    
    // eof jNotes
    
    //ibuttons
    if($('.ibtn').length > 0)
        $('.ibtn').iButton();
    // eof ibuttons

   // new selector case insensivity        
        $.expr[':'].containsi = function(a, i, m) {
            return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };        
   // 
});

$(window).load(function(){
    
    // Gallery Grid    
    if($(".gGallery").length>0){        
      
      $('.gGallery li').wookmark({autoResize: true,        
                                  offset: 5,
                                  container: $('.gGallery'),
                                  itemWidth: 110});
    }    
    
    // custom scrollbar        
    if($(".scroll").length > 0)
        $(".scroll").mCustomScrollbar();
    // eof custom scrollbar    
    
    // Scroll up plugin
     $.scrollUp({scrollText: '^'});
    // eof scroll up plugin
});

$('.wrapper').resize(function(){

    if($("#wysiwyg").length > 0) editor.refresh();
    if($("#mail_wysiwyg").length > 0) m_editor.refresh();
    
});


function notify(title, text){
    
    $.pnotify({
        title: title,
        text: text,
        addclass: 'custom',
        hide: true,
        opacity: .8,
        nonblock: true,
        nonblock_opacity: .5
    });            
}

Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
