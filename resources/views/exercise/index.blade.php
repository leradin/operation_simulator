@extends('layouts.app')
@section('title',__("messages.menu_exercise"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li>@lang('messages.menu_exercise')</li>
@endsection

@section('content')
    @if($executeExercise)
    <div class="row">
        <div class="col-md-12">        
        <div class="widget">
            <div class="head">
                <div class="icon"><i class="icosg-star3"></i></div>
                <h2>{{ $executeExercise->name }}</h2> 
                <div class="items">
                    <marquee behavior="alternate" scrollamount="1" scrolldelay="5" width="150" height="20"><b>@lang('messages.execution_exercise')</b></marquee>                        
                </div>
            </div>
            <div class="block">
                <p>@lang('messages.description') : <b>{{ $executeExercise->description }} </b></p>
                <p>@lang('messages.stage') : <b>{{ $executeExercise->stages()->first()->name }} </b></p>
                <p>@lang('messages.scheduled_date_time') : <b>{{ $executeExercise->scheduled_date_time }} </b></p>
                <p>@lang('messages.supremed_date_time') : <b>{{ $executeExercise->supremed_date_time }} </b></p>
            </div>
        </div>                
        </div>
    </div>
    @endif
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
                                    <th width="10%">@lang('messages.id')</th>
                                    <th width="20%">@lang('messages.name')</th>
                                    <th width="20%">@lang('messages.description')</th>
                                    <th width="20%">@lang('messages.stage')</th>
                                    <th width="10%">@lang('messages.scheduled_date_time')</th>
                                    <th width="10%">@lang('messages.supremed_date_time')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
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
                                        {!! Form::open(['route' => ['exercise.destroy',$exercise],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este ejercicio?');" ]) !!}
                                            <a class="icon-button" title="@lang('messages.see_exercise')" href="{{ action('ExerciseController@show',$exercise) }}"><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <a class="icon-button" title="@lang('messages.download_file')" href="{{ route('download',$exercise) }}"><span class="glyphicon glyphicon-file"></span></a>
                                            <button class="icon-button btn btn-link" title="Eliminar" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
                                        {!! Form::close() !!}
                                        {!! Form::open(['route' => ['exercise.update', $exercise,'is_played' => true],'method' => 'PUT']) !!}
                                            <button class="icon-button btn btn-link" title="{{ ($exercise->is_played) ? __("messages.finish_exercise") : __("messages.execute_exercise") }}" type="submit"><span class="glyphicon {{ ($exercise->is_played) ? 'glyphicon-stop' : 'glyphicon-play' }}"></span></button> 
                                        {!! Form::close() !!}
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