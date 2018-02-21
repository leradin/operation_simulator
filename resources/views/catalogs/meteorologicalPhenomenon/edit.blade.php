@extends('layouts.app')
@section('title',__("messages.edit_meteorological_phenomenon"))
@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li><a href="{{ url('catalog/meteorological_phenomenon') }}">@lang('messages.menu_meteorological_phenomenon')</a></li>
    <li>@lang('messages.edit_meteorological_phenomenon')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.edit_meteorological_phenomenon')</h2>
                    </div>    
                    {!! Form::model($meteorologicalPhenomenon, ['route' => ['catalog.meteorological_phenomenon.update', $meteorologicalPhenomenon->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalogs.meteorologicalPhenomenon.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
