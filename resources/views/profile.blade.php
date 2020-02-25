@extends('template')

@section('title', 'Profile :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<div id="body">
    @include('aside')
    <div id="real">
        <nav >
            <i  class="fa fa-align-justify"></i>
            
        </nav>
        <main>
            
           <div id="profile">
            
                    <div id="">
                        <p style="color: #1d2253">USERNAME: <b style="color: #16bcbb ">{{$data->username}}</b></p>
                        <p style="color: #1d2253">PHONE: <b style="color: #16bcbb ">{{$data->phone_number}}</b></p>
                        <p style="color: #1d2253">EMAIL: <b style="color: #16bcbb ">{{$data->email}}</b></p>
                        <p style="color: #1d2253">PACKAGE: <b style="color: #16bcbb ">{{$data->Package}} Stage {{$data->stage}}</b></p>
                        <p style="color: #1d2253">STATUS: <b style="color: #16bcbb ">@if ($data->status == 'cleared') {{"CERTIFIED AIBO"}}
                            @else
                            {{'NOT CERTIFIED AIBO'}}
                            @endif    
                        </b></p>
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