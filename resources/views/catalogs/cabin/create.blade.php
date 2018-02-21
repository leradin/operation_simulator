@extends('layouts.app')
@section('title', __("messages.create_cabin"))
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li><a href="{{ url('catalog/cabin') }}">@lang('messages.menu_cabin')</a></li>
    <li>@lang('messages.create_cabin')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.create_cabin')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'catalog.cabin.store','autocomplete' =>'off']) !!}
                        @include('catalogs.cabin.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection