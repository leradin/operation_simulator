@extends('layouts.app')
@section('title',__("messages.menu_cabin"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li>@lang('messages.menu_cabin')</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_cabin')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("catalog/cabin/create") }}" title="{!! trans('messages.create_cabin') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">@lang('messages.id')</th>
                                    <th width="15%">@lang('messages.name')</th>
                                    <th width="10%">@lang('messages.ip_address_arduino')</th>
                                    <th width="10%">@lang('messages.mac_address_arduino')</th>
                                    <th width="10%">@lang('messages.ip_address_camera')</th>
                                    <th width="35%">@lang('messages.computers')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cabins as $cabin)
                                    <tr>
                                    <td>{{ $cabin->id }}</td>
                                    <td>{{ $cabin->name }}</td>
                                    <td>{{ $cabin->ip_address_arduino }}</td>
                                    <td>{{ $cabin->mac_address_arduino }}</td>
                                    <td>{{ $cabin->ip_address_camera }}</td>
                                    <td>
                                        @foreach($cabin->computers()->get() as $computer)
                                            <ul class="jqueryFileTree">
                                                <li class="directory">
                                                    <a>{{ $computer->full_name }}</a>
                                              
                                        
                                                @foreach($computer->devices()->get() as $device)
                                                <ul class="jqueryFileTree" style="">
                                                    <li class="file"><a>{!! nl2br(e($device->name_tab)) !!}</a></li>
                                                </ul>
                                                    
                                                @endforeach 
                                                </li>
                                        </ul>
                                        @endforeach  
                                    </td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['catalog.cabin.destroy',$cabin],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar está cabina?');" ]) !!}
                                            <a href="{{ route('catalog.cabin.edit',$cabin) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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