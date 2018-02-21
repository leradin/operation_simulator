@extends('layouts.app')
@section('title',__("messages.menu_computer_type"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li><a href="{{ url('catalog') }}">@lang('messages.menu_catalog')</a></li>
    <li>@lang('messages.menu_computer_type')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_computer_type')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("catalog/computer_type/create") }}" title="{!! trans('messages.create_computer_type') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="45%">@lang('messages.name')</th>
                                    <th width="45%">@lang('messages.abbreviation')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($computerTypes as $computerType)
                                    <tr>
                                    <td>{{ $computerType->name }}</td>
                                    <td>{{ $computerType->abbreviation }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['catalog.computer_type.destroy',$computerType],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este tipo de computadora?');" ]) !!}
                                            <a href="{{ route('catalog.computer_type.edit',$computerType) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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