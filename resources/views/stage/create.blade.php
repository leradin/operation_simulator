@extends('layouts.app')
@section('title', __("messages.create_stage"))
@section('css')
    {!! Html::style('leaflet/dist/leaflet.css') !!}
    {!! Html::style('leaflet/plugins/areaselect/leaflet-areaselect.css') !!}
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('stage') }}">@lang('messages.menu_stage')</a></li>
    <li>@lang('messages.create_stage')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.create_stage')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'stage.store','autocomplete' =>'off']) !!}
                        @include('stage.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
@section('modal')
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
                                    {!! Form::select('unit_ids[]',$units,null,array('class' => 'form-control validate[required] text-input','id' => 'unit_ids','data-prompt-position' => "bottomLeft")) !!}
                                </div>

                                <div class="col-md-2">
                                    <span class="top title">@lang('messages.course')</span>
                                    {!! Form::number('course',90,array('class' => 'form-control validate[required,min[0],max[360]] text-input','id' => 'course','data-prompt-position' => "bottomLeft")) !!}
                                    <p class="help-block">@lang('messages.extents')</p>                      
                                </div>

                                <div class="col-md-2">
                                    <span class="top title">@lang('messages.speed')</span>
                                    {!! Form::number('speed',0,array('class' => 'form-control validate[required,min[0],max[4096]] text-input','id' => 'speed','data-prompt-position' => "bottomLeft")) !!}
                                    <p class="help-block">@lang('messages.km/h')</p>
                                </div>

                                <div class="col-md-2">
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

                                    {!! Form::hidden('init_position',null,array('class' => 'form-control validate[required] text-input','id' => 'init_position','data-prompt-position' => "bottomLeft")) !!}
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
                                    <input type="radio"  name="type_lights" checked="checked" value="0" />@lang('messages.daylight') 
                                    <input type="radio"  name="type_lights" value="1" />@lang('messages.battle_light') 
                                    <input type="radio"  name="type_lights_" value="3" />@lang('messages.without_lights')
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
                                <div class="col-md-6">
                                    <span class="top title">@lang('messages.type')</span>
                                    {!! Form::select('types[]',[1 => 'PI',2 => 'PO',3 => 'KING_AIR',4 => 'BOAT(GO FAST)'], null, ['class' => 'form-control validate[required]','data-prompt-position' => "bottomLeft",'id' => 'types']) !!}
                                </div>

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

                                    {!! Form::hidden('init_position_track',null,array('class' => 'form-control validate[required] text-input','id' => 'init_position_track','data-prompt-position' => "bottomLeft")) !!}
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

                                        {!! Form::hidden('init_position_meterological_phenomenon',null,array('class' => 'form-control validate[required] text-input','id' => 'init_position_meterological_phenomenon','data-prompt-position' => "bottomLeft")) !!}
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
@endsection
@section('js_footer')
    {!! Html::script('leaflet/dist/leaflet.js') !!} 
    {!! Html::script('leaflet/plugins/areaselect/leaflet-areaselect.js') !!}
    {!! Html::script('leaflet/layers.js') !!}
    {!! Html::script('leaflet/custom_stage.js') !!}
    {!! Html::script('js/stage.js') !!}
@endsection