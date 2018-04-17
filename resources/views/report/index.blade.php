@extends('layouts.app')
@section('title',__("messages.menu_report"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li>@lang('messages.menu_report')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_exercise')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("exercise/create") }}" title="{!! trans('messages.create_exercise') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%">@lang('messages.id')</th>
                                    <th width="15%">@lang('messages.name')</th>
                                    <th width="20%">@lang('messages.description')</th>
                                    <th width="10%">@lang('messages.stage')</th>
                                    <th width="10%">@lang('messages.scheduled_date_time')</th>
                                    <th width="10%">@lang('messages.supremed_date_time')</th>
                                    <th width="10%" class="TAC">@lang('messages.map_comments')</th>
                                    <th width="10%" class="TAC">@lang('messages.video_comments')</th>
                                    <th width="10%" class="TAC">@lang('messages.audios_videos')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exercises as $exercise)
                                    <tr>
                                    <td>{{ $exercise->id }}</td>
                                    <td>{{ $exercise->name }}</td>
                                    <td>{{ $exercise->description }}</td>
                                    <td>{{ $exercise->stages()->first()->name }}</td>
                                    <td>{{ $exercise->scheduled_date_time }}</td>
                                    <td>{{ $exercise->supremed_date_time }}</td>
                                    <td class="TAC">
                                        <a class="icon-button" title="@lang('messages.map_comments')" href="{{ url('mapComments/') }}/{{ $exercise->id }}"><span class="glyphicon icosg-chat"></span></a>
                                          
                                    </td>
                                    <td class="TAC">
                                        <a class="icon-button" title="@lang('messages.video_comments')" href="{{ url('videoComments/') }}/{{ $exercise->id }}"><span class="glyphicon icosg-chat"></span></a>
                                    </td>
                                    <td class="TAC">
                                        <a class="icon-button" title="@lang('messages.video_comments')" href="{{ url('audioVideo/') }}/{{ $exercise->id }}"><span class="glyphicon icosg-videos"></span></a>
                                    </td>
                                </tr>   
                                @endforeach                          
                            </tbody>
                        </table>                    
                    </div> 
            </div>                         
        </div>
    </div>
@endsection