<!--div class="form-group"-->
    <!-- dms  -->
    <div id="dms">
        <div class="col-md-2">@lang('messages.latitude')</div>
        <div class="col-md-2">
                <span class="top title">@lang('messages.grades')</span>
                <input type="number" value="0" id="grade-phi" min="0" max="90" class="form-control validate[required,min[0],max[90] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        <div class="col-md-2">
                <span class="top title">@lang('messages.minutes')</span>
                <input type="number" value="0" id="minute-phi" min="0" max="59" class="form-control validate[required,min[0],max[59] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        <div class="col-md-3">
                <span class="top title">@lang('messages.seconds')</span>
                <input type="number" value="0" id="second-phi" min="0" max="59" step=".01" class="form-control validate[required,min[0],max[59] text-input geopoint" data-prompt-position= "bottomLeft">                      
        </div>
        <div class="col-md-2 col-md-offset-1">
                <span class="top title">@lang('messages.orientation')</span>
                <select id="orientation-phi" class="form-control geopoint">
                    <option value="n">@lang('messages.north')</option>
                    <option value="s">@lang('messages.south')</option>

                </select>                      
        </div>
        <div class="clearfix"></div>
        <div class="col-md-2">@lang('messages.longitude')</div>
        <div class="col-md-2">
                <span class="top title">@lang('messages.grades')</span>
                <input type="number" value="0" id="grade-lambda" min="0" max="180" class="form-control validate[required,min[0],max[180] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        <div class="col-md-2">
                <span class="top title">@lang('messages.minutes')</span>
                <input type="number" value="0" id="minute-lambda" min="0" max="59" class="form-control validate[required,min[0],max[59] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        <div class="col-md-3">
                <span class="top title">@lang('messages.seconds')</span>
                <input type="number" value="0" id="second-lambda" min="0" max="59" step=".01" class="form-control validate[required,min[0],max[59] text-input geopoint" data-prompt-position= "bottomLeft">                      
        </div>
        <div class="col-md-2 col-md-offset-1">
                <span class="top title">@lang('messages.orientation')</span>
                <select id="orientation-lambda" class="form-control geopoint">
                    <option value="e">@lang('messages.east')</option>
                    <option value="w">@lang('messages.west')</option>
                </select>                      
        </div>
    </div>
    <!-- dms end  -->

    <!-- ddm  -->
    <div id="ddm">
        <div class="col-md-2">@lang('messages.latitude')</div>
        <div class="col-md-2">
                <span class="top title">@lang('messages.grades')</span>
                <input type="number" value="0" id="grade-phi3" min="0" max="90" class="form-control validate[required,min[0],max[90] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        <div class="col-md-3">
                <span class="top title">@lang('messages.minutes')</span>
                <input type="number" value="0" id="minute-phi3" min="0" max="59" step=".001" class="form-control validate[required,min[0],max[59] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        <div class="col-md-2 col-md-offset-1">
                <span class="top title">@lang('messages.orientation')</span>
                <select id="orientation-phi3" class="form-control geopoint">
                    <option value="n">@lang('messages.north')</option>
                    <option value="s">@lang('messages.south')</option>

                </select>                      
        </div>
        <div class="clearfix"></div>
        <div class="col-md-2">@lang('messages.longitude')</div>
        <div class="col-md-2">
                <span class="top title">@lang('messages.grades')</span>
                <input type="number" value="0" id="grade-lambda3" min="0" max="180" class="form-control validate[required,min[0],max[180] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        <div class="col-md-3">
                <span class="top title">@lang('messages.minutes')</span>
                <input type="number" value="0" id="minute-lambda3" min="0" max="59" step=".001" class="form-control validate[required,min[0],max[59] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        <div class="col-md-2 col-md-offset-1">
                <span class="top title">@lang('messages.orientation')</span>
                <select id="orientation-lambda3" class="form-control geopoint">
                    <option value="e">@lang('messages.east')</option>
                    <option value="w">@lang('messages.west')</option>
                </select>                      
        </div>
    </div>
    <!-- ddm end  -->

    <!-- dd  -->
    <div id="dd">
        <div class="col-md-2">@lang('messages.latitude')</div>
        <div class="col-md-4">
                <span class="top title">@lang('messages.grades')</span>
                <input type="number" value="0" id="grade-phi2" min="0" max="90" step=".0001" class="form-control validate[required,min[0],max[90] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        
        <div class="col-md-2 col-md-offset-1">
                <span class="top title">@lang('messages.orientation')</span>
                <select id="orientation-phi2" class="form-control geopoint">
                    <option value="n">@lang('messages.north')</option>
                    <option value="s">@lang('messages.south')</option>

                </select>                      
        </div>
        <div class="clearfix"></div>
        <div class="col-md-2">@lang('messages.longitude')</div>
        <div class="col-md-4">
                <span class="top title">@lang('messages.grades')</span>
                <input type="number" value="0" id="grade-lambda2" min="0" max="180" step=".0001" class="form-control validate[required,min[0],max[180] text-input geopoint" data-prompt-position= "bottomLeft">
        </div>
        
        <div class="col-md-2 col-md-offset-1">
                <span class="top title">@lang('messages.orientation')</span>
                <select id="orientation-lambda2" class="form-control geopoint">
                    <option value="e">@lang('messages.east')</option>
                    <option value="w">@lang('messages.west')</option>
                </select>                      
        </div>
    </div> 
    <!-- dd end  -->                                   
<!--/div-->