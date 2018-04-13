<div class="block-fluid">
    <div class="form-group">
        <div class="col-md-1 TAR">@lang('messages.stage')</div>
        <div class="col-md-11">
            <table  id="table" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="10%">@lang('messages.id')</th>
                        <th width="20%">@lang('messages.name')</th>
                        <th width="40%">@lang('messages.description')</th>
                        <th width="30%">@lang('messages.bounding_box')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stages as $stage)
                        <tr>
                        <td>{{ $stage->id }}</td>
                        <td>{{ $stage->name }}</td>
                        <td>{{ $stage->description }}</td>
                        <td>[{{ $stage->southwest }},{{ $stage->northeast }}]</td>
                        </tr>   
                    @endforeach                          
                </tbody>
            </table>
            {!! Form::hidden('stage_id', null, array('class' => 'form-control validate[required] text-input','id' => 'stage_id','data-prompt-position' => "bottomLeft","data-errormessage-value-missing" => __('messages.required_stage') )) !!}            
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
            {!! Form::select('user_id',$users, null, array('placeholder' => __("messages.directors"),'class' => 'form-control validate[required] text-input','id' => 'user_id','data-prompt-position' => "bottomLeft",'title' => isset($user) ? $user->name : '' )) !!}      
        </div>
    </div>
    <!--Relationship student and computers -->
    <div class="form-group">
        <div class="col-md-2 TAR">@lang('messages.relationship_students_computers')</div>
        <div class="col-md-10" id="extra-info">
       
        </div>        
    </div>

    <!--Meteorological Phenomenons-->
    <!--div class="form-group">
        <div class="col-md-2 TAR">@ lang('messages.effects_metheology')</div>
        <div class="col-md-10">
            <table cellpadding="0" id="meteorological_phenomenons" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="5%">@ lang('messages.id')</th>
                        <th width="15%">@ lang('messages.name')</th>
                        <th width="10%">@ lang('messages.type')</th>
                        <th width="10%">@ lang('messages.wind_direction')</th>
                        <th width="15%">@ lang('messages.sea_state')</th>
                        <th width="15%">@ lang('messages.cloud_type')</th>
                        <th width="10%">@ lang('messages.wind_velocity')</th>
                        <th width="10%">@ lang('messages.temperature')</th>
                    </tr>
                </thead>
                <tbody>
                    @ foreach($meteorologicalPhenomenons as $meteorologicalPhenomenon)
                        <tr>
                        <td>{ { $meteorologicalPhenomenon->id }}</td>
                        <td>{ { $meteorologicalPhenomenon->name }}</td>
                        <td>{ { $meteorologicalPhenomenon->type }}</td>
                        <td>{ { $meteorologicalPhenomenon->wind_direction }}</td>
                        <td>{ { $meteorologicalPhenomenon->sea_state }}</td>
                        <td>{ { $meteorologicalPhenomenon->cloud_type }}</td>
                        <td>{ { $meteorologicalPhenomenon->wind_velocity }}</td>
                        <td>{ { $meteorologicalPhenomenon->temperature }}</td>
                        </tr>   
                    @ endforeach                          
                </tbody>
            </table>
            { !! Form::hidden('meteorological_phenomenon_id', null, array('class' => 'form-control validate[required,maxSize[50]] text-input','id' => 'meteorological_phenomenon_id','data-prompt-position' => "bottomLeft","data-errormessage-value-missing" => __('messages.required_stage') )) !!}   
        </div>        
    </div-->

    <!--Tracks -->
    <!--div class="form-group">
        <div class="col-md-2 TAR">@ lang('messages.tracks')</div>
        <div class="col-md-10" id="tracks">
        
        <div class="checker TAC"><span class="checked"><input id="enable_track" checked="checked" value="1" type="checkbox"></span></div>@ lang('messages.enable')

        <hr />
        <button class=" btn btn-primary add_field_button">@ lang('messages.add_track')</button>
        <hr />
            <div class="input_fields_wrap">
                <div class="row">
                    <div class="col-md-2">
                        { !! Form::text('track[]', null, array('placeholder' => __("messages.track_1"),'class' => 'form-control validate[required,maxSize[50]] text-input','data-prompt-position' => "bottomLeft")) !!}
                    </div>
                    <div class="col-md-1">
                        { !! Form::text('course[]', null, array('placeholder' => __("messages.course_1"),'class' => 'form-control validate[required,maxSize[50]] text-input','data-prompt-position' => "bottomLeft")) !!}
                    </div>
                    <div class="col-md-1">
                        { !! Form::text('speed[]', null, array('placeholder' => __("messages.speed_1"),'class' => 'form-control validate[required,maxSize[50]] text-input','data-prompt-position' => "bottomLeft")) !!}
                    </div>
                    <div class="col-md-2">
                        { !! Form::text('position[]', null, array('placeholder' => __("messages.position_1"),'class' => 'form-control validate[required,maxSize[50]] text-input','data-prompt-position' => "bottomLeft",'readonly' => true,'onclick' => 'openModalMap(this)' )) !!}
                    </div>
                    <div class="col-md-2">
                        { !! Form::select('type',[1 => 'PI',2 => 'PO',3 => 'KING_AIR',4 => 'BOAT(GO FAST)'], null, ['placeholder' => __("messages.object_type"),'class' => 'validate[required]']) !!}
                    </div>
                    <div class="col-md-3">
                        <select id="symbology1" name="symbology[]" class="validate[required]">
                            <option value="" 
                                >@ lang('messages.track_type')</option>
                            @ f oreach($tracks as $track)
                                <option value="{ { $track['value'] }}" data-imagesrc="{ { $track['imageSrc'] }}"
                                >{ { $track['text'] }}</option>
                            @ endforeach
                        </select>           
                    </div>
                    <hr />
                </div>
            </div>
        </div>        
    </div-->
    <div class="toolbar bottom TAR">
        <div class="btn-group">
            <button class="btn btn-link" type="button" onClick="$('#validate').validationEngine('hide');">@lang('messages.hide_prompts')</button>
            <a href="{{ url('exercise') }}" class="btn btn-danger">@lang('messages.cancel')</a>
            <button class="btn btn-primary" type="submit">@lang('messages.submit')</button>
        </div>
    </div>
</div>