@extends('template')

@section('title', 'Dashboard :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<aside>
    <p>Stage: {{$data->stage}}</p>
    <form action="/logout" method="post">
        {{@csrf_field()}}
    <p><button>logout</button></p>
</form>
</aside>
<p>Username: {{$data->username}}</p>


<script>
    console.log('JavaSript is working!!!')
</script>




@endsection