@extends('layouts.app')
@section('title',__("messages.menu_meteorological_phenomenon"))

@section('css')
  {!! Html::style('symbology_2525/renderer.css') !!}
@endsection

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li>@lang('messages.menu_meteorological_phenomenon')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_meteorological_phenomenon')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("catalog/meteorological_phenomenon/create") }}" title="{!! trans('messages.create_meteorological_phenomenon') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%">@lang('messages.name')</th>
                                    <th width="10%">@lang('messages.type')</th>
                                    <th width="10%">@lang('messages.wind_direction')</th>
                                    <th width="15%">@lang('messages.sea_state')</th>
                                    <th width="15%">@lang('messages.cloud_type')</th>
                                    <th width="10%">@lang('messages.wind_velocity')</th>
                                    <th width="10%">@lang('messages.temperature')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($meteorologicalPhenomenons as $meteorologicalPhenomenon)
                                    <tr>
                                    <td>{{ $meteorologicalPhenomenon->name }}</td>
                                    <td>{{ $meteorologicalPhenomenon->type }}</td>
                                    <td>{{ $meteorologicalPhenomenon->wind_direction }}</td>
                                    <td>{{ $meteorologicalPhenomenon->sea_state }}</td>
                                    <td>{{ $meteorologicalPhenomenon->cloud_type }}</td>
                                    <td>{{ $meteorologicalPhenomenon->wind_velocity }}</td>
                                    <td>{{ $meteorologicalPhenomenon->temperature }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['catalog.meteorological_phenomenon.destroy',$meteorologicalPhenomenon],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este fénomeno meteorológico?');" ]) !!}
                                            <a href="{{ route('catalog.meteorological_phenomenon.edit',$meteorologicalPhenomenon) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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

@section('js_footer')
    {!! Html::script('symbology_2525/sm-bc.min.js') !!}
    {!! Html::script('symbology_2525/custom_track.js') !!}
@endsection