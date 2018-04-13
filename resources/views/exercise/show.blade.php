@extends('layouts.app')
@section('title', __("messages.create_exercise"))
@section('css')
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('exercise') }}">@lang('messages.menu_exercise')</a></li>
    <li>{{ $exercise->name }}</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
              
            </div>            
    </div> 
@endsection