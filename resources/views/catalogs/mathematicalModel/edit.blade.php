@extends('layouts.app')
@section('title',__("messages.edit_mathematical_model"))
@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog/mathematical_model') }}">@lang('messages.menu_mathematical_model')</a></li>
    <li>@lang('messages.edit_mathematical_model')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.edit_mathematical_model')</h2>
                    </div>    
                    {!! Form::model($mathematicalModel, ['route' => ['catalog.mathematical_model.update', $mathematicalModel->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off','files' => true]) !!}
                        @include('catalogs.mathematicalModel.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
