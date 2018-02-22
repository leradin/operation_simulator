@extends('layouts.app')
@section('title',__("messages.menu_unit"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li>@lang('messages.menu_unit')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_unit')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("catalog/unit/create") }}" title="{!! trans('messages.create_unit') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">@lang('messages.station')</th>
                                    <th width="10%">@lang('messages.name')</th>
                                    <th width="10%">@lang('messages.numeral')</th>
                                    <th width="10%">@lang('messages.country')</th>
                                    <th width="10%">@lang('messages.serial_number')</th>
                                    <th width="10%">@lang('messages.image')</th>
                                    <th width="10%">@lang('messages.unit_type')</th>
                                    <th width="20%">@lang('messages.sensors')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($units as $unit)
                                    <tr>
                                    <td>{{ $unit->station }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{{ $unit->numeral }}</td>
                                    <td>{{ $unit->country }}</td>
                                    <td>{{ $unit->serial_number }}</td>
                                    <td>
                                        @if($unit->image != 'image/image.jpg')
                                        <a href="{{url('/')}}{{ Storage::disk('local')->url($unit->image) }}" target="_blank">
                                            <img src="{{url('/')}}{{ Storage::disk('local')->url($unit->image) }}" height="200" width="200">
                                        </a>
                                        @else
                                          Sin imagén
                                        @endif    
                                    </td>
                                    <td>{{ $unit->unitType->name }}</td>
                                    <td>
                                        @foreach ($unit->sensors as $sensor)
                                            {{ $sensor->name }}<br />
                                        @endforeach
                                    </td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['catalog.unit.destroy',$unit],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar está unidad?');" ]) !!}
                                            <a class="icon-button" title="@lang('messages.download_file')" href="{{ action('UnitController@show',$unit->id) }}"><span class="glyphicon glyphicon-file"></span></a>
                                            <a href="{{ route('catalog.unit.edit',$unit) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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