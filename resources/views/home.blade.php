@extends('layouts.app')

@section('title', 'Inicio')

@section('js')
@endsection


@section('content')
	
  	<div class="row">
    <div class="col-md-12">
		<div class="widget">

	        <div class="profile clearfix">
	            <div class="image">
	                <img src="{{ asset('img/backgrounds/background.png') }}" class="img-thumbnail">
	            </div>                      
	            <div class="info">
	                <h2>{{  $user['names'] }} {{ $user['lastnames'] }}</h2>
	                <p><strong>@lang('messages.enrollment'):</strong> {{ $user['enrollment'] }}</p>
	                <p><strong>@lang('messages.degree'):</strong> {{ $user['degree']['name'] }}</p>
	                <p><strong>@lang('messages.ascription'):</strong> {{ $user['ascription']['name'] }}</p>
	                <div class="status">{{ $user['user'] ? 'Usuario' : 'Estudiante' }}</div>
	            </div>
	        </div>
	    </div>     
    </div>
    </div>   
@endsection