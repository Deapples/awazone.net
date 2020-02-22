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
        <!-- using Div for the tree-->
        <div id="trees">
            <div id="parent">
                <p style="text-align: center">My Parent <b>{{$parent}}</b></p>
                <p style="margin-left: 9rem"> <b>Me </b>
                        <div id="children" style="display: flex">
                            <div id="child1"><b>1: {{$child1}} </b> 
                                <div id="childs" style="display: flex; "> <p id="child3" style=" margin: 1rem; margin-left:0;"><b>3: {{$child3}}</b></p>
                                    <p id="child4" style="margin-right:1rem;"><b> 4: {{$child4}}</b></p>
                                </div>
                            </div>
                            <div id="child2"><b> 2: {{$child_2}}</b>
                                <div id="childs" style="display: flex;"> <p id="child5" style=" margin: 1rem; margin-left:0;"><b>5: {{$child5}}</b></p>
                                        <p id="child6"><b>6: {{$child6}}</b></p>
                                </div>
                            </div>
                        </div>
                </p>
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