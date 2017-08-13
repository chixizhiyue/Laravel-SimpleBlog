@section('title')
{{$article->title}}
@stop
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
		</article>
	</div>
@include('footer')