@extends('base')
@section("title", "Wishlist")
@section("content")

    <main class="flex wishlist relative">

        <div class="flex-column full-width all-cards hide">
    
            <div class="title full-width flex-start">
                <p class="full-width flex-start">My Wishlist</p>
                <p class="full-width flex-start">Your list of tours and activities that you saved for your travel research</p>
            </div>

            <div class="list-wishlist full-width flex-wrap flex-space"></div>

        </div>

        <div class="empty full-width flex-column">

            <div class="full-width flex image"> <img src="static/image/public/wish.svg"> </div>

            <div class="full-width flex-column info">

                <p> Your wishlist is empty </p>
                <span> The world is waiting for you. Fill up on amazing things to do <br> from Paris to Sydney. </span>
                <a href="/">Continue Shopping</a>

            </div>

        </div>

        <div class="loader absolute flex full-width full-heigth"><div class="load"></div></div>

    </main>

    <div class="full-width flex-column scroll-bar">
            
        <main class="flex-space">
    
            <ul class="pages flex">
                
                <a href="/">Home</a>
                
                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Wishlist</a>
                
            </ul>
    
            <ul class="scroll-up flex">
                
                <span> Scroll to Top </span>
    
                <i class="fa fa-angle-up circle go-up pointer flex"></i>
    
            </ul>
            
        </main>
    
    </div>

    <script>
        $("header").remove();
        $(".nav-side .side .wishlist0").addClass("active");
    </script>

@endsection