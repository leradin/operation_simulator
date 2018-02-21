<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-1 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>
 
        <div class="col-md-1 TAR">@lang('messages.type')</div>
        <div class="col-md-2">
            {!! Form::select('type',$types, null, array('class' => 'form-control validate[required] text-input','id' => 'type','data-prompt-position' => "bottomLeft",'title' => isset($meteorologicalPhenomenon) ? $meteorologicalPhenomenon->type : '')) !!}           
            <span class="help-block"><small></small></span>
        </div>

        <div class="col-md-1 TAR">@lang('messages.wind_direction')</div>
        <div class="col-md-2">
            {!! Form::select('wind_direction',$windDirections, null, array('class' => 'form-control validate[required] text-input','id' => 'wind_direction','data-prompt-position' => "bottomLeft",'title' => isset($meteorologicalPhenomenon) ? $meteorologicalPhenomenon->wind_direction : '')) !!}           
            <span class="help-block"><small></small></span>
        </div>

        <div class="col-md-1 TAR">@lang('messages.temperature')</div>
        <div class="col-md-2">
            {!! Form::text('temperature', null, array('placeholder' => __("messages.temperature"),'class' => 'form-control validate[required,maxSize[5]] text-input','id' => 'temperature','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_5')</small></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.sea_state')</div>
        <div class="col-md-2">
            {!! Form::select('sea_state',$seaStates, null, array('class' => 'form-control validate[required] text-input','id' => 'sea_state','data-prompt-position' => "bottomLeft",'title' => isset($meteorologicalPhenomenon) ? $meteorologicalPhenomenon->sea_state : '')) !!}           
            <span class="help-block"><small></small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.cloud_type')</div>
        <div class="col-md-2">
            {!! Form::select('cloud_type',$cloudTypes, null, array('class' => 'form-control validate[required] text-input','id' => 'sea_state','data-prompt-position' => "bottomLeft",'title' => isset($meteorologicalPhenomenon) ? $meteorologicalPhenomenon->cloud_type : '')) !!}           
            <span class="help-block"><small></small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.wind_velocity')</div>
        <div class="col-md-2">
            {!! Form::select('wind_velocity',$windVelocities, null, array('class' => 'form-control validate[required] text-input','id' => 'wind_velocity','data-prompt-position' => "bottomLeft",'title' => isset($meteorologicalPhenomenon) ? $meteorologicalPhenomenon->wind_velocity : '')) !!}           
            <span class="help-block"><small></small></span>
        </div>

    </div>
   

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/meteorological_phenomenon') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>