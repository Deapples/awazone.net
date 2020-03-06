@extends('template')

@section('title', 'Awazone :: Sign In')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/styles.css') }}" >
<form method="POST" action="/resetpassword">
    <img src="https://res.cloudinary.com/ezeko/image/upload/v1581001974/images/logo_r5tpwx.png" 
    alt="awazone image" />
    {{@csrf_field()}}
    <div class="field"> <i class="fa fa-envelope"></i><input type="email" name="user" placeholder="Your registered email here" /></div>

    <div id="captcha">
    <div class="g-recaptcha" name='captcha' data-sitekey="6LcYANoUAAAAAG_iUiLg03dXtvagATFovyaWSufF"></div>
    </div>
    <div>
        <button type="submit">CHANGE PASSWORD</button>
    </div>
    <div> 
        <h3>I have no account <a href="/signup"> Signup Now</a></h3>
        <img src="https://res.cloudinary.com/ezeko/image/upload/v1581001963/images/logo_awazone_lp7usp.png" 
        alt="awazone network partner" name="awa-image" />
    </div>
</form>

@endsection