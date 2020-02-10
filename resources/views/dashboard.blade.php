@extends('template')

@section('title', 'Dashboard :: Awazone')

@section('content')


<p>Username: {{session_id()}}</p>
<p><a href="/logout">logout</a></p>




@endsection