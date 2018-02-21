@extends('layouts.app')
@section('title',__("messages.edit_sensor"))
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li><a href="{{ url('catalog/sensor') }}">@lang('messages.menu_sensor')</a></li>
    <li>@lang('messages.edit_sensor')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.edit_sensor')</h2>
                    </div>    
                    {!! Form::model($sensor, ['route' => ['catalog.sensor.update', $sensor->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalogs.sensor.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
