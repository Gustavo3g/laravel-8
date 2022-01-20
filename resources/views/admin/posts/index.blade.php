@extends('admin.layouts.app')

@section('content')
    
<a href="{{ route('posts.create') }}">CRIAR NOVO POST</a>
<h1>POSTS</h1>
<hr>
@if (session('message'))
    <div>
        {{session('message')}}
    </div>
@endif

<form action="{{ route('posts.search') }}" method="post">
    @csrf
    <input type="text" name="search" placeholder="filtrar">
    <button type="submit">FILTRAR</button>

</form>

<hr>
@foreach ($posts as $post)
    
    <p>
        {{$post->title}} 
        [ 
            <a href="{{ route('posts.show', $post->id) }}">Ver</a> | 
            <a href="{{ route('posts.edit', $post->id) }}">Editar</a> 
        ]
    </p>

@endforeach

<hr>
@if (isset($filters))
    {{$posts->appends($filters)->links()}}
@else
    {{$posts->links()}}
@endif

@endsection