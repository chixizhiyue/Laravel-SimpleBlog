@if(Auth::user())
    <p class="userbar">
        Welcome, <b>{{Auth::user()->name}}</b>.
        <span>
            <a href="/post/create">New Post</a>/
            <a href="/post/my/{{Auth::user()->id}}">My Post</a>/
            <a href="/category">Categories</a>/
            <a href="/auth/logout">Logout</a>
        </span>
    </p>
@else
    <p class="userbar">
        Welcome to laravel word.
        <span><a href="/auth/login">Login</a>/<a href="/auth/register">Register</a></span>
    </p>
@endif