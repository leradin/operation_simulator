<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.ip_address')</div>
        <div class="col-md-2">
            {!! Form::text('ip_address', null, array('placeholder' => __("messages.ip_address"),'class' => 'form-control validate[required,custom[ipv4]] text-input','id' => 'ip_address','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_ip_address')</small></span>
        </div> 

        <div class="col-md-2 TAR">@lang('messages.mac_address')</div>
        <div class="col-md-2">
            {!! Form::text('mac_address', null, array('placeholder' => __("messages.mac_address"),'class' => 'form-control validate[] text-input','id' => 'mac_address','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_mac_address')</small></span>
        </div>

    </div>

    <div class="form-group">
    
        <div class="col-md-2 TAR">@lang('messages.label_arduino')</div>
        <div class="col-md-2">
            {!! Form::text('label_arduino', null, array('placeholder' => __("messages.label_arduino"),'class' => 'form-control validate[required] text-input','id' => 'label_arduino','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_text_without_spaces')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.cabin')</div>
        <div class="col-md-2">
            {!! Form::select('cabin_id',$cabins, null, array('placeholder' => __("messages.cabin"),'class' => 'form-control validate[] text-input','id' => 'cabin_id','data-prompt-position' => "bottomLeft",'title' => isset($computer) ? $computer->cabin->name : '' )) !!}           
            <span class="help-block"><small>@lang('messages.optional')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.computer_type')</div>
        <div class="col-md-2">
            {!! Form::select('computer_type_id',$computerTypes, null, array('placeholder' => __("messages.computer_type"),'class' => 'form-control validate[required] text-input','id' => 'computer_type_id','data-prompt-position' => "bottomLeft",'title' => isset($computer) ? $computer->computerType->full_name : '')) !!}           
            <span class="help-block"><small></small></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.devices')</div>
        <div class="col-md-10">
            {!! Form::select('device_ids[]',$devices,isset($computer->devices)?$computer->devices:null, array('class' => 'form-control validate[required] text-input','id' => 'ms','data-prompt-position' => "bottomLeft",'multiple' => 'multiple')) !!}  
            <span class="help-block"><small>@lang('messages.required_at_least_1_device')</small></span>                   
        </div>
    </div>    

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/computer') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>