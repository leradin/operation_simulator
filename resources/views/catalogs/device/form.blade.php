<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.switch_port')</div>
        <div class="col-md-2">
            {!! Form::text('switch_port', null, array('placeholder' => __("messages.switch_port"),'class' => 'form-control validate[required,custom[integer],maxSize[2]] text-input','id' => 'switch_port','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_2')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.description')</div>
        <div class="col-md-2">
            {!! Form::textarea('description', null, array('placeholder' => __("messages.description"),'class' => 'form-control validate[] text-input','id' => 'description','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_100')</small></span>
        </div>
    </div>

    <div class="form-group">
        
        <div class="col-md-1 TAR">@lang('messages.ip_address')</div>
        <div class="col-md-2">
            {!! Form::text('ip_address', null, array('placeholder' => __("messages.ip_address"),'class' => 'form-control validate[required,custom[ipv4]] text-input','id' => 'ip_address','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_ip_address')</small></span>
        </div>

        <div class="col-md-1 TAR">@lang('messages.computer')</div>
        <div class="col-md-2">
            {!! Form::select('computer_id',$computers, null, array('placeholder' => __("messages.computer"),'class' => 'form-control validate[] text-input','id' => 'computer_id','data-prompt-position' => "bottomLeft",'title' => isset($computer) ? $computer->cabin->name : '' )) !!}           
            <span class="help-block"><small>@lang('messages.optional')</small></span>
        </div> 
        
        <div class="col-md-1 TAR">@lang('messages.label')</div>
        <div class="col-md-2">
            {!! Form::text('label', null, array('placeholder' => __("messages.label"),'class' => 'form-control validate[required] text-input','id' => 'label','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_text_without_spaces')</small></span>
        </div>

        <div class="col-md-1 TAR">@lang('messages.device_type')</div>
        <div class="col-md-2">
            {!! Form::select('device_type_id',$deviceTypes, null, array('placeholder' => __("messages.device_type"),'class' => 'form-control validate[required] text-input','id' => 'device_type_id','data-prompt-position' => "bottomLeft",'title' => isset($device) ? $device->deviceType->full_name : '' )) !!}           
            <span class="help-block"><small></small></span>
        </div>
    </div>

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/device') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>