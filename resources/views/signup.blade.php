@extends('template')

@section('title', 'Awazone :: Sign Up')

@section('content')
<link rel="stylesheet" href="{{URL::asset('css/signin.css') }}" >
<form action="/signuserup" method="POST">
<img src="https://res.cloudinary.com/ezeko/image/upload/v1581001963/images/logo_awazone_lp7usp.png" 
        alt="awazone network partner" name="awa-image" />
        <!--if there is information in the sent view-->
        @if(isset($data))
                        @if(isset($msg))
                        <div id="message">
                            <p>
                            {{$msg}}
                            </p>
                        </div>
                        @else
                        <div style="display: none">
                        <p style="display: none">nothing</p>
                        </div>
                        @endif
                    
                    {{@csrf_field()}}
                    
                    <div class="field"> <i class="fa fa-align-justify"></i><input type="text" name="username" value="{{$data->username}}" required/></div>
                    <div class="field"><i class="fa fa-user"></i><input type="text" name="fullname" value="{{$data->fullname}}" placeholder=" Fullname" required/></div>
                    <div class="field"> <i class="fa fa-envelope"></i><input type="email" name="email" value="{{$data->email}}" placeholder="  Email Address" required/></div>
                    <div class="field"><i class="fa fa-phone"></i><input type="number" name="phone_number" value="{{$data->phone_number}}" placeholder=" Phone Number" required/></div>
                    <div class="field"><i class="fa fa-handshake"></i><input type="text" name="referral"  placeholder=" Referred By"
                    value="{{$data->refferal}}"/></div>
                    <div class="field"> <i class="fa fa-key"></i><input type="password" name="password" placeholder=" Password" required/></div>
                    <div class="field"><i class="fa fa-key"></i><input type="password" name="password2" placeholder=" Confirm Password" required/></div>

                    <div id="captcha">
                    <div class="g-recaptcha" name='captcha' data-sitekey="6Ldks5MUAAAAAKahIjEBfG_bTXNTZtvElfcrNydt"></div>
                    </div>
                    <div>
                    <input type="checkbox" name="check"  required/> I Agree to terms and conditions
                    </div>
                    <div>

                        <button type="submit">SIGNUP NOW</button>
                    </div>
                    <div> 
                        <h3>I have an account already <a href="/login"> Signin </a></h3>
                        
                    </div>
                </form>

        @else
        @if(isset($msg))
        <div id="message">
            <p>
            {{$msg}}
            </p>
        </div>
        @else
        <div style="display: none">
        <p style="display: none">nothing</p>
        </div>
        @endif
       
    {{@csrf_field()}}
    
    <div class="field"> <i class="fa fa-align-justify"></i><input type="text" name="username" placeholder=" Username " required/></div>
    <div class="field"><i class="fa fa-user"></i><input type="text" name="fullname" placeholder=" Fullname" required/></div>
    <div class="field"> <i class="fa fa-envelope"></i><input type="email" name="email" placeholder="  Email Address" required/></div>
    <div class="field"><i class="fa fa-phone"></i><input type="number" name="phone_number" placeholder=" Phone Number" required/></div>
    <div class="field"><i class="fa fa-handshake"></i><input type="text" name="referral" placeholder=" Referred By"/></div>
    <div class="field"> <i class="fa fa-key"></i><input type="password" name="password" placeholder=" Password" required/></div>
    <div class="field"><i class="fa fa-key"></i><input type="password" name="password2" placeholder=" Confirm Password" required/></div>

    <div id="captcha">
    <div class="g-recaptcha" name='captcha' data-sitekey="6Ldks5MUAAAAAKahIjEBfG_bTXNTZtvElfcrNydt"></div>
    </div>
    <div>
    <input type="checkbox" name="check" placeholder=" Confirm Password" required/> I Agree to terms and conditions
    </div>
    <div>

        <button type="submit">SIGNUP NOW</button>
    </div>
    <div> 
        <h3>I have an account already <a href="/signin"> Signin </a></h3>
        
    </div>
</form>
@endif

@endsection