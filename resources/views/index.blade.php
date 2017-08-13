@section('title')
Pretty Blog
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
		@foreach($article as $post)
			<article class="index">
				<a href="/post/{{$post->id}}"><p>{{$post->title}}</p></a>
					<?php
						$Parsedown = new Parsedown();
    	    			$post_content = $Parsedown->text($post->description);
    	    			echo $post_content;
    	    		?>
			</article>
		@endforeach
		{!! $article->render() !!}
	</div>
@include('footer')