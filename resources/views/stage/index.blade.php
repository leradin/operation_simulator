@extends('layouts.app')
@section('title',__("messages.menu_stage"))
@section('css')
    {!! Html::style('leaflet/dist/leaflet.css') !!}
    <style type="text/css">
        #map { height: 360px; }
    </style>
@endsection
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
                                    <th width="0%">@lang('messages.id')</th>
                                    <th width="20%">@lang('messages.name')</th>
                                    <th width="30%">@lang('messages.description')</th>
                                    <th width="20%">@lang('messages.bounding_box')</th>
                                    <th width="10%">@lang('messages.area')</th>
                                    <th width="10%" class="TAC">@lang('messages.tr_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stages as $stage)
                                    <tr>
                                    <td>{{ $stage->id }}</td>
                                    <td>{{ $stage->name }}</td>
                                    <td>{{ $stage->description }}</td>
                                    <td>N {{ $stage->northeast }} <br />S {{ $stage->southwest }}</td>
                                    <td><a href="#modal_map" role="button" class="btn btn-default" data-toggle="modal">@lang('messages.open_map')</a></td>
                                    <td class="TAC">
                                        {!! Form::open(['route' => ['stage.destroy',$stage],'method' => 'DELETE','onsubmit' => "return confirm('¿Deseas eliminar este escenario?');" ]) !!}
                                            <!--a href="{ { route('stage.edit',$stage) }}" title="@ lang('messages.button_edit')" class="icon-button"><span class="glyphicon glyphicon-pencil"></span></a-->
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
@section('modal')
<!-- Bootrstrap modal -->
        <div id="modal_map" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h3 class="modal-title" id="title_modal"></h3>
                    </div>
                    <div class="modal-body">
                        <div id="map"></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">@lang('messages.close')</button>            
                    </div>
                </div>
            </div>
        </div>       
@endsection
@section('js_footer')
    {!! Html::script('leaflet/dist/leaflet.js') !!} 
    <!--{ !! Html::script('leaflet/layers.js') !!}-->
    {!! Html::script('leaflet/index_stage.js') !!} 
@endsection