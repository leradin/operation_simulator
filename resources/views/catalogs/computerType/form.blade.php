<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-4">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.abbreviation')</div>
        <div class="col-md-4">
            {!! Form::text('abbreviation', null, array('placeholder' => __("messages.abbreviation"),'class' => 'form-control validate[required,maxSize[25]] text-input','id' => 'abbreviation','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_25')</small></span>
        </div> 
    </div>

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/computer_type') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>