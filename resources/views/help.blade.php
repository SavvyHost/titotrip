@extends('base')
@section('title', 'Help Center')
@section('content')

    <main class="flex-column help default">

        <br><br> Help Center ! <br> <br> <br>

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

    <script src="static/js/custom/help.js"></script>
    <script>
        $(".nav-side .side .help0").addClass("active");
    </script>
@endsection