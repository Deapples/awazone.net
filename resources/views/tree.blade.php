@extends('template')

@section('title', 'Geneaology :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<div id="body">
    @include('aside')
    <div id="real">
        <nav >
            <i  class="fa fa-align-justify"></i>
            
        </nav>
        <main>
        <ul>
                <li>Parent <b>{{$parent}}</b></li>
          <ul>
              <li> <b>Me </b>
                  <ul style="display: flex">
                      <li >child1: <b>{{$child1}}</b>
                          <ul style="display: flex">
                              <li>child1 of child1: <b>{{$child3}}</b></li>
                              <li style="margin-left: 2rem">child2 of child1: <b>{{$child4}}</b></li>
                            </ul>
                        </li>
                      <li style="margin-left: 2rem">child2: <b>{{$child_2}}</b>
                          <ul style="display: flex">
                              <li>child1 of child2: <b>{{$child5}}</b></li>
                              <li style="margin-left: 2rem"> child2 of child2: <b>{{$child6}}</b> </li>
                          </ul>
                      </li>
                  </ul>
                </li>
            </ul>
        </ul>
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