@extends('layouts.app')
@section('title',__("messages.edit_device"))
@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li><a href="{{ url('catalog/device') }}">@lang('messages.menu_device')</a></li>
    <li>@lang('messages.edit_device')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.edit_device')</h2>
                    </div>    
                    {!! Form::model($device, ['route' => ['catalog.device.update', $device->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalogs.device.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
