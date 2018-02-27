<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.file')</div>
        <div class="col-md-2">
            {!! Form::file('path',array('placeholder' => __("messages.file"),'class' => 'form-control validate[required,maxSize[255]] text-input','id' => 'path','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>{{ isset($mathematicalModel->path) ? "$mathematicalModel->path " : __("messages.required_file") }}</small></span>                    
        </div> 
        
        <div class="col-md-2 TAR">@lang('messages.unit_type')</div>
        <div class="col-md-2">
            {!! Form::select('unit_type_id',$unitTypes, null, array('placeholder' => __("messages.unit_type"),'class' => 'form-control validate[required] text-input','id' => 'unit_type_id','data-prompt-position' => "bottomLeft",'title' => isset($mathematicalModel->unitType) ? $mathematicalModel->unitType->name : '' )) !!}           
            <span class="help-block"><small></small></span>
        </div>


    </div>
   

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/mathematical_model') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>