@extends('layouts.app')
@section('title',$exercise->name)
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
          		<div class="widget">
                    
                    <div class="block invoice">
                        
                        <h1>{{ $exercise->name }}  #{{ $exercise->id }}</h1>
                        <span>{{ $exercise->stages()->first()->name }}</span>
                        <span class="date">@lang('messages.supremed_date_time'): {{ $exercise->supremed_date_time }}<br>
                            @lang('messages.scheduled_date_time'): {{ $exercise->scheduled_date_time }}
                        </span>
                        
                        <div class="row">
                        	@foreach ($cabins as $cabin)
                				<div class="col-md-3">
	                                <h4>{{ $cabin->cabin }}</h4>
	                                <address>
	                                    <strong>{{ $cabin->unit }}</strong><br>
	                                    @lang('messages.init_position') : {{ $cabin->init_position }}<br>
	                                    @lang('messages.course') : {{ $cabin->course }} º<br>
	                                    @lang('messages.speed') : {{ $cabin->speed }} @lang('messages.km/h')<br>
	                                    @lang('messages.lights') : {{ ($cabin->lights_type == 0) ? __("messages.battle_light") : ($cabin->lights_type == 1) ? __("messages.daylight") : __("messages.without_lights") }}<br>
                                        <br>
	                                    <abbr title="Phone">
                                            
                                            @foreach ($cabin->computers as $computer)
                                            {{ $computer->computer->name  }} - 
                                            {{ $computer->user['names'] }} 
                                            {{ $computer->user['lastnames'] }}
                                            <br>
                                        @endforeach
                                        </abbr>
	                                </address>
                            	</div>
                        	@endforeach
                        </div>

                    </div>
                    
                </div>
                
            </div>            
    </div> 
@endsection