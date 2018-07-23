@extends('layouts.app')

@section('title', 'Inicio')

@section('js')
<script>
    window.close();
</script>
@endsection


@section('content') 
    <div class="errorContainer">
        <h1>@lang('messages.error_404')</h1>
        <h2>@lang('messages.not_found')</h2>
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg" >@lang('messages.home')</a> <button class="btn btn-lg" onClick="history.back();">@lang('messages.back')</button>
    </div>   
@endsection
