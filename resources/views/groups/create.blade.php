@extends('layout')

@section('content')

<h1>Groups</h1>

<body>
<div class="container">
	@if(session()->has('status'))
		<p class="alert alert-info">
			{{	session()->get('status') }}
		</p>
	@endif
    <div class="col-sm-6 col-sm-offset-3">
    	<div class="panel panel-default">
    		<div class="panel-heading">
    			Add Group
    		</div>
    		
	    </div>
	</div>
</div>
</body>
@endsection