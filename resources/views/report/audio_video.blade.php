@extends('layouts.app')
@section('title',$exercise->name)
@section('css')
@endsection
@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('report') }}">@lang('messages.menu_report')</a></li>
    <li>{{ $exercise->name }} :: @lang('messages.audios_videos')</li>
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
                        
                        <h3>@lang('messages.audios_videos')</h3>                        
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="50%">@lang('messages.tr_audio_video')</th>
                                    <th width="50%">@lang('messages.tr_download')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($files['audios'] as $file)
                                    <tr>
                                        <td>
                                            <audio controls>
                                              <source src="ftp://{{ env('FTP_HOST') }}/{{ $file }}" type="audio/mpeg">
                                              Your browser does not support the audio element.
                                            </audio>
                                        </td>
                                        <td>
                                            <a target="_blank" href="ftp://{{ env('FTP_HOST') }}/{{ $file }}" download>{{ $file }}</a>
                                        </td>
                                    </tr>
                                @empty
                                        <p>No users</p>
                                @endforelse 
                                @foreach ($files['videos'] as $file)
                                    <tr>
                                        <td>
                                             <video width="320" height="240" controls>
                                              <source src="ftp://{{ env('FTP_HOST') }}/{{ $file }}" type="video/mp4">
                                              Your browser does not support the video tag.
                                            </video>
                                        </td>
                                        <td>
                                            <a href="ftp://{{ env('FTP_HOST') }}/{{ $file }}" download>{{ $file }}</a>
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