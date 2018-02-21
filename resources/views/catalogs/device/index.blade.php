@extends('layouts.app')
@section('title',__("messages.menu_device"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li>@lang('messages.menu_device')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_device')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("catalog/device/create") }}" title="{!! trans('messages.create_device') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%">@lang('messages.name')</th>
                                    <th width="20%">@lang('messages.description')</th>
                                    <th width="10%">@lang('messages.ip_address')</th>
                                    <th width="10%">@lang('messages.label')</th>
                                    <th width="10%">@lang('messages.device_type')</th>
                                    <th width="20%">@lang('messages.computer')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($devices as $device)
                                    <tr>
                                    <td>{{ $device->name }}</td>
                                    <td>{{ $device->description }}</td>
                                    <td>{{ $device->ip_address }}</td>
                                    <td>{{ $device->label }}</td>
                                    <td>{{ $device->deviceType->full_name }}</td>
                                    <td>
                                        @isset($device->computer)
                                            {{ $device->computer->full_name }}
                                        @endisset
                                    </td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['catalog.device.destroy',$device],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este dispositivo?');" ]) !!}
                                            <a href="{{ route('catalog.device.edit',$device) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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