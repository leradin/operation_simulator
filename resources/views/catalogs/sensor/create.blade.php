@extends('layouts.app')
@section('title', __("messages.create_sensor"))
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog/sensor') }}">@lang('messages.menu_sensor')</a></li>
    <li>@lang('messages.create_sensor')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.create_sensor')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'catalog.sensor.store','autocomplete' =>'off']) !!}
                        @include('catalogs.sensor.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection