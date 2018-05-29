<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-2 TAR">@lang('messages.station')</div>
        <div class="col-md-2">
            {!! Form::text('station', null, array('placeholder' => __("messages.station"),'class' => 'form-control validate[required,maxSize[5]] text-input','id' => 'station','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_5')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-1 TAR">@lang('messages.numeral')</div>
        <div class="col-md-1">
            {!! Form::text('numeral', null, array('placeholder' => __("messages.numeral"),'class' => 'form-control validate[required,maxSize[20]] text-input','id' => 'numeral','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_20')</small></span>
        </div>

        <div class="col-md-1 TAR">@lang('messages.number_engines')</div>
        <div class="col-md-1">
            {!! Form::number('number_engines', null, array('placeholder' => __("messages.number_engines"),'class' => 'form-control validate[required,min[1],max[2]] text-input','id' => 'number_engines','data-prompt-position' => "bottomLeft",'min' => '1','max' =>'2')) !!}
            <span class="help-block"><small>@lang('messages.required_max_10')</small></span>
        </div>
        

    </div>

    <div class="form-group">

        <div class="col-md-1 TAR">@lang('messages.country')</div>
        <div class="col-md-2">
            {!! Form::text('country', null, array('placeholder' => __("messages.country"),'class' => 'form-control validate[required,maxSize[3]] text-input','id' => 'country','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_3')</small></span>
        </div>

        <div class="col-md-1 TAR">@lang('messages.serial_number')</div>
        <div class="col-md-2">
            {!! Form::text('serial_number', null, array('placeholder' => __("messages.serial_number"),'class' => 'form-control validate[required,maxSize[15]] text-input','id' => 'serial_number','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_15')</small></span>
        </div>
        
        <div class="col-md-1 TAR">@lang('messages.image')</div>
        <div class="col-md-2">
            <input type="file" name="image" id="image" placeholder="{{ __('messages.image') }}" class="form-control validate[{!! isset($unit->image) ? '' : 'required' !!},maxSize[255]] text-input" data-prompt-position="bottomLeft" />
            <span class="help-block"><small>{{ isset($unit->image) ? "$unit->image " : __("messages.required_file") }}</small></span>
        </div>   

        <div class="col-md-1 TAR">@lang('messages.unit_type')</div>
        <div class="col-md-2">
            {!! Form::select('unit_type_id',$unitTypes, null, array('placeholder' => __("messages.unit_type"),'class' => 'form-control validate[required] text-input','id' => 'unit_type_id','data-prompt-position' => "bottomLeft",'title' => isset($unit) ? $unit->unitType->name : '' )) !!}           
            <span class="help-block"><small></small></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.sensors')</div>
        <div class="col-md-10">
            {!! Form::select('sensor_ids[]',$sensors,isset($unit->sensors) ? $unit->sensors : null, array('class' => 'form-control validate[required] text-input','id' => 'ms','data-prompt-position' => "bottomLeft",'multiple' => 'multiple')) !!}  
            <span class="help-block"><small>@lang('messages.required_at_least_1_computer')</small></span>                   
        </div>
    </div>    



    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/unit') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>