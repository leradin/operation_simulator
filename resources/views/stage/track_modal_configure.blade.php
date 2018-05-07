    <!-- Bootrstrap modal form track -->
    <div id="tModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="myModalLabel">Modal</h3>
                    </div>
                <div class="modal-body">
                <div class="row">
                    <div class="block-fluid">
                        <form id="form_modal_track">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <span class="top title">@lang('messages.type')</span>
                                    {!! Form::select('types[]',[0 => 'PERSONA MILITAR',1 => 'PI',2 => 'PO',3 => 'KING_AIR',4 => 'BOAT(GO FAST)',5 => 'HELICOPTERO MILITAR', 6 => 'BARCO',7 => 'COCHE',8 => 'AUTOBUS', 9 => 'UNIDAD TERRESTRE'], null, ['class' => 'form-control validate[required]','data-prompt-position' => "bottomLeft",'id' => 'types']) !!}
                                </div>
                                <div class="col-md-3">
                                    <span class="top title">@lang('messages.unit')</span>
                                    <select id="format_coordinates_track" class="form-control">
                                        <option value="0">@lang('messages.dd')</option>
                                        <option value="1">@lang('messages.ddm')</option>
                                        <option value="2">@lang('messages.dms')</option>
                                    </select>
                                </div>
                                 <div class="col-md-3">
                                    <span class="top title">@lang('messages.track_source')</span>
                                    <select id="track_source" name="track_source" class="form-control">
                                        <option value="AIS">AIS</option>
                                        <option value="RADAR_A">RADAR</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <span class="top title">@lang('messages.sidc')</span>
                                    <img id="track-sidc" src=""></img>
                                </div>
                                <div class="clearfix"></div>
                                <br />
                                @include('stage.components.coordinates_track')
                            </div>

                            <div class="form-group">
                                <div class="col-md-2">
                                    <span class="top title">@lang('messages.course')</span>
                                    {!! Form::number('course-track[]',90,array('class' => 'form-control validate[required,min[0],max[360]] text-input','id' => 'course-track','data-prompt-position' => "bottomLeft")) !!}
                                    <p class="help-block">@lang('messages.extents')</p>                      
                                </div>

                                <div class="col-md-2">
                                    <span class="top title">@lang('messages.speed')</span>
                                    {!! Form::number('speed-track[]',0,array('class' => 'form-control validate[required,min[0],max[4096]] text-input','id' => 'speed-track','data-prompt-position' => "bottomLeft")) !!}
                                    <p class="help-block">@lang('messages.km/h')</p>
                                </div>

                                <div class="col-md-2">
                                    <span class="top title">@lang('messages.altitude')</span>
                                    {!! Form::number('altitude-track[]', 0,array('class' => 'form-control validate[required,min[0],max[5000]] text-input','id' => 'altitude-track','data-prompt-position' => "bottomLeft")) !!} 
                                    <p class="help-block">@lang('messages.meters')</p>    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div id="map-tracks" style="width: 100%; height: 400px; display: inherit;"></div> 
                                    <p class="help-block">@lang('messages.required_select_point_on_map')</p>
                                    {!! Form::text('init_position_track_',null,array('class' => 'form-control validate[required] text-input','id' => 'init_position_track_','placeholder' => __('messages.init_position'),'data-prompt-position' => "bottomLeft",'readonly' => true)) !!}

                                    {!! Form::text('init_position_track',null,array('class' => 'form-control validate[required,funcCall[validateCoordinate[2]]] text-input','id' => 'init_position_track','data-prompt-position' => "bottomLeft")) !!}
                                </div>
                            </div>
                            
                        </form>      
                    </div>
                </div>                   
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" id="button_config_track" aria-hidden="true">@lang('messages.save')</button> 
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">@lang('messages.close')</button>          
                    </div>
            </div>
        </div>
    </div> 