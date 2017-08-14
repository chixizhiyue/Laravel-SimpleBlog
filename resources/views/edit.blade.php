@section('title')
Edit Post
@stop
@include('header')
	@if(Auth::user())
		@if(Auth::user()->id==$article->user_id)
			<div id="main">
				<h1>Edit Post</h1>
                <?php
                $cat_list = [];
                foreach ($category as $category_value)
                {
                    $cat_list = array_merge($cat_list,[ "$category_value->slug"=>$category_value->value]);
                }
                //dd($cat_list);
                ?>
                @include('nav')
				{!!  Form::model($article,['url'=>'/post/'.$article->id,'method'=>'PATCH']) !!}
					{!! Form::label('title') !!}
					{!! Form::text('title',$article->title,["class"=>"form-control"]) !!}
                    {!! Form::label('category') !!}
                    {!! Form::select('cat',$cat_list,\App\Category::findOrFail($article->cat)->slug,["class"=>"form-control"]) !!}
					{!! Form::label('content') !!}
					{!! Form::textarea('post',$article->post,["class"=>"form-control","rows"=>"20"]) !!}

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
                                    {!! Form::text('description',$article->description,["class"=>"form-control"]) !!}
                                    {!! Form::label('tags') !!}
                                    {!! Form::text('tags',$article->tags,["class"=>"form-control"]) !!}
                                    {!! Form::label('index picture') !!}
                                    {!! Form::text('img',$article->img,["class"=>"form-control"]) !!}
                                    {!! Form::label('created at') !!}
                                    {!! Form::input('date','created_at',\Carbon\Carbon::parse($article->created_at)->toDateString(),["class"=>"form-control"]) !!}
                                </div>
                            </div>
                        </div>
                    </div>

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