@extends('layouts.app')
@section('title', __("messages.create_track"))
@section('css')
    {!! Html::style('symbology_2525/renderer.css') !!}
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog/track') }}">@lang('messages.menu_track')</a></li>
    <li>@lang('messages.create_track')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.create_track')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'catalog.track.store','autocomplete' =>'off']) !!}
                        @include('catalogs.track.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
@section('js_footer')
    {!! Html::script('symbology_2525/sm-bc.min.js') !!}
    {!! Html::script('js/track.js') !!}
    {!! Html::script('symbology_2525/custom_track.js') !!}
    
@endsection
 