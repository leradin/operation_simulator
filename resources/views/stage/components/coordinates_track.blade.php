        <div id="dms_track">
            <div class="col-md-2">@lang('messages.latitude')</div>
            <div class="col-md-2">
                    <span class="top title">@lang('messages.grades')</span>
                    <input type="number" value="0" id="grade-phi_track" min="0" max="90" class="form-control validate[required,min[0],max[90] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            <div class="col-md-2">
                    <span class="top title">@lang('messages.minutes')</span>
                    <input type="number" value="0" id="minute-phi_track" min="0" max="59" class="form-control validate[required,min[0],max[59] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            <div class="col-md-3">
                    <span class="top title">@lang('messages.seconds')</span>
                    <input type="number" value="0" id="second-phi_track" min="0" max="59" step=".01" class="form-control validate[required,min[0],max[59] text-input geopoint_track" data-prompt-position= "bottomLeft">                      
            </div>
            <div class="col-md-2 col-md-offset-1">
                    <span class="top title">@lang('messages.orientation')</span>
                    <select id="orientation-phi_track" class="form-control geopoint_track">
                        <option value="n">@lang('messages.north')</option>
                        <option value="s">@lang('messages.south')</option>

                    </select>                      
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2">@lang('messages.longitude')</div>
            <div class="col-md-2">
                    <span class="top title">@lang('messages.grades')</span>
                    <input type="number" value="0" id="grade-lambda_track" min="0" max="180" class="form-control validate[required,min[0],max[180] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            <div class="col-md-2">
                    <span class="top title">@lang('messages.minutes')</span>
                    <input type="number" value="0" id="minute-lambda_track" min="0" max="59" class="form-control validate[required,min[0],max[59] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            <div class="col-md-3">
                    <span class="top title">@lang('messages.seconds')</span>
                    <input type="number" value="0" id="second-lambda_track" min="0" max="59" step=".01" class="form-control validate[required,min[0],max[59] text-input geopoint_track" data-prompt-position= "bottomLeft">                      
            </div>
            <div class="col-md-2 col-md-offset-1">
                    <span class="top title">@lang('messages.orientation')</span>
                    <select id="orientation-lambda_track" class="form-control geopoint_track">
                        <option value="e">@lang('messages.east')</option>
                        <option value="w">@lang('messages.west')</option>
                    </select>                      
            </div>
        </div>

        <div id="ddm_track">
            <div class="col-md-2">@lang('messages.latitude')</div>
            <div class="col-md-2">
                    <span class="top title">@lang('messages.grades')</span>
                    <input type="number" value="0" id="grade-phi3_track" min="0" max="90" class="form-control validate[required,min[0],max[90] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            <div class="col-md-2">
                    <span class="top title">@lang('messages.minutes')</span>
                    <input type="number" value="0" id="minute-phi3_track" min="0" max="59" step=".001" class="form-control validate[required,min[0],max[59] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            <div class="col-md-2 col-md-offset-1">
                    <span class="top title">@lang('messages.orientation')</span>
                    <select id="orientation-phi3_track" class="form-control geopoint_track">
                        <option value="n">@lang('messages.north')</option>
                        <option value="s">@lang('messages.south')</option>

                    </select>                      
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2">@lang('messages.longitude')</div>
            <div class="col-md-2">
                    <span class="top title">@lang('messages.grades')</span>
                    <input type="number" value="0" id="grade-lambda3_track" min="0" max="180" class="form-control validate[required,min[0],max[180] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            <div class="col-md-2">
                    <span class="top title">@lang('messages.minutes')</span>
                    <input type="number" step=".0001" value="0" id="minute-lambda3_track" min="0" max="59" class="form-control validate[required,min[0],max[59] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            <div class="col-md-2 col-md-offset-1">
                    <span class="top title">@lang('messages.orientation')</span>
                    <select id="orientation-lambda3_track" class="form-control geopoint_track">
                        <option value="e">@lang('messages.east')</option>
                        <option value="w">@lang('messages.west')</option>
                    </select>                      
            </div>
        </div>

        <div id="dd_track">
            <div class="col-md-2">@lang('messages.latitude')</div>
            <div class="col-md-4">
                    <span class="top title">@lang('messages.grades')</span>
                    <input type="number" value="0" id="grade-phi2_track" min="0" max="90" step=".0001" class="form-control validate[required,min[0],max[90] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            
            <div class="col-md-2 col-md-offset-1">
                    <span class="top title">@lang('messages.orientation')</span>
                    <select id="orientation-phi2_track" class="form-control geopoint_track">
                        <option value="n">@lang('messages.north')</option>
                        <option value="s">@lang('messages.south')</option>

                    </select>                      
            </div>
            <div class="clearfix"></div>
            <div class="col-md-2">@lang('messages.longitude')</div>
            <div class="col-md-4">
                    <span class="top title">@lang('messages.grades')</span>
                    <input type="number" value="0" id="grade-lambda2_track" min="0" max="180" step=".0001" class="form-control validate[required,min[0],max[180] text-input geopoint_track" data-prompt-position= "bottomLeft">
            </div>
            
            <div class="col-md-2 col-md-offset-1">
                    <span class="top title">@lang('messages.orientation')</span>
                    <select id="orientation-lambda2_track" class="form-control geopoint_track">
                        <option value="e">@lang('messages.east')</option>
                        <option value="w">@lang('messages.west')</option>
                    </select>                      
            </div>
        </div>   