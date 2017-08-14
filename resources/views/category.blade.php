@section('title')
    Categories
@stop
@include('header')

<div id="main">
    <h1>Just a Blog.</h1>
    @include('nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Posts</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->value}}</td>
                <td>{{$cat->slug}}</td>
                <td><a class="btn btn-link mt0 btn-sm" href="/category/{{$cat->id}}">{{$cat->article->count()}}</a></td>
                <td>
                    {!!  Form::model($category,['url'=>'/category/'.$cat->id,'method'=>'DELETE']) !!}
                    <a class="btn btn-default mt0 btn-sm" href="/category/{{$cat->id}}/edit">Edit</a>
                    {!! Form::submit('Delete',["class"=>"btn btn-default btn-delete mt0 btn-sm"]) !!}
                    {!!  Form::close() !!}
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>
<hr>
    <h3>Create Category</h3>
    <br>
    {!!  Form::open(['url'=>'/category','class'=>'form-inline']) !!}
    {!! Form::text('value',null,["class"=>"form-control","placeholder"=>"Name"]) !!}
    {!! Form::text('slug',null,["class"=>"form-control","placeholder"=>"Slug"]) !!}
    {!! Form::submit('Create',["class"=>"btn btn-default mt0"]) !!}
    {!!  Form::close() !!}



</div>
@include('footer')