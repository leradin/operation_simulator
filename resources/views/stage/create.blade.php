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
     <div id="app">
        <example></example>
    </div>
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
    <!-- modal for configure cabin -->
    @include('stage.cabin_modal_configure')

    <!-- modal for configure track -->
    @include('stage.track_modal_configure')

    <!-- modal for configure meteorological phenomenon -->
    @include('stage.meteorological_phenomenon_modal_configure')             
 

            
@endsection
@section('js_footer')
    {!! Html::script('js/plugins/other/geopoint.js') !!}
    {!! Html::script('leaflet/dist/leaflet.js') !!} 
    {!! Html::script('leaflet/plugins/areaselect/leaflet-areaselect.js') !!}
    {!! Html::script('leaflet/layers.js') !!}
    {!! Html::script('leaflet/custom_stage.js') !!}
    {!! Html::script('js/stage.js') !!}
@endsection