@extends('layouts.app')
@section('title',__("messages.edit_unit"))
@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog/unit') }}">@lang('messages.menu_unit')</a></li>
    <li>@lang('messages.edit_unit')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.edit_unit')</h2>
                    </div>    
                    {!! Form::model($unit, ['route' => ['catalog.unit.update', $unit->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off','files' => true]) !!}
                        @include('catalogs.unit.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
@section('js_footer')
        <script src="{{ asset('js/unit.js') }}"></script>
@endsection
