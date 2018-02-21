<div class="block-fluid">
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-1 TAR">@lang('messages.sensor_type')</div>
        <div class="col-md-2">
            {!! Form::select('sensor_type',$sensorTypes, null, array('placeholder' => __("messages.sensor_type"),'class' => 'form-control validate[required] text-input','id' => 'sensor_type','data-prompt-position' => "bottomLeft" )) !!}           
            <span class="help-block"><small></small></span>
        </div> 

        <div class="col-md-1 TAR">@lang('messages.sensor_scope')</div>
        <div class="col-md-2">
            {!! Form::select('sensor_scope',$sensorScopes, null, array('placeholder' => __("messages.sensor_scope"),'class' => 'form-control validate[required] text-input','id' => 'sensor_scope','data-prompt-position' => "bottomLeft" )) !!}           
            <span class="help-block"><small></small></span>
        </div> 

    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.brand')</div>
        <div class="col-md-2">
            {!! Form::text('brand', null, array('placeholder' => __("messages.brand"),'class' => 'form-control validate[required,maxSize[25]] text-input','id' => 'brand','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_25')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.model')</div>
        <div class="col-md-2">
            {!! Form::text('model', null, array('placeholder' => __("messages.model"),'class' => 'form-control validate[required,maxSize[25]] text-input','id' => 'model','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_25')</small></span>
        </div>

    </div>

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/sensor') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>
