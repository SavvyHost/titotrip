@extends('base')
@section("title", "Password Recovery")
@section("content")
    
    <div class="flex full-width">
        
        <main class="flex-column relative">

            <div class="recovery-form recovery1 flex-column form2 register-form login-form">

                <div class="image"> <img src="static/image/public/log.png"> </div>
    
                <form class="flex-column full-width">
    
                    <h1> Password Recovery </h1>
    
                    <p> To start changing your password, please enter email. </p>
    
                    <div class="input flex-start full-width relative">
    
                        <label class="flex-start absolute">E-mail</label>
                        <i class="fa fa-user flex-start"></i>
                        {{-- <input type="email" class="email form1-input" name="email" autocompelete="off"> --}}
                        <input type="email" class="email form2-input hide" name="email" placeholder="E-mail" autocompelete="off">
    
                    </div>
                    <div class="error email-error full-width flex-start hide"></div>
    
                    <input type="submit" name="register" value="Send Password">
    
                    <div class="recovery-faild full-width flex-start error align-start hide">
                       <i class="fa fa-warning"></i> You entered the wrong credentials. Please ensure that your email is correct.
                    </div>
    
                </form>
    
                <div class="forget flex-column full-width">
    
                    <p class="full-width flex"> <a href="/login"> Back to Log In </a> </p>
    
                    <p class="full-width flex"> Don't have an account ? &nbsp; <a href="/register"> Sing Up </a> </p>
    
                </div>
    
            </div>
    
            <div class="recovery-form recovery form2 flex-column hide login-form register-form">
                    
                <div class="image"> <img src="static/image/public/log.png"> </div>
    
                <form class="flex-column full-width">
    
                    <h1> Password Recovery </h1>
    
                    <p>
                        E-mail has been to your mail-box,
                        <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">check your inbox</a>
                    </p>
    
                    <div class="resend full-width flex-column">
    
                        <p>Haven't received the email yet?</p>
    
                        <span class="resend-password pointer">Resend</span>
    
                    </div>
    
                    <a href="/login" class="pointer full-width flex back"> Back to Log In</a>
    
                </form>
    
            </div>
    
            <div class="loader login-loader flex absolute hide">  <div class="load"></div> </div>

        </main>

    </div>

    <div class="full-width flex-column scroll-bar">
            
        <main class="flex-space">
    
            <ul class="pages flex">
                
                <a href="/">Home</a>
                
                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Password Recovery</a>
                
            </ul>
    
            <ul class="scroll-up flex">
                
                <span> Scroll to Top </span>
    
                <i class="fa fa-angle-up circle go-up pointer flex"></i>
    
            </ul>
            
        </main>
    
    </div>

    <script>
        $("header").remove();
        $(".nav-side .side .login0").addClass("active");
    </script>

@endsection