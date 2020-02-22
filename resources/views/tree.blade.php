@extends('template')

@section('title', 'Geneaology :: Awazone')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/dash.css') }}" >
<style>
    hr { 
        width: 25rem;
margin-left: 1.66rem;
margin-right: 18rem;
}
#left{
    transform: rotate(90deg);
    margin-left: 1rem;
    width: 1.4rem;
}
#right{
    transform: rotate(90deg);
    margin-left: 26rem;
    width: 1.4rem;
    margin-bottom: 1rem;
    position: fixed;
    bottom: 29rem;
}
#childhr{
    width: 6rem;
}
#childhrleft{
    transform: rotate(90deg);
    width: 1.2rem;
    margin-left: 1rem;
}
#childhrright{
    transform: rotate(90deg);
    width: 1.2rem;
    margin-left: 7rem;
    position: fixed;
    bottom: 26.5rem;
}
#me, #myparent{
    margin-left: 12rem;
}
@media (max-width: 600px){
    body{
        margin: 0;
        overflow: scroll;
    }
    main{
        margin: 0;
        width: 50%;
        font-size:12px;
        overflow: scroll;
    }
    hr { 
        width: 12rem;
margin-left: 1.66rem;
margin-right: 18rem;
}
#me, #myparent{
    margin-left: 7rem;
}
svg{
    margin-left: -5rem;
}
#child2{
   position: absolute;
   left: 10rem;
}
#child4{
    margin-right:0;
}
#trees{
    position: absolute;
    left: 1rem;
    width:40%;
    
}
#childhrleft{
    width: 1.0rem;
}
#childhrright{
   margin-left: 7rem;
    top: 15.3rem;
}
#left{
     width: 1.1rem;
}
#right{
    margin-left: 13rem;
   
    top: 13rem;
   
}
nav{
    margin: 0;
    margin-top: 1rem;
    float: left;
}
html, body {
    position:fixed;
    top:0;
    bottom:0;
    left:0;
    right:0;
    overflow: hidden;
    
}
}
</style>
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
                <p id="myparent">My Parent: <b>{{$parent}}</b></p>
                <svg height="20" width="500">
  <line x1="199" y1="0" x2="200" y2="200" style="stroke:rgb(255,0,0);stroke-width:2" />
</svg>
                <p  id="me"> <b>Me </b></p>
                <svg height="20" width="500">
                    <line x1="199" y1="0" x2="200" y2="200" style="stroke:rgb(255,0,0);stroke-width:2" />
                </svg><hr /> <hr id="left" /> <hr id="right" />
                        <div id="children" style="display: flex">
                            <div id="child1"><b>{{$child1}} </b> 
                                    <hr id="childhr" />
                                    <hr id="childhrleft" />
                                    <hr id="childhrright" />


                                <div id="children" style="display: flex; "> <p id="child3" style=" margin: 1rem; margin-left:0;"><b> {{$child3}}</b></p>
                                    <p id="child4" style="margin-right:1rem;"><b>  {{$child4}}</b></p>
                                </div>
                            </div>


                            <div id="child2" style="margin-left: 0rem"><b>  {{$child_2}}</b>

                            <hr id="childhr" />
                                    <hr id="childhrleft" />
                                    <hr id="childhrright" />
                                <div id="children" style="display: flex;"> <p id="child5" style=" margin: 1rem; margin-left:0;"><b> {{$child5}}</b></p>
                                        <p id="child6"><b> {{$child6}}</b></p>
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