@extends('layouts.app')
@section('title',__("messages.menu_catalog"))

@section('js')
    
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.title_home')</a></li>
    <li>@lang('messages.menu_catalog')</li>
@endsection

@section('content')
    
@endsection