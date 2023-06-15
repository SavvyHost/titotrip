@extends('base')
@section("title", "Bookings")
@section("content")

    <main class="flex-column relative bookings">

        <div class="head full-width flex-column">
            <h1 class="full-width flex-start">
                <span class="material-symbols-outlined go-icon">credit_card</span>
                All bookings
            </h1>
        </div>

        <div class="table">

            <table>

                <tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Password</th>
                    <th>Register Date</th>
                    <th>IP</th>
                </tr>

            </table>

        </div>

        <div class="lets full-width flex-column relative">

            <h1 class="full-width left-text">Let's design your holidays,&nbsp;
                <span>{{ Session::get("user")->username }}</span> 
                !
            </h1>

            <p class="full-width flex-start">See personalised recommendations based on the things.</p>

            <div class="buttons flex-start full-width">
                <a href="/">See More</a>
            </div>

            <img src="static/image/public/booking.png" class="absolute">

        </div>

        <div class="main flex-column full-width no-border">
    
            <h1 class="title full-width flex-start"> Recommended </h1>

            <ul class="full-width feat2 flex">

                <div class="home-tour-slider home-slider full-width flex">

                    <div class="swiper-wrapper full-width">
            
                        @foreach( $recommend_tours as $tour )

                            <a href="/tour?id={{$tour->id}}" data-id="{{$tour->id}}" class="flex-column relative swiper-slide active tour-card">
            
                                <div class="image full-width flex"> <img src="{{explode(",", $tour->images)[0]}}"> </div>
                
                                <p class="full-width flex-start"> <i class="fa fa-globe"></i> <span>{{$tour->location}}</span> </p>
                
                                <h1 class="full-width">{{$tour->title}}</h1>
                
                                <div class="replys flex-start full-width">
                
                                    <div class="stars" id="5"></div>
            
                                    <span class="flex">{{$tour->reviews}}</span>

                                </div>
                
                                <p class="full-width flex-start p"> from <span class="bold"> ${{round($tour->price, 2)}}</span> </p>
                                <p class="full-width flex-start p"> Price varies by group size </p>
                
                                <div class="favor absolute flex pointer circle add"><i class="fa fa-heart-o"></i></div>
                                <div class="favor absolute flex pointer circle del hide"><i class="fa fa-heart"></i></div>
                
                            </a>

                        @endforeach

                    </div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
            
                </div>

            </ul>

        </div>

    </main>

    <div class="full-width flex-column scroll-bar">
            
        <main class="flex-space">
    
            <ul class="pages flex">
                
                <a href="/">Home</a>
                
                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Bookings</a>
                
            </ul>
    
            <ul class="scroll-up flex">
                
                <span> Scroll to Top </span>
    
                <i class="fa fa-angle-up circle go-up pointer flex"></i>
    
            </ul>
            
        </main>
    
    </div>

    <script src="static/js/custom/bookings.js"></script>
    <script>
        $("header").remove();
        $(".nav-side .side .booking0").addClass("active");
    </script>

@endsection