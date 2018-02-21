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

    <div id="div_for_inputs">
        
    </div>  

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('stage') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>