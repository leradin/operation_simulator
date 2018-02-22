@extends('layouts.app')
@section('title',__("messages.menu_mathematical_model"))

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li>@lang('messages.menu_mathematical_model')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_mathematical_model')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("catalog/mathematical_model/create") }}" title="{!! trans('messages.create_mathematical_model') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="30%">@lang('messages.name')</th>
                                    <th width="40%">@lang('messages.file')</th>
                                    <th width="20%">@lang('messages.unit_type')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mathematicalModels as $mathematicalModel)
                                    <tr>
                                    <td>{{ $mathematicalModel->name }}</td>
                                    <td>{{ $mathematicalModel->path }}</td>
                                    <td>{{ isset($mathematicalModel->unitType) ?$mathematicalModel->unitType->name : '' }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['catalog.mathematical_model.destroy',$mathematicalModel],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este modelo matématico?');" ]) !!}
                                            <a class="icon-button" title="@lang('messages.download_file')" href="{{ action('MathematicalModelController@show',$mathematicalModel->id) }}"><span class="glyphicon glyphicon-file"></span></a>
                                            <a href="{{ route('catalog.mathematical_model.edit',$mathematicalModel) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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