<!-- Bootrstrap modal form cabin -->
    <div id="fModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="myModalLabel">Modal</h3>
                    </div>
                <div class="modal-body">
                <div class="row">
                    <div class="block-fluid">
                        <form id="form_modal_stage">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <span class="top title">@lang('messages.unit')</span>
                                    <select name="unit_ids[]" id="unit_ids" class="form-control validate[required] text-input" data-prompt-position="bottomLeft">
                                        @foreach ($unitsTypes as $unitType)
                                        <optgroup label="{{ $unitType->name }}">
                                            @foreach ($unitType->units()->get() as $unit)
                                                <option value="{{ $unit->id }}">
                                                    {{ $unit->name_with_numeral }}
                                                </option>
                                            @endforeach
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <span class="top title">@lang('messages.unit')</span>
                                    <select id="format_coordinates" name="format_coordinates" class="form-control">
                                        <option value="0">@lang('messages.dd')</option>
                                        <option value="1">@lang('messages.ddm')</option>
                                        <option value="2">@lang('messages.dms')</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <br />
                                @include('stage.components.coordinates')
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <span class="top title">@lang('messages.course')</span>
                                    {!! Form::number('course',90,array('class' => 'form-control validate[required,min[0],max[360]] text-input','id' => 'course','data-prompt-position' => "bottomLeft")) !!}
                                    <p class="help-block">@lang('messages.extents')</p>                      
                                </div>

                                <div class="col-md-2 col-md-offset-2">
                                    <span class="top title">@lang('messages.speed')</span>
                                    {!! Form::number('speed',0,array('class' => 'form-control validate[required,min[0],max[4096]] text-input','id' => 'speed','data-prompt-position' => "bottomLeft")) !!}
                                    <p class="help-block">@lang('messages.km/h')</p>
                                </div>

                                <div class="col-md-2 col-md-offset-2">
                                    <span class="top title">@lang('messages.altitude')</span>
                                    {!! Form::number('altitude', 0,array('class' => 'form-control validate[required,min[0],max[5000]] text-input','id' => 'altitude','data-prompt-position' => "bottomLeft")) !!} 
                                    <p class="help-block">@lang('messages.meters')</p>    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div id="dvMdlMapStage" style="width: 100%; height: 400px; display: inherit;"></div> 
                                    <p class="help-block">@lang('messages.required_select_point_on_map')</p>
                                    {!! Form::text('init_position_',null,array('class' => 'form-control validate[required] text-input','id' => 'init_position_','placeholder' => __('messages.init_position'),'data-prompt-position' => "bottomLeft",'readonly' => true)) !!}

                                    {!! Form::text('init_position',null,array('class' => 'form-control validate[required,funcCall[validateCoordinate[2]]] text-input','id' => 'init_position','data-prompt-position' => "bottomLeft")) !!}
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-2">@lang('messages.computers')</div>
                                 <div class="col-md-10">
                                    <div class="btn-group" data-toggle="buttons-checkbox" id="container_computers">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2">@lang('messages.lights')</div>
                                <div class="col-md-10">
                                    <input type="radio"  name="type_lights" value="0" checked />@lang('messages.daylight') 
                                    <input type="radio"  name="type_lights" value="1" />@lang('messages.battle_light') 
                                    <input type="radio"  name="type_lights" value="2" />@lang('messages.without_lights')
                                </div>
                            </div>
                        </form>      
                    </div>
                </div>                   
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" id="button_config" aria-hidden="true">@lang('messages.save')</button> 
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">@lang('messages.close')</button>          
                    </div>
            </div>
        </div>
    </div> 