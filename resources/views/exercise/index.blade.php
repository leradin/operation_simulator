@extends('layouts.app')
@section('title',__("messages.menu_exercise"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li>@lang('messages.menu_exercise')</li>
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
                                    <th width="45%">@lang('messages.name')</th>
                                    <th width="45%">@lang('messages.description')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exercises as $exercise)
                                    <tr>
                                    <td>{{ $exercise->name }}</td>
                                    <td>{{ $exercise->description }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['exercise.destroy',$exercise],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este ejercicio?');" ]) !!}
                                            <a href="{{ route('exercise.edit',$exercise) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <button class="icon-button btn btn-link" title="Eliminar" type="submit"><span class="glyphicon glyphicon-trash"></span></button> 
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