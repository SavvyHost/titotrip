@extends('base')
@section("title", "404 Not Founded")
@section("content")

    <main class="flex-column help default">

        <div class="error-page flex">

            <div class="full-width flex-space">

                <div class="image flex">
                    <img src="static/image/public/404.png">
                </div>
    
                <div class="flex-column full-width">
                    <h1>Oops...</h1>
                    <p>
                        We can't find that page. <br>
                        Let's get you back on the right track. <br>
                        Try another search, or click below.
                    </p>
                    <div class="full-width flex-start">
                        <a href="/">Take me home</a>
                    </div>
                </div>

            </div>

        </div>

    </main>

    <div class="full-width flex-column scroll-bar">
            
        <main class="flex-space">
    
            <ul class="pages flex">
                
                <a href="/">Home</a>
                
                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Help</a>
                
            </ul>
    
            <ul class="scroll-up flex">
                
                <span> Scroll to Top </span>
    
                <i class="fa fa-angle-up circle go-up pointer flex"></i>
    
            </ul>
            
        </main>
    
    </div>

    <script>
        $("header, .scroll-bar").remove();
    </script>
@endsection