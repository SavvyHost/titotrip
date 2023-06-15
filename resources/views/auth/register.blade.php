@extends('base')
@section("title", "Register")
@section("content")
    
    <div class="flex full-width">
        
        <main class="flex-column relative">

            <div class="login-form register-form flex-column form2 signup-form">

                <div class="image"> <img src="static/image/public/log.png"> </div>
    
                <form class="flex-column full-width">
    
                    <h1> Sign Up </h1>
    
                    <p> Create an Account Blow with your email. </p>
    
                    <div class="input flex-start full-width relative">
    
                        <label class="flex-start absolute">User Name</label>
                        <i class="fa fa-user flex-start"></i>
                        {{-- <input type="text" name="username" class="username form1-input" autocompelete="off"> --}}
                        <input type="text" name="username" class="username form2-input" placeholder="Username" autocompelete="off">
    
                    </div>
                    <div class="error username-error full-width flex-start hide"></div>
    
                    <div class="input flex-start full-width relative">
    
                        <label class="flex-start absolute">E-mail</label>
                        <i class="fa fa-envelope flex-start small"></i>
                        {{-- <input type="email" name="email" class="email form1-input" autocompelete="off"> --}}
                        <input type="email" name="email" class="email form2-input" placeholder="E-mail" autocompelete="off">
    
                    </div>
                    <div class="error email-error full-width flex-start hide"></div>
    
                    <div class="input flex-start full-width relative">
    
                        <label class="flex-start absolute">Password</label>
                        <i class="fa fa-envelope flex-start small"></i>
                        {{-- <input type="password" name="password" class="password form1-input" autocompelete="off"> --}}
                        <input type="password" name="password" class="password form2-input" placeholder="Password" autocompelete="off">
    
                    </div>
                    <div class="error password-error full-width flex-start hide"></div>
    
                    <input type="submit" name="register" value="Create Account">
    
                    <div class="register-faild full-width flex-start error hide">
                       <i class="fa fa-warning"></i> Sorry, Somthing went wrong ...  Try Again Late !
                    </div>
    
                </form>
    
                <div class="api-form flex-column full-width">
        
                    <p class="full-width flex"> <span>or use a social account</span> </p>
        
                    <div class="full-width flex-space links">
        
                        <a href="/register" class="facebook-api flex"> <img src="static/image/public/facebook.png"> </a>
                        <a href="/register" class="google-api flex"> <img src="static/image/public/google.png"> </a>
                        <a href="/register" class="github-api flex"> <img src="static/image/public/github.png"> </a>
        
                    </div>
        
                </div>
    
                <div class="forget flex-start full-width">
    
                    <p class="full-width flex-start"> Already have an Account ? &nbsp; <a href="/login"> Log In from here</a> </p>
    
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

                <a class="no-hover">Register</a>
                
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