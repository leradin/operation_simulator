@extends('layouts.app')
@section('title', __("messages.create_computer"))
@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog/computer') }}">@lang('messages.menu_computer')</a></li>
    <li>@lang('messages.create_computer')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.create_computer')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'catalog.computer.store','autocomplete' =>'off']) !!}
                        @include('catalogs.computer.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection