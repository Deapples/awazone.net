@extends('template')

@section('title', 'Transactions History :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<style>
    #table{
        margin: 2rem;
    }
</style>
<div id="body">
    @include('aside')
    <div id="real">
        <nav >
            <i  class="fa fa-align-justify"></i>
            
        </nav>
        <main>
            <div id="table" style="overflow-x:auto;">
<div style = "overflow-y:auto">
@if (!($transactions))
    {{'NO HISTORY YET'}}

@else
<table class="w3-table-all w3-hoverable">
    <thead>
      <tr style="background-color: #1d2253" class="w3-text-white w3-small">
      <th>ID</th>
        <th>AMOUNT</th>
        <th>DESCRIPTION</th>
        <th>DATE</th>
      </tr>
      </thead>
          @foreach ($transactions as $transaction){
            <tr class='w3-hover-light-blue' >
                <td>{{$transaction->id}}</td>
                <td>${{number_format($transaction->amount)}}</td>
                <td> {{$transaction->description}}</td>
                <td> {{$transaction->created_at}}</td>
          </tr>   
    
          }
          @endforeach    
        @endif
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