@extends('base')
@section("title", "Top Destination | Cairo")
@section("content")

    <header class="se_header relative">

        <div class="header-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide image"><img src="static/image/header/1.png"></div>

            </div>

        </div>

        <div class="name absolute full-width full-height flex">
            <h1>Cairo</h1>
        </div>

    </header>

    <main class="loc">

        <div class="main flex-column">

            <div class="title heading"> The Third Coast's cairo city </div>
    
            <div class="flex full-width flex-start left-text descibe">

                Located along the shores of Lake Michigan, Chicago—the largest city in Illinois and the third largest in the United 
                States—offers a wealth of art, music, historical, and architectural experiences. Culture lovers can stroll through
                Millennium Park and the Loop to view outdoor art (including the iconic “Bean”), tour world-class museums such as 
                the Art Institute of Chicago, or cruise the Chicago River to see modern landmark gems. To meet the locals, buy a 
                ticket for a ball game; catch some live blues or jazz. at a club; or laugh at the comedy acts at Second City.

            </div>

        </div>

        <div class="hr no-select">
            <p> <span>Why you are seeing these <a>these recommendations</a></span> </p>
        </div>

    </main>

    <div class="destination full-width loc">

        <main>

            <div class="main flex-column">
    
                <div class="title full-width flex-start"> Top 15 attractions in &nbsp; <span> " Cairo "</span> </div>
    
                <ul class="full-width feat2 flex">
    
                    <div class="home-slider full-width flex">
    
                        <div class="swiper-wrapper full-width flex-wrap">
                
                            @foreach( $attractions as $tour )
    
                                <a href="/attraction?atr=cairo-pyramids" data-id="{{$tour->id}}" class="flex-column loc-card relative swiper-slide active tour-card">
                
                                    <div class="image full-width flex"> <img src="{{explode(",", $tour->images)[0]}}"> </div>
                    
                                    <h1 class="full-width">{{$tour->title}}</h1>
                    
                                    <div class="replys flex-start full-width">
                    
                                        <div class="stars" id="5"></div>
                
                                        <span class="flex">{{$tour->reviews}}</span>
    
                                    </div>
                    
                                    <p class="full-width flex-start p left-text">
                                        Once the world's tallest building, Willis Tower is still way up in the clouds. 
                                        Though it functions as an office building, the skyscraper's 103rd-floor
                                    </p>
                    
                                </a>
                                
                            @endforeach
        
                        </div>
    
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
    
                    </div>
    
                </ul>
    
            </div>

            <div class="buttons full-width flex">
                <button class="more">See more attractions</button>
            </div>

        </main>

    </div>

    <main>
    
        <div class="main flex-column">
    
            <div class="title full-width flex-start"> Recently viewed </div>

            <ul class="full-width feat2 flex">

                <div class="home-tour-slider home-slider full-width flex">

                    <div class="swiper-wrapper full-width">
            
                        @foreach( $attractions as $tour )

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

        <div class="main flex-column sml-mr1">
    
            <div class="title head1"> Popular Attractions </div>
    
            <ul class="flex-start full-width feat4">
    
                <li class="flex"> <a href="/">Things to do in Cairo</a> </li>
                <li class="flex"> <a href="/">Things to do in Giza</a> </li>
                <li class="flex"> <a href="/">Things to do in Alxendria</a> </li>
                <li class="flex"> <a href="/">Things to do in Aswan</a> </li>
                <li class="flex"> <a href="/">Things to do in Abu simbel</a> </li>
                <li class="flex"> <a href="/">Things to do in Egyption museum</a> </li>
                <li class="flex"> <a href="/">Things to do in Sant catherine</a> </li>
                <li class="flex"> <a href="/">Things to do in Siwa</a> </li>
                <li class="flex"> <a href="/">Things to do in Giza</a> </li>
                <li class="flex"> <a href="/">Things to do in Sinai</a> </li>
                <li class="flex"> <a href="/">Things to do in Sant catherine</a> </li>
                <li class="flex"> <a href="/">Things to do in Abydos</a> </li>
                <li class="flex"> <a href="/">Things to do in Siwa Oasis</a> </li>
                <li class="flex"> <a href="/">Things to do in Sinai</a> </li>
                <li class="flex"> <a href="/">Things to do in Abu simbel</a> </li>
                <li class="flex"> <a href="/">Things to do in Siwa Oasis</a> </li>
    
            </ul>
    
        </div>
        
    </main>

    <div class="full-width flex-column scroll-bar">
            
        <main class="flex-space">
    
            <ul class="pages flex">
                
                <a href="/">Home</a>

                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Destinations</a>
                
            </ul>
    
            <ul class="scroll-up flex">
                
                <span> Scroll to Top </span>
    
                <i class="fa fa-angle-up circle go-up pointer flex"></i>
    
            </ul>
            
        </main>
    
    </div>

    <script src="static/js/custom/loc_atr.js"></script>
@endsection