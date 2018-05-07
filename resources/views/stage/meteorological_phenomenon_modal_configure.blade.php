   <!-- Bootrstrap modal form meterological phenomenon -->
    <div id="mModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="myModalLabel">Modal</h3>
                    </div>
                <div class="modal-body">
                <div class="row">
                    <div class="block-fluid">
                        <form id="form_modal_meterological_phenomenon">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div id="map-meterological-phenomenon" style="width: 100%; height: 400px; display: inherit;"></div> 
                                    <p class="help-block">@lang('messages.required_select_point_on_map')</p>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        {!! Form::text('init_position_meterological_phenomenon_',null,array('class' => 'form-control validate[required] text-input','id' => 'init_position_meterological_phenomenon_','placeholder' => __('messages.init_position'),'data-prompt-position' => "bottomLeft",'readonly' => true)) !!}

                                        {!! Form::text('init_position_meterological_phenomenon',null,array('class' => 'form-control validate[required,funcCall[validateCoordinate[2]]] text-input','id' => 'init_position_meterological_phenomenon','data-prompt-position' => "bottomLeft")) !!}
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::number('radio',0,array('class' => 'form-control validate[required,min[0],max[1000]] text-input','id' => 'radio','data-prompt-position' => "bottomLeft")) !!}
                                        <p class="help-block">@lang('messages.radio')</p>
                                    </div>
                                </div>
                            </div>
                        </form>      
                    </div>
                </div>                   
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" id="button_config_meterological_phenomenon" aria-hidden="true">@lang('messages.save')</button> 
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">@lang('messages.close')</button>          
                    </div>
            </div>
        </div>
    </div> 