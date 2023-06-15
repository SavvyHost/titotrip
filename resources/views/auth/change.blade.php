@extends('base')
@section("title", "Emotours | Password Recovery")
@section("content")
    
    <div class="flex full-width">
        
        <main class="flex-column relative">

            @if ( $status )

                <div class="reset-form flex-column form2 login-form register-form">

                    <div class="image"> <img src="static/image/public/log.png"> </div>

                    <form class="flex-column full-width">

                        <h1> Password Recovery </h1>

                        <div class="input flex-start full-width relative">

                            <label class="flex-start absolute">New Password</label>
                            <i class="fa fa-user flex-start"></i>
                            {{-- <input type="password" class="password1 form1-input" name="password1" autocompelete="off"> --}}
                            <input type="password" class="password1 form2-input hide" name="password1" placeholder="New Password" autocompelete="off">

                        </div>
                        <div class="error password1-error full-width flex-start hide"></div>

                        <div class="input flex-start full-width relative">

                            <label class="flex-start absolute">Confirm Password</label>
                            <i class="fa fa-user flex-start"></i>
                            {{-- <input type="password" class="password2 form1-input" name="password2" autocompelete="off"> --}}
                            <input type="password" class="password2 form2-input hide" name="password2" placeholder="Confirm Password" autocompelete="off">

                        </div>
                        <div class="error password2-error full-width flex-start hide"></div>

                        <input type="submit" name="recovery" value="Submit">

                        <div class="recovery-faild full-width flex-start error align-start hide">
                            <i class="fa fa-warning"></i>
                        </div>

                    </form>

                </div>
            
            @else

                <div class="reset-form faild recovery flex-column">
                        
                    <div class="image"> <img src="static/image/public/log.png"> </div>

                    <form class="flex-column full-width">

                        <h1> Password Recovery </h1>

                        <div class="resend full-width flex-column">

                            <p class="circle flex"> <i class="fa fa-exclamation"></i> </p>

                            <span class="resend">The code is not correct !</span>

                        </div>

                        <a href="/login" class="pointer full-width flex back"> Back to Log In</a>

                    </form>

                </div>

            @endif

            <div class="reset-form success recovery flex-column hide">
                            
                <div class="image"> <img src="static/image/public/log.png"> </div>

                <form class="flex-column full-width">

                    <h1> Password Recovery </h1>

                    <div class="resend full-width flex-column">

                        <p class="circle flex green"> <i class="fa fa-check"></i> </p>

                        <span class="resend green"> The Password Change Successfully </span>

                    </div>

                    <a href="/login" class="pointer full-width flex back"> Back to Log In</a>

                </form>

            </div>

            <div class="loader login-loader flex hide absolute"> <div class="load"></div> </div>

        </main>

    </div>

    <div class="full-width flex-column scroll-bar">
            
        <main class="flex-space">
    
            <ul class="pages flex">
                
                <a href="/">Home</a>
                
                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Reset Password</a>
                
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