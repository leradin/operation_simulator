@extends('layouts.app')

@section('title', 'Inicio')

@section('js')
<script>
    window.close();
</script>
@endsection


@section('content') 
    
    <div class="errorContainer">
        <h1>404</h1>
        <h2>Not Found</h2>
        <button class="btn btn-primary btn-lg" onClick="document.location.href = 'index.html';">Back to main</button> <button class="btn btn-lg" onClick="history.back();">Previous page</button>
    </div>   
@endsection
