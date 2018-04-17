@extends('layouts.app')
@section('title',$exercise->name)
@section('css')
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('report') }}">@lang('messages.menu_report')</a></li>
    <li>{{ $exercise->name }} :: @lang('messages.map_comments')</li>
@endsection

@section('content')
    <div class="row">
            <div class="col-md-12">
            @include('layouts.message')                
          		<div class="widget">
                    
                    <div class="block invoice">
                        
                        <h1>{{ $exercise->name }}  #{{ $exercise->id }}</h1>
                        <span class="date">{{ $exercise->stages()->first()->name }}</span>
                        
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">                            
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <h4>@lang('messages.extra_data')</h4>
                                <p><strong>@lang('messages.scheduled_date_time') : </strong>{{ $exercise->scheduled_date_time }}</p>
                                <p><strong>@lang('messages.supremed_date_time') : </strong>{{ $exercise->supremed_date_time }}</p>
                                <div class="highlight">
                                    <strong>@lang('messages.cabins_number') : </strong>{{ $exercise->stages()->first()->cabins()->count() }}
                                </div>
                            </div>
                        </div>
                        
                        <h3>@lang('messages.on_map_events')</h3>                        
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">@lang('messages.tr_target')</th>
                                    <th width="10%">@lang('messages.tr_source')</th>
                                    <th width="20%">@lang('messages.tr_commentary')</th>
                                    <th width="20%">@lang('messages.tr_lat_lon')</th>
                                    <th width="10%">@lang('messages.tr_course')</th>
                                    <th width="10%">@lang('messages.tr_date')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment['targetName'] }}</td>
                                        <td>{{ $comment['sourceName'] }}</td>
                                        <td>{{ $comment['commentary'] }}</td>
                                        <td>{{ $comment['lat_lon'] }}</td>
                                        <td>{{ $comment['course'] }}</td>
                                        <td>{{ $comment['date'] }}</td>

                                    </tr>
                                @endforeach                                           
                            </tbody>
                        </table>

                    </div>
                    
                </div>
                
            </div>            
    </div> 
@endsection