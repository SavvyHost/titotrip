@extends('base')
@section("title", "Login")
@section("content")

    <div class="flex full-width">
    
        <main class="flex-column relative">

            <div class="login-form flex-column form2 register-form log-form">
        
                <div class="image"> <img src="static/image/public/log.png"> </div>
        
                <form class="flex-column full-width">
        
                    <h1> Log In </h1>
        
                    <p> Log into your account with your email. </p>
        
                    <div class="input flex-start full-width relative">
        
                        <label class="flex-start absolute">E-mail or username</label>
                        <i class="fa fa-user flex-start"></i>
                        {{-- <input type="email" class="email form1-input" name="email" autocompelete="off"> --}}
                        <input type="email" class="email form2-input hide" name="email" placeholder="E-mail or username" autocompelete="off">
        
                    </div>
                    <div class="error email-error full-width flex-start hide"></div>
        
                    <div class="input flex-start full-width relative">
        
                        <label class="flex-start absolute">Password</label>
                        <i class="fa fa-envelope flex-start small"></i>
                        {{-- <input type="password" class="password form1-input" name="password" autocompelete="off"> --}}
                        <input type="password" class="password form2-input hide" name="password" placeholder="Password" autocompelete="off">
        
                    </div>
                    <div class="error password-error full-width flex-start hide"></div>
        
                    <input type="submit" name="register" value="Log In">
        
                    <div class="login-faild full-width flex-start hide error align-start">
                    <i class="fa fa-warning"></i> You entered the wrong credentials. Please ensure that your login/password is correct.
                    </div>
        
                </form>
        
                <div class="api-form flex-column full-width">
        
                    <p class="full-width flex"> <span>or use a social account</span> </p>
        
                    <div class="full-width flex-space links">
        
                        <a href="/login" class="facebook-api flex"> <img src="static/image/public/facebook.png"> </a>
                        <a href="/login" class="google-api flex"> <img src="static/image/public/google.png"> </a>
                        <a href="/login" class="github-api flex"> <img src="static/image/public/github.png"> </a>
        
                    </div>
        
                </div>
        
                <div class="forget flex-column full-width">
        
                    <p class="full-width flex-start"> Find your account &nbsp; <a href="/change-password"> Forgot Your Password ? </a> </p>
        
                    <p class="full-width flex-start"> Don't have an account ? &nbsp; <a href="/register"> Create an Account</a> </p>
        
                </div>
        
                <div class="warn relative full-width flex">
                    <span class="absolute">RISK WARNING:</span>
                    <p>
                        All trading involves risk. Only risk capital you're prepared to lose. capital you're prepared to lose
                        All trading involves risk.
                    </p>
                </div>
        
            </div>
        
            <div class="loader login-loader flex hide absolute">  <div class="load"></div> </div>

        </main>

    </div>

    <div class="full-width flex-column scroll-bar">
            
        <main class="flex-space">
    
            <ul class="pages flex">
                
                <a href="/">Home</a>
                
                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Login</a>
                
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