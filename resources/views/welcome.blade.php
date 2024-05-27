@extends('layout')
@section('content')
<div>
    <h1>My training app</h1>
@foreach($user as $u)   
   <li> {{$u}}</li>
@endforeach
</div>

@endsection

