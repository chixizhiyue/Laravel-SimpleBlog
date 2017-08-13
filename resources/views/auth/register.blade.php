@section('title')
Register
@stop
@include('header')
	<div id="main" class="col-md-4 col-md-offset-4 login-panel">
		<h1 class="text-center">Sign up</h1>
		<hr>
		{!!  Form::open(['url'=>'/auth/register']) !!}
			{!! Form::label('name') !!}
			{!! Form::text('name',null,["class"=>"form-control"]) !!}
			{!! Form::label('email') !!}
			{!! Form::text('email',null,["class"=>"form-control"]) !!}
			{!! Form::label('password') !!}
			{!! Form::password('password',["class"=>"form-control"]) !!}
			{!! Form::label('password_confirmation') !!}
			{!! Form::password('password_confirmation',["class"=>"form-control"]) !!}
			{!! Form::submit('Sign up',["class"=>"btn btn-default"]) !!}
		{!!  Form::close() !!}
		@if($errors->any())
		<div class="alert alert-danger post-warning" role="alert">
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</div>
		@endif
	</div>
@include('footer')