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

            <form method="POST" action="/package">
                {{@csrf_field()}}
                <input type="text" name="refer" placeholder="Enter Your referral username" required /><br />
                <input type="email" name="p_email" placeholder="Enter Your printMoney Email" required /><br />
                <input type="password" name="p_password" placeholder="Enter Your PrintMoney Password" required /><br />
                @if ($data->Package == 'AIBO')
                    <input type="text" value="$100" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="ETM">ETM </option>
                    </select><br />
                    <button type="submit" >UPGRADE PACKAGE</button>
                @elseif ($data->Package == 'ETM')
                    <input type="text" value="$200" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="EL">EL </option>
                    </select><br />
                    <button type="submit" >UPGRADE PACKAGE</button>
                @elseif($data->Package == 'EL')
                    <input type="text" value="$300" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="ED">ED </option>
                    </select><br />
                    <button type="submit" >UPGRADE PACKAGE</button>
                @elseif($data->Package == 'ED')
                    <input type="text" value="$600" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="RD">RD </option>
                    </select><br />
                    <button type="submit" >UPGRADE PACKAGE</button>
                @elseif($data->Package == 'RD')
                    <input type="text" value="$1,250" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="ND">ND </option>
                    </select><br />
                    <button type="submit" >UPGRADE PACKAGE</button>
                @elseif($data->Package == 'ND')
                    <input type="text" value="$2,500" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="RVP">RVP </option>
                    </select><br />
                    <button type="submit" >UPGRADE PACKAGE</button>
                @elseif($data->Package == 'RVP')
                    <input type="text" value="$12,500" id="price" name="price" disabled/>
                    <select name='package' required>
                        <option value="GVP">GVP </option>
                    </select><br />
                    <button type="submit" >UPGRADE PACKAGE</button>
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