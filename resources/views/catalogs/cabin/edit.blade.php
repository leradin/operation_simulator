@extends('layouts.app')
@section('title',__("messages.edit_cabin"))
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog/cabin') }}">@lang('messages.menu_cabin')</a></li>
    <li>@lang('messages.edit_cabin')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.edit_cabin')</h2>
                    </div>    
                    {!! Form::model($cabin, ['route' => ['catalog.cabin.update', $cabin->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalogs.cabin.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
