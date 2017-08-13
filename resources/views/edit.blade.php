@section('title')
Edit Post
@stop
@include('header')
	@if(Auth::user())
		@if(Auth::user()->id==$article->user_id)
			<div id="main">
				<h1>Edit Post</h1>
				<hr>
				{!!  Form::model($article,['url'=>'/post/'.$article->id,'method'=>'PATCH']) !!}
					{!! Form::label('title') !!}
					{!! Form::text('title',$article->title,["class"=>"form-control"]) !!}
					{!! Form::label('content') !!}
					{!! Form::textarea('post',$article->post,["class"=>"form-control"]) !!}
					{!! Form::hidden('edit_user',Auth::user()->id) !!}
					{!! Form::submit('Edit',["class"=>"btn btn-default pull-left"]) !!}
				{!!  Form::close() !!}
				{!!  Form::model($article,['url'=>'/post/'.$article->id,'method'=>'DELETE']) !!}
						{!! Form::submit('Delete',["class"=>"btn btn-default btn-delete pull-right"]) !!}
				{!!  Form::close() !!}
				<div class="clearfix"></div>
				@if($errors->any())
				<div class="alert alert-danger post-warning" role="alert">
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</div>
				@endif
		@else
			<div class="panel panel-default col-md-4 col-md-offset-4" style="margin:7% auto;float:none">
				<div class="panel-body">
					Access denied.
				</div>
			</div>
		@endif
	@else
	<div class="panel panel-default col-md-4 col-md-offset-4" style="margin:7% auto;float:none">
		<div class="panel-body">
		  Please click <a href="/auth/login">here</a> to login
		</div>
	</div>
		
	@endif
	</div>
@include('footer')