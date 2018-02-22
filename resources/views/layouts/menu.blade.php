        <ul class="main">
            <li><a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}"><span class="icom-home"></span><span class="text">@lang('messages.menu_home')</span></a></li>
            <li><a href="{{ url('exercise') }}" class="{{ Request::is('exercise*') ? 'active' : '' }}"><span class="icom-bookmark"></span><span class="text">@lang('messages.menu_exercise')</span></a></li>
            <li><a href="{{ url('stage') }}" class="{{ Request::is('stage*') ? 'active' : '' }}"><span class="icom-newspaper"></span><span class="text">@lang('messages.menu_stage')</span></a></li>
            <div class="dr"><span></span></div>  
            <!--li><a href="{ { url('user') }}" class="{ { (Request::is('user*')) ? 'active' : '' }}"><span class="icom-user1"></span><span class="text">@ lang('messages.menu_user')</span></a></li-->
            <li><a href="{{ url('catalog/cabin') }}" class="{{ (Request::is('catalog/cabin*')) ? 'active' : '' }}"><span class="icom-delicious"></span><span class="text">@lang('messages.menu_cabin')</span></a></li>
            <li><a href="{{ url('catalog/computer_type') }}" class="{{ (Request::is('catalog/computer_type*')) ? 'active' : '' }}"><span class="icom-archive1"></span><span class="text">@lang('messages.menu_computer_type')</span></a></li>
            <li><a href="{{ url('catalog/computer') }}" class="{{ (Request::is('catalog/computer*')) ? 'active' : '' }}"><span class="icom-screen1"></span><span class="text">@lang('messages.menu_computer')</span></a></li>
            <li><a href="{{ url('catalog/device_type') }}" class="{{ (Request::is('catalog/device_type/*')) ? 'active' : '' }}"><span class="icom-drawer"></span><span class="text">@lang('messages.menu_device_type')</span></a></li>
            <li><a href="{{ url('catalog/device') }}" class="{{ (Request::is('catalog/device*')) ? 'active' : '' }}"><span class="icom-mouse"></span><span class="text">@lang('messages.menu_device')</span></a></li>
            <div class="dr"><span></span></div>

            <li><a href="{{ url('catalog/unit_type') }}" class="{{ (Request::is('catalog/unit_type*')) ? 'active' : '' }}"><span class="icom-archive2"></span><span class="text">@lang('messages.menu_unit_type')</span></a></li>
            <li><a href="{{ url('catalog/unit') }}" class="{{ (Request::is('catalog/unit*')) ? 'active' : '' }}"><span class="icom-rocket"></span><span class="text">@lang('messages.menu_unit')</span></a></li>
            <li><a href="{{ url('catalog/mathematical_model') }}" class="{{ (Request::is('catalog/mathematical_model*')) ? 'active' : '' }}"><span class="icom-calculate"></span><span class="text">@lang('messages.menu_mathematical_model')</span></a></li>
            <li><a href="{{ url('catalog/sensor') }}" class="{{ (Request::is('catalog/sensor*')) ? 'active' : '' }}"><span class="icom-loading"></span><span class="text">@lang('messages.menu_sensor')</span></a></li>
            <div class="dr"><span></span></div>
            <li><a href="{{ url('catalog/track') }}" class="{{ (Request::is('catalog/track*')) ? 'active' : '' }}"><span class="icom-target1"></span><span class="text">@lang('messages.menu_track')</span></a></li>
            <li><a href="{{ url('catalog/meteorological_phenomenon') }}" class="{{ (Request::is('catalog/meteorological_phenomenon*')) ? 'active' : '' }}"><span class="icom-cloud"></span><span class="text">@lang('messages.menu_meteorological_phenomenon')</span></a></li>
        </ul>
        @if (Request::is('catalog') || Request::is('catalog/*'))
        <div class="control"></div>        
        
        
        <div class="submain">
            @include('layouts.submenu')            
        </div>
        @endif

   