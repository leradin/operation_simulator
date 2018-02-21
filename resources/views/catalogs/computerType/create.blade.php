@extends('layouts.app')
@section('title', __("messages.create_computer_type"))
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li><a href="{{ url('catalog/computer_type') }}">@lang('messages.menu_computer_type')</a></li>
    <li>@lang('messages.create_computer_type')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.create_computer_type')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'catalog.computer_type.store','autocomplete' =>'off']) !!}
                        @include('catalogs.computerType.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection