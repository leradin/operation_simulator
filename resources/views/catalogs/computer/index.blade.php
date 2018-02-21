@extends('layouts.app')
@section('title',__("messages.menu_computer"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li>@lang('messages.menu_computer')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_computer')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("catalog/computer/create") }}" title="{!! trans('messages.create_computer') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">@lang('messages.id')</th>
                                    <th width="10%">@lang('messages.name')</th>
                                    <th width="10%">@lang('messages.ip_address')</th>
                                    <th width="10%">@lang('messages.mac_address')</th>
                                    <th width="20%">@lang('messages.cabin')</th>
                                    <th width="10%">@lang('messages.computer_type')</th>
                                    <th width="10%">@lang('messages.label_arduino')</th>
                                    <th width="10%">@lang('messages.devices')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($computers as $computer)
                                    <tr>
                                    <td>{{ $computer->id }}</td>
                                    <td>{{ $computer->name }}</td>
                                    <td>{{ $computer->ip_address }}</td>
                                    <td>{{ $computer->mac_address }}</td>
                                    <td>
                                        @isset($computer->cabin)
                                            {{ $computer->cabin->name }}
                                        @endisset
                                    </td>
                                    <td>{{ $computer->computerType->full_name }}</td>
                                    <td>{{ $computer->label_arduino }}</td>
                                    <td>
                                        @foreach($computer->devices()->get() as $device)
                                            <ul class="jqueryFileTree">
                                                <li class="directory">
                                                    <a>{{ $device->full_name }}</a>
                                                </li>
                                        </ul>
                                        @endforeach  
                                    </td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['catalog.computer.destroy',$computer],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar está computadora?');" ]) !!}
                                            <a href="{{ route('catalog.computer.edit',$computer) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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