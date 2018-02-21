@if (session('message.type'))
	<div class="alert {{ session('message.type') == 'error' ? 'alert-danger' : 'alert-success' }}">            
    	<strong><i class="glyphicon {{ session('message.type') == 'error' ? 'glyphicon glyphicon-remove' : 'glyphicon glyphicon-ok' }}"></i></strong> {{ session('message.status') }}
    </div>
@elseif($errors->any())
	<div class="alert alert-danger">
		<ul>
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif