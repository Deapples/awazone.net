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
                @if ($data->Package == 'AIBO')
                    <input type="text" value="$100" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="ETM">ETM </option>
                    </select><br />
                    <button type="submit" disabled>UPGRADE PACKAGE</button>
                @elseif ($data->Package == 'ETM')
                    <input type="text" value="$200" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="EL">EL </option>
                    </select><br />
                    <button type="submit" disabled>UPGRADE PACKAGE</button>
                @elseif($data->Package == 'EL')
                    <input type="text" value="$300" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="ED">ED </option>
                    </select><br />
                    <button type="submit" disabled>UPGRADE PACKAGE</button>
                @elseif($data->Package == 'ED')
                    <input type="text" value="$600" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="RD">RD </option>
                    </select><br />
                    <button type="submit" disabled>UPGRADE PACKAGE</button>
                @elseif($data->Package == 'RD')
                    <input type="text" value="$1,250" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="ND">ND </option>
                    </select><br />
                    <button type="submit" disabled>UPGRADE PACKAGE</button>
                @elseif($data->Package == 'ND')
                    <input type="text" value="$2,500" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="RVP">RVP </option>
                    </select><br />
                    <button type="submit" disabled>UPGRADE PACKAGE</button>
                @elseif($data->Package == 'RVP')
                    <input type="text" value="$12,500" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="GVP">GVP </option>
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