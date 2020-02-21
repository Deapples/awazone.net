@extends('template')

@section('title', 'Dashboard :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<div id="body">
    <div id="aside">
        <aside>
        <p id="cancel"> &times; </p>
            <p id="pro"><i class="fa fa-user-circle"></i></p>
            <p>Stage: {{$data->stage}}</p>
            <p><a href="#"><i class="fa fa-home"></i> DASHBOARD</a></p>
            <p><a href="/profile"><i class="fa fa-user"></i> PROFILE</a></p>
            <p><a href="/tree"><i class="fa fa-sitemap"></i> GENEAOLOGY</a></p>
            <p><a href="/transact"><i class="fa fa-bolt"></i> TRANSACTION</a></p>
            <p><a href="/incentive"><i class="fa fa-gift"></i> INCENTIVES</a></p>
            <form action="/logout" method="post">
                    {{@csrf_field()}}
                <p><button><i class="fa fa-power-off"></i> logout</button></p>
            </form>
        </aside>
    </div>
    <div id="real">
        <nav >
            <i  class="fa fa-align-justify"></i>
            
        </nav>
        <main>
            <p>Welcome, <b>{{$data->username}}</b></p>
        </main>
    </div>
</div>
<footer>
    <script >
        let hamburger = document.querySelector('nav');
        let cancel = document.querySelector('#cancel');
        let aside = document.querySelector('aside')
        let main = document.querySelector('main')

        
        hamburger.addEventListener('click', ()=>{
            aside.style.display = 'block'
            main.style.display = 'none';
            hamburger.style.display = 'none';
            
        })
        cancel.addEventListener('click', ()=>{
            aside.style.display = 'none';
            main.style.display = 'block';
            hamburger.style.display = 'block';

        })
    </script>
</footer>





@endsection