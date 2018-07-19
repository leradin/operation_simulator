<div class="col-md-1 TAR">@lang('messages.number_engines')</div>
<div class="col-md-1">
    {!! Form::number('number_engines', null, array('class' => 'form-control validate[required,min[1],max[2]] text-input','id' => 'number_engines','data-prompt-position' => "bottomLeft",'min' => '1','max' =>'2')) !!}
    <span class="help-block"><small>@lang('messages.required_max_10')</small></span>
</div>
