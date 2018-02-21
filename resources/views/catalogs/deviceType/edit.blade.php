@extends('layouts.app')
@section('title',__("messages.edit_device_type"))
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li><a href="{{ url('catalog/device_type') }}">@lang('messages.menu_device_type')</a></li>
    <li>@lang('messages.edit_device_type')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.edit_device_type')</h2>
                    </div>    
                    {!! Form::model($deviceType, ['route' => ['catalog.device_type.update', $deviceType->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalogs.deviceType.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
