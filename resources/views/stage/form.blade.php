<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.description')</div>
        <div class="col-md-4">
            {!! Form::textarea('description', null, array('placeholder' => __("messages.description"),'class' => 'form-control validate[] text-input','id' => 'description','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_100')</small></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.area')</div>
        <div class="col-md-10">
            <div id="mapStage" style="width: 100%; height: 400px; display: inherit;"></div>
        </div>

        {!! Form::hidden('southwest', null, array('placeholder' => __("messages.southwest"),'class' => 'form-control validate[required] text-input','id' => 'southwest','data-prompt-position' => "bottomLeft")) !!}

        {!! Form::hidden('northeast', null, array('placeholder' => __("messages.northeast"),'class' => 'form-control validate[required] text-input','id' => 'northeast','data-prompt-position' => "bottomLeft")) !!}
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.cabins')</div>
        <div class="col-md-10">
            {!! Form::select('cabin_ids[]',$cabins,isset($stage->cabins)?$stage->cabins:null, array('class' => 'form-control validate[required] text-input','id' => 'ms_stage','data-prompt-position' => "bottomLeft",'multiple' => 'multiple')) !!}  
            <span class="help-block"><small>@lang('messages.required_at_least_1_cabin')</small></span>                   
        </div>
    </div>
    <!-- Tracks -->
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.tracks')</div>
        <div class="col-md-10">
            <select id="ms_track" name="track_ids[]" class="form-control text-input" data-prompt-position="bottomLeft" multiple="multiple">
            @foreach ($tracks as $track)
                <option value="{{ $track->id }}" data-sidc="{{ $track->sidc }}">{{ $track->name }}</option>
            @endforeach
            </select> 
            <span class="help-block"><small>@lang('messages.optional')</small></span>
        </div>
    </div>

    <div id="div_for_inputs">
        
    </div> 

     <!-- Meteorogical Phenomenons -->
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.menu_meteorological_phenomenon')</div>
        <div class="col-md-10">
            <table  id="table_meteorological_phenomenons" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="5%">@lang('messages.id')</th>
                        <th width="20%">@lang('messages.name')</th>
                        <th width="10%">@lang('messages.temperature')</th>
                        <th width="10%">@lang('messages.type')</th>
                        <th width="10%">@lang('messages.wind_direction')</th>
                        <th width="20%">@lang('messages.cloud_type')</th>
                        <th width="25%">@lang('messages.wind_velocity')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($meteorologicalPhenomenons as $meteorologicalPhenomenon)
                        <tr>
                            <td>{{ $meteorologicalPhenomenon->id }}</td>
                            <td>{{ $meteorologicalPhenomenon->name }}</td>
                            <td>{{ $meteorologicalPhenomenon->temperature }}</td>
                            <td>{{ $meteorologicalPhenomenon->type }}</td>
                            <td>{{ $meteorologicalPhenomenon->wind_direction }} </td>
                            <td>{{ $meteorologicalPhenomenon->cloud_type }} </td>
                            <td>{{ $meteorologicalPhenomenon->wind_velocity }} </td>
                        </tr>   
                    @endforeach                          
                </tbody>
            </table>
            {!! Form::hidden('meteorological_phenomenon_id', null, array('class' => 'form-control validate[required] text-input','id' => 'meteorological_phenomenon_id','data-prompt-position' => "bottomLeft")) !!}
        </div>
    </div> 

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('stage') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>