@extends('layouts.app')
@section('title',__("messages.menu_track"))

@section('css')
  {!! Html::style('symbology_2525/renderer.css') !!}
@endsection

@section('js')
    <script src="{{ asset('js/general.js') }}"></script>
@endsection

@section('breadCrumb')
    <li><a href="{{ url('/') }}">@lang('messages.menu_home')</a></li>
    <li>@lang('messages.menu_track')</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
           @include('layouts.message') 
           <canvas id="preview" width="800" height="600" style="display: none"></canvas> 
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><span class="icos-gridview"></span></div>
                    <h2>@lang('messages.menu_track')</h2>
                    <ul class="buttons">
                        <li><a href="{{ url("catalog/track/create") }}" title="{!! trans('messages.create_track') !!}"><span class="icos-plus"></span></a></li>
                    </ul>                         
                </div>                
                    <div class="block-fluid">
                        <table  id="table_tracks" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="30%">@lang('messages.name')</th>
                                    <th width="10%">@lang('messages.identity')</th>
                                    <th width="10%">@lang('messages.battle_dimension')</th>
                                    <th width="20%">@lang('messages.status')</th>
                                    <th width="20%">@lang('messages.sidc')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tracks as $track)
                                    <tr>
                                    <td>{{ $track->name }}</td>
                                    <td>{{ $track->identity }}</td>
                                    <td>{{ $track->battle_dimension }}</td>
                                    <td>{{ $track->status }}</td>
                                    <td>{{ $track->sidc }}</td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['catalog.track.destroy',$track],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este blanco?');" ]) !!}
                                            <a href="{{ route('catalog.track.edit',$track) }}" title="@lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a>
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