@extends('layouts.app')
@section('title',__("messages.edit_track"))
@section('css')
    {!! Html::style('symbology_2525/renderer.css') !!}
@endsection
@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog/track') }}">@lang('messages.menu_track')</a></li>
    <li>@lang('messages.edit_track')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><span class="icos-gridview"></span></div>
                        <h2>@lang('messages.edit_track')</h2>
                    </div>    
                    {!! Form::model($track, ['route' => ['catalog.track.update', $track->id],'id' => 'validate', 'name' => 'validate','method' => 'put', 'role' => 'form','autocomplete' =>'off']) !!}
                        @include('catalogs.track.form')
                    {!!Form::close()!!}                
                </div>
            </div>            
    </div> 
@endsection
@section('js_footer')
    {!! Html::script('symbology_2525/sm-bc.min.js') !!}
    {!! Html::script('symbology_2525/custom_track.js') !!}
@endsection
