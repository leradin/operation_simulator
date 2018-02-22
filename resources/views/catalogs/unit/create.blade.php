@extends('layouts.app')
@section('title', __("messages.create_unit"))
@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog/unit') }}">@lang('messages.menu_unit')</a></li>
    <li>@lang('messages.create_unit')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.create_unit')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'catalog.unit.store','autocomplete' =>'off','files' => true]) !!}
                        @include('catalogs.unit.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection