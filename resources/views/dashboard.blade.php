@extends('template')

@section('title', 'Dashboard :: Awazone')

@section('content')


<p>Username: {{session('id')}}</p>
<p>Status: {{(session('id')!== null)}}</p>
<form action="/logout" method="post">
    {{@csrf_field()}}
<p><button>logout</button></p>
</form>




@endsection