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
            {!! Form::hidden('stage_id', null, array('class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'stage_id','data-prompt-position' => "bottomLeft","data-errormessage-value-missing" => __('messages.required_stage') )) !!}            
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
            {!! Form::text('supremed_date_time', null, array('placeholder' => __("messages.root_date_time"),'class' => 'form-control validate[required,maxSize[50]] text-input datetime','id' => 'supremed_date_time','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.scheduler_date_time')</div>
        <div class="col-md-2">
            {!! Form::text('scheduled_date_time', null, array('placeholder' => __("messages.scheduler_date_time"),'class' => 'form-control validate[required,maxSize[50]] text-input datetime' ,'id' => 'scheduled_date_time','data-prompt-position' => "bottomLeft")) !!}
            <span class="help-block"><small>@lang('messages.required_max_50')</small></span>
        </div>

        <div class="col-md-2 TAR">@lang('messages.directors')</div>
        <div class="col-md-2">
            {!! Form::select('user_id',$users, null, array('placeholder' => __("messages.directors"),'class' => 'form-control validate[] text-input','id' => 'user_id','data-prompt-position' => "bottomLeft",'title' => isset($user) ? $user->name : '' )) !!}      
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