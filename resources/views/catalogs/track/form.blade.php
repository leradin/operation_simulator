<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.identity')</div>
        <div class="col-md-2">
            {!! Form::select('identity',$identities, null, array('class' => 'form-control validate[required] text-input','id' => 'identity','data-prompt-position' => "bottomLeft",'title' => isset($track) ? $track->identity : '','onchange' => 'createSymbology()')) !!}           
            <span class="help-block"><small></small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.battle_dimension')</div>
        <div class="col-md-2">
            {!! Form::select('battle_dimension',$battleDimensions, null, array('class' => 'form-control validate[required] text-input','id' => 'battle_dimension','data-prompt-position' => "bottomLeft",'title' => isset($track) ? $track->battle_dimension : '','onchange' => 'createSymbology()')) !!}           
            <span class="help-block"><small></small></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.status')</div>
        <div class="col-md-2">
            {!! Form::select('status',$statuss, null, array('class' => 'form-control validate[required] text-input','id' => 'status','data-prompt-position' => "bottomLeft",'title' => isset($track) ? $track->status : '','onchange' => 'createSymbology()')) !!}           
            <span class="help-block"><small></small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.sidc')</div>
        <div class="col-md-2">
            <div id="divSymbology" class="form-group col-sm-12 col-md-3 col-lg-3"></div>
            <canvas id="preview" width="800" height="600" style="display: none"></canvas> 
            {!! Form::hidden('sidc', null, array('placeholder' => __("messages.sidc"),'class' => 'form-control validate[required] text-input','id' => 'sidc','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small></small></span>
        </div>
    </div>
   

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('catalog/track') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>