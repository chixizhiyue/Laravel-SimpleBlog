@section('title')
Pretty Blog
@stop
@include('header')

	<div id="main">
		<h1>Just a Blog.</h1>
		@include('nav')
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