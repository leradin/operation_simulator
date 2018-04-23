<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.abbreviation')</div>
        <div class="col-md-2">
            {!! Form::text('abbreviation', null, array('placeholder' => __("messages.abbreviation"),'class' => 'form-control validate[required,maxSize[25]] text-input','id' => 'abbreviation','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_25')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.mathematical_model')</div>
        <div class="col-md-2">
            {!! Form::select('mathematical_model_id',$mathematicalModels, isset($unitType->mathematicalModel->id) ? $unitType->mathematicalModel->id : null, array('placeholder' => __("messages.mathematical_model"),'class' => 'form-control validate[] text-input','id' => 'mathematical_model_id','data-prompt-position' => "bottomLeft")) !!}           
            <span class="help-block"><small>@lang('messages.optional')</small></span>
        </div> 
    </div>

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/unit_type') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>