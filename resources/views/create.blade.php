@section('title')
Create Post
@stop
@include('header')
	@if(Auth::user())
		<div id="main">
			<h1>Create New Post</h1>
            <?php
            $cat_list = [];
            foreach ($category as $category_value)
            {
                $cat_list = array_merge($cat_list,[ "$category_value->slug"=>$category_value->value]);
            }
            //dd($cat_list);
            ?>
            @include('nav')
			{!!  Form::open(['url'=>'/post']) !!}
				{!! Form::label('title') !!}
				{!! Form::text('title',null,["class"=>"form-control"]) !!}
				{!! Form::label('category') !!}
				{!! Form::select('cat',$cat_list,null,["class"=>"form-control"]) !!}
				{!! Form::label('content') !!}
				{!! Form::textarea('post',null,["class"=>"form-control","rows"=>"20"]) !!}

			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								Extra Setings
							</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							{!! Form::label('description') !!}
							{!! Form::text('description',null,["class"=>"form-control"]) !!}
							{!! Form::label('tags') !!}
							{!! Form::text('tags',null,["class"=>"form-control"]) !!}
							{!! Form::label('index picture') !!}
							{!! Form::text('img',null,["class"=>"form-control"]) !!}
						</div>
					</div>
				</div>
			</div>


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