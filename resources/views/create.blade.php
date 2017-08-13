@section('title')
Create Post
@stop
@include('header')
	@if(Auth::user())
		<div id="main">
			<h1>Create New Post</h1>
			<hr>
			{!!  Form::open(['url'=>'/post']) !!}
				{!! Form::label('title') !!}
				{!! Form::text('title',null,["class"=>"form-control"]) !!}
				{!! Form::label('content') !!}
				{!! Form::textarea('post',null,["class"=>"form-control"]) !!}
				{!! Form::submit('Post',["class"=>"btn btn-default"]) !!}
			{!!  Form::close() !!}
			@if($errors->any())
			<div class="alert alert-danger post-warning" role="alert">
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</div>
			@endif
		</div>
	@else
		<div class="panel panel-default col-md-4 col-md-offset-4" style="margin:7% auto;float:none">
			<div class="panel-body">
				Access denied.
			</div>
		</div>
	@endif

@include('footer')