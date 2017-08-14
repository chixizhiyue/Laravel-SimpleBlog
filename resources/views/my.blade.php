@section('title')
My Post
@stop
@include('header')

	<div id="main">
		<h1>Just a Blog.</h1>
		@include('nav')

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
					<td><a href="/post/{{$post->id}}">{{$post->title}}</a></td>
					<td>{{\Carbon\Carbon::parse($post->created_at)->toDateString()}}</td>
					<td>
						{!!  Form::model($article,['url'=>'/post/'.$post->id,'method'=>'DELETE']) !!}
						<a class="btn btn-default mt0 btn-sm" href="/post/{{$post->id}}/edit">Edit</a>
						{!! Form::submit('Delete',["class"=>"btn btn-default btn-delete mt0 btn-sm"]) !!}
						{!!  Form::close() !!}
					</td>
				</tr>
			@endforeach


			</tbody>
		</table>





	</div>
@include('footer')