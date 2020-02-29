@extends('template')

@section('title', 'Withdraw :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<link rel="stylesheet" href="{{URL::asset('css/withdraw.css') }}" >
<div id="body">
    @include('aside')
    <div id="real">
        <nav >
            <i  class="fa fa-align-justify"></i>
            
        </nav>
        <main>
            <form method="POST" action="/withdraw"> 
                {{@csrf_field()}}
                <input type="email" name="p_email" placeholder=" Enter your printmoney email" required /><br />
                <input type="password" name="p_password" placeholder=" Enter your printmoney password" required/> <br />
                <input type="number" name="amount" placeholder=" Enter Amount to withdraw in $" required/> <br />
                <button type="submit">Withdraw Fund</button>
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