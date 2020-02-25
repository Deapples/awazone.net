@extends('template')

@section('title', 'Transactions History :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<style>
    main{
        margin: 0rem;
    }
</style>
<div id="body">
    @include('aside')
    <div id="real">
        <nav >
            <i  class="fa fa-align-justify"></i>
            
        </nav>
        <main>
            <div style="overflow-x:auto;">
<div style = "overflow-y:auto">

<table class="w3-table-all w3-hoverable">
    <thead>
      <tr style="background-color: #1d2253" class="w3-text-white w3-small">
      <th>NAME</th>
        <th>PLAN</th>
        <th>AMOUNT INVESTED</th>
        <th>PROFIT</th>
        <th>TOTAL EXPECTED RETURN</th>
        <th>DATE INVESTED</th>
        <th>EXPECTED DATE OF RETURN</th>
        <th>STATUS </th>
      </tr>
          
              <tr class='w3-hover-light-blue' ><td>Ezekiel</td><td>Print market</td><td> &#8358;5,000,000</td><td> &#8358;3,000,000</td><td> &#8358;8,000,000</td><td>2020-01-18 13:23:04</td><td>2021-01-18 10:49:36</td><td>running</td></tr>    </thead>
    
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