@section('title')
My Post
@stop
@include('header')

	<div id="main">
		<h1>Just a Blog.</h1>
		@if(Auth::user())
		<p class="userbar">
			Welcome, <b>{{Auth::user()->name}}</b>.
			<span><a href="/post/create">New Post</a>/<a href="/post/my/{{Auth::user()->id}}">My Post</a>/<a href="/auth/logout">Logout</a></span>
		</p>		
		@else
		<p class="userbar">
			Welcome to laravel word.
			<span><a href="/auth/login">Login</a>/<a href="/auth/register">Register</a></span>
		</p>
		@endif

		<table class="table table-striped">
			<thead>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Manage</th>
			</tr>
			</thead>
			<tbody>
			@foreach($article as $post)
				<tr>
					<td><a href="/post/{{$post->id}}"><p>{{$post->title}}</p></a></td>
					<td>{{\Carbon\Carbon::parse($post->created_at)->toDateString()}}</td>
					<td>
						<span class="edit-btn"><a href="/post/{{$article->id}}/edit">Edit</a></span>
						{!!  Form::model($article,['url'=>'/post/'.$article->id,'method'=>'DELETE']) !!}
						{!! Form::submit('Delete',["class"=>"btn btn-default btn-delete pull-right"]) !!}
						{!!  Form::close() !!}
					</td>
				</tr>
			@endforeach


			</tbody>
		</table>





	</div>
@include('footer')