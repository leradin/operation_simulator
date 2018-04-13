@extends('layouts.app')
@section('title', __("messages.create_meteorological_phenomenon"))
@section('css')
    {!! Html::style('symbology_2525/renderer.css') !!}
@endsection

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog/meteorological_phenomenon') }}">@lang('messages.menu_meteorological_phenomenon')</a></li>
    <li>@lang('messages.create_meteorological_phenomenon')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.create_meteorological_phenomenon')</h2>
                    </div>    
                    {!! Form::open(['id' => 'validate', 'name' => 'validate','method' => 'post','route' => 'catalog.meteorological_phenomenon.store','autocomplete' =>'off']) !!}
                        @include('catalogs.meteorologicalPhenomenon.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
 