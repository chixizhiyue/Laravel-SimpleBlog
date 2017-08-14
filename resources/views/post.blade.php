@section('title')
{{$article->title}}@stop
@section('keywords')
{{$article->tags}}@stop
@section('description')
{{$article->description}}@stop

@include('header')
	<div id="main">
		<h1>
			{{$article->title}}
			@if(Auth::user())
				@if(Auth::user()->id==$article->user_id)
					<span class="edit-btn"><a href="/post/{{$article->id}}/edit">Edit</a></span>
				@endif
			@endif
		</h1>
		<hr>
		<article>

			<?php
				$Parsedown = new Parsedown();
        		$article->post = $Parsedown->text($article->post);
			  	echo $article->post;?>

				<hr>

				<small>Categoty:</small>
				<a href="/category/{{\App\Category::findOrFail($article->cat)->id}}">{{\App\Category::findOrFail($article->cat)->value}}</a>
				<br>
				<small>Tags:</small> {{$article->tags}}
				<br>
				{{\App\User::findOrFail($article->user_id)->name}} <small>posted on</small> {{\Carbon\Carbon::parse($article->created_at)->toDateString()}}

		</article>

	</div>
@include('footer')