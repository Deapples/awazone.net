@extends('template')

@section('title', 'Dashboard :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<div id="body">
    @include('aside')
    <div id="real">
        <nav >
            <i  class="fa fa-align-justify"></i>
            
        </nav>
        <main>
            <p>Welcome, <b>{{$data->username}}</b></p>
            <div id="balances">
                <div id="acc">
                    <p><i class="fa fa-wallet"></i> <strong style="color: #16bcbb"> Account Balance: </strong> $ {{number_format(($data->balance)/400, 2)}}</p>
                </div>
                <div id="acc">
                    <p><i class="fa fa-wallet"></i> <strong style="color: #16bcbb"> Referral Bonus: </strong> $ {{number_format(($data->referral_bonus)/400, 2)}}</p>
                </div>
                <div id="acc">
                    <p><i class="fa fa-wallet"></i> <strong style="color: #16bcbb"> Potential Earning: </strong> $ {{number_format(($data->balance)/400, 2)}}</p>
                </div>
            </div>
            <div id="upgrade">
                <div id="con">
                    <p> <a href="/upgrade">UPGRADE PACKAGE</a></p>
                </div>
            </div>
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