@extends('template')

@section('title', 'Upgrade Package :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<link rel="stylesheet" href="{{URL::asset('css/upgrade.css') }}" >

<div id="body">
    @include('aside')
    <div id="real">
        <nav >
            <i  class="fa fa-align-justify"></i>
            
        </nav>
        <main>
            <p>Welcome, <b>{{$data->username}}</b></p>

            <form method="POST">
                <input type="text" placeholder="Enter Your referral username" /><br />
                @if ($data->Package !== 'AIBO')
                    <select name='package' required>
                        <option value="ETM">ETM </option>
                    </select><br />
                    <button type="submit" disabled>UPGRADE PACKAGE</button>
                @endif
            </form>

          
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