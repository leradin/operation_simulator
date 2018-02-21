@extends('layouts.app')
@section('title',__("messages.menu_stage"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li>@lang('messages.menu_stage')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_stage')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("stage/create") }}" title="{!! trans('messages.create_stage') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%">@lang('messages.name')</th>
                                    <th width="30%">@lang('messages.description')</th>
                                    <th width="20%">@lang('messages.southwest')</th>
                                    <th width="20%">@lang('messages.northeast')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stages as $stage)
                                    <tr>
                                    <td>{{ $stage->name }}</td>
                                    <td>{{ $stage->description }}</td>
                                    <td>{{ $stage->southwest }}</td>
                                    <td>{{ $stage->northeast }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['stage.destroy',$stage],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este escenario?');" ]) !!}
                                            <a href="{{ route('stage.edit',$stage) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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