@extends('layouts.app')
@section('title', __("messages.create_exercise"))
@section('css')
    {!! Html::style('leaflet/dist/leaflet.css') !!}
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('exercise') }}">@lang('messages.menu_exercise')</a></li>
    <li>@lang('messages.create_exercise')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.create_exercise')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'exercise.store','autocomplete' =>'off']) !!}
                        @include('exercise.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
@section('modal')
    <!-- Bootrstrap modal form -->
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
                                <div class="col-md-12">
                                    <div id="map" style="width: 100%; height: 400px; display: inherit;"></div> 
                                    <p class="help-block">@lang('messages.required_select_point_on_map')</p>
                                </div>
                            </div>
                        </form>      
                    </div>
                </div>                   
                </div>
                    <div class="modal-footer">
                        <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">@lang('messages.save')</button> 
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">@lang('messages.close')</button>          
                    </div>
            </div>
        </div>
    </div>            
@endsection
@section('js_footer')
    {!! Html::script('js/exercise.js') !!} 
    {!! Html::script('leaflet/dist/leaflet.js') !!} 
    {!! Html::script('leaflet/layers.js') !!}
    {!! Html::script('leaflet/custom_exercise.js') !!}
@endsection