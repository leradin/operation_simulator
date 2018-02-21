<div class="block-fluid">
    <div class="form-group">

        <div class="col-md-1 TAR">@lang('messages.stage')</div>
        <div class="col-md-11">
            <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="10%">@lang('messages.id')</th>
                                    <th width="20%">@lang('messages.name')</th>
                                    <th width="30%">@lang('messages.description')</th>
                                    <th width="20%">@lang('messages.southwest')</th>
                                    <th width="20%">@lang('messages.northeast')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stages as $stage)
                                    <tr>
                                    <td>{{ $stage->id }}</td>
                                    <td>{{ $stage->name }}</td>
                                    <td>{{ $stage->description }}</td>
                                    <td>{{ $stage->southwest }}</td>
                                    <td>{{ $stage->northeast }}</td>
                                    </tr>   
                                @endforeach                          
                            </tbody>
                        </table>
            {!! Form::text('stage_id', null, array('class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'stage_id','data-prompt-position' => "bottomLeft")) !!}            
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.name')</div>
        <div class="col-md-2">
            {!! Form::text('name', null, array('placeholder' => __("messages.name"),'class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'name','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.description')</div>
        <div class="col-md-6">
            {!! Form::textarea('description', null, array('placeholder' => __("messages.description"),'class' => 'form-control validate[maxSize[255]] text-input','id' => 'description','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_255')</small></span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.root_date_time')</div>
        <div class="col-md-2">
            {!! Form::text('root_date_time', null, array('placeholder' => __("messages.root_date_time"),'class' => 'form-control validate[required,maxSize[50]] text-input datetime','id' => 'root_date_time','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.scheduler_date_time')</div>
        <div class="col-md-2">
            {!! Form::text('scheduler_date_time', null, array('placeholder' => __("messages.scheduler_date_time"),'class' => 'form-control validate[required,maxSize[50]] text-input datetime' ,'id' => 'scheduler_date_time','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.directors')</div>
        <div class="col-md-2">
            <select name="s_example" multiple="multiple" class="select" style="width: 100%; display: none;">
                <option value="0">choose a option...</option>
                <option value="1">Andorra</option>
                <option value="2">Antarctica</option>
                <option value="3">Bulgaria</option>
                <option value="4">Germany</option>
                <option value="5">Dominican Republic</option>
                <option value="6">Micronesia</option>
                <option value="7">United Kingdom</option>
                <option value="8">Greece</option>
                <option value="9">Italy</option>
                <option value="10" selected="selected">Ukraine</option>                                                                       
            </select>
        </div>
    </div>

        

    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('exercise') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>