@extends('layout')
@section('content')
<div>
    <h1>Post</h1>
    Nombre de posts: {{count($posts)}}
    <br>
    @if (count($posts) === 0)
        Aucun post    
    @endif
    <div style="display:flex">
        @foreach ($posts as $post)
        <div style="border: 1px solid ; margin:10px; background:#dddd; width:400px" >
            <h2>{{$post->name}}</h2>  
            <div >{{$post->description}}</div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection

