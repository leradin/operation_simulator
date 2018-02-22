@extends('layouts.app')
@section('title',__("messages.menu_sensor"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_sensor')</a></li>
    <li>@lang('messages.menu_sensor')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_sensor')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("catalog/sensor/create") }}" title="{!! trans('messages.create_sensor') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%">@lang('messages.name')</th>
                                    <th width="20%">@lang('messages.sensor_type')</th>
                                    <th width="20%">@lang('messages.sensor_scope')</th>
                                    <th width="15%">@lang('messages.brand')</th>
                                    <th width="15%">@lang('messages.model')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sensors as $sensor)
                                    <tr>
                                    <td>{{ $sensor->name }}</td>
                                    <td>{{ $sensor->sensor_type }}</td>
                                    <td>{{ $sensor->sensor_scope }}</td>
                                    <td>{{ $sensor->brand }}</td>
                                    <td>{{ $sensor->model }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['catalog.sensor.destroy',$sensor],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este sensor?');" ]) !!}
                                            <a href="{{ route('catalog.sensor.edit',$sensor) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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