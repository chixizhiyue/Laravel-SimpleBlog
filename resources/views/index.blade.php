@section('title')
<?php if(isset($title)){ echo $title;}else{ echo "Pretty Blog";}?>
@stop
@section('keywords')
Laravel,Blog
@stop
@section('description')
A Pretty Blog Powered by Laravel.
@stop
@include('header')

	<div id="main">
		<h1><a class="site-title" href="/">Just a Blog.</a></h1>
		@include('nav')
		@foreach($article as $post)
			<article class="index">
				<a href="/post/{{$post->id}}">
					<p>{{$post->title}}</p>
					@if($post->img)
						<img class="index-img" src="{{$post->img}}" alt="{{$post->title}}">
					@endif
				</a>
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