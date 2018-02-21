<div class="block-fluid">
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.id')</div>
        <div class="col-md-2">
            {!! Form::text('id', null, array('placeholder' => __("messages.id"),'class' => 'form-control validate[required,custom[integer]] text-input','id' => 'id','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_integer')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[25]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_25')</small></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.ip_address_arduino')</div>
        <div class="col-md-2">
            {!! Form::text('ip_address_arduino', null, array('placeholder' => __("messages.ip_address_arduino"),'class' => 'form-control validate[required,custom[ipv4]] text-input','id' => 'ip_address_arduino','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_ip_address')</small></span>
        </div> 

        <div class="col-md-2 TAR">@lang('messages.mac_address_arduino')</div>
        <div class="col-md-2">
            {!! Form::text('mac_address_arduino', null, array('placeholder' => __("messages.mac_address_arduino"),'class' => 'form-control validate[required] text-input','id' => 'mac_address_arduino','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_mac_address')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.ip_address_camera')</div>
        <div class="col-md-2">
            {!! Form::text('ip_address_camera', null, array('placeholder' => __("messages.ip_address_camera"),'class' => 'form-control validate[required,custom[ipv4]] text-input','id' => 'ip_address_camera','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_ip_address')</small></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.computers')</div>
        <div class="col-md-10">
            {!! Form::select('computer_ids[]',$computers,isset($cabin->computers)?$cabin->computers:null, array('class' => 'form-control validate[required] text-input','id' => 'ms','data-prompt-position' => "bottomLeft",'multiple' => 'multiple')) !!}  
            <span class="help-block"><small>@lang('messages.required_at_least_1_computer')</small></span>                   
        </div>
    </div>                    


    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/cabin') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>