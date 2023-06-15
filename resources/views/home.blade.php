@extends('base')
@section('title', 'MemnonTravel')
@section('content')

    <main>

        <div class="main flex-column">

            <div class="title"> Recently Viewed </div>

            <ul class="full-width feat2 flex">
                <div class="home-tour-slider home-slider full-width flex">

                    <div class="swiper-wrapper full-width">

                        @foreach ($recently_tours as $tour)
                            <a href="/tour?id={{ $tour->id }}" data-id="{{ $tour->id }}"
                                class="flex-column relative swiper-slide active tour-card">

                                <div class="image full-width flex"> <img src="{{ explode(',', $tour->images)[0] }}">

                                    {{-- <div class=" badge-dic absolute">50% OFF</div>
                                    <div class=" badge-note absolute">Family Advanture</div> --}}

                                </div>

                                <p class="full-width flex-start"> <i class="fa fa-globe"></i>
                                    <span>{{ $tour->location }}</span>
                                </p>

                                <h1 class="full-width">{{ $tour->title }}</h1>

                                <div class="replys flex-start full-width">

                                    <div class="stars" id="5"></div>

                                    <span class="flex">{{ $tour->reviews }}</span>

                                </div>

                                <p class="full-width flex-start p"> from <span class="bold">
                                        ${{ round($tour->price, 2) }}</span> </p>
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
        <div class="hr no-select">
            <p> <span>Why you are seeing these <a>last Viewed</a></span> </p>
        </div>

    </main>

    <main>

        <div class="main flex-column">

            <div class="title"> Why book with MemnonTravel ? </div>

            <div class="full-width flex feat1 wy1">

                <ul class="flex-space full-width">

                    <li class="flex-column">

                        <img src="static/image/home/1.svg">

                        <h1 class="full-width flex">Ultimate flexibility</h1>

                        <p class="full-width flex">
                            You're in control, with free cancellation to satisfy any plan or budget.
                        </p>

                    </li>

                    <li class="flex-column">

                        <img src="static/image/home/4.svg">

                        <h1 class="full-width flex">Memorable experiences</h1>

                        <p class="full-width flex">
                            Browse and book tours and activities so incredible, you'll want to tell your friends.
                        </p>

                    </li>

                    <li class="flex-column">

                        <img src="static/image/home/2.svg">

                        <h1 class="full-width flex">Quality at our core</h1>

                        <p class="full-width flex">
                            High quality standards. Millions of reviews. A Tripadvisor company.
                        </p>

                    </li>

                    <li class="flex-column">

                        <img src="static/image/home/3.svg">

                        <h1 class="full-width flex">Award-winning support</h1>

                        <p class="full-width flex">
                            New price? New plan? No problem. We're here to help, 24/7. We're here to help
                        </p>

                    </li>

                </ul>

            </div>

            <div class="feat1 flex full-width over-hide hide wy2">

                <div class="swiper-featured full-width flex">

                    <ul class="swiper-wrapper full-width">

                        <li class="flex-column swiper-slide">

                            <img src="static/image/home/1.svg">

                            <h1 class="full-width flex">Ultimate flexibility</h1>

                            <p class="full-width flex">
                                You're in control, with free cancellation and payment options to satisfy any plan or
                                budget.
                            </p>

                        </li>

                        <li class="flex-column swiper-slide">

                            <img src="static/image/home/4.svg">

                            <h1 class="full-width flex">Memorable experiences</h1>

                            <p class="full-width flex">
                                Browse and book tours and activities so incredible, you'll want to tell your friends.
                            </p>

                        </li>

                        <li class="flex-column swiper-slide">

                            <img src="static/image/home/2.svg">

                            <h1 class="full-width flex">Quality at our core</h1>

                            <p class="full-width flex">
                                High quality standards. Millions of reviews. A Tripadvisor company.
                            </p>

                        </li>

                        <li class="flex-column swiper-slide">

                            <img src="static/image/home/3.svg">

                            <h1 class="full-width flex">Award-winning support</h1>

                            <p class="full-width flex">
                                New price? New plan? No problem. We're here to help, 24/7. We're here to help
                            </p>

                        </li>

                        <li class="flex-column swiper-slide">

                            <img src="static/image/home/3.svg">

                            <h1 class="full-width flex">Award-winning support</h1>

                            <p class="full-width flex">
                                New price? New plan? No problem. We're here to help, 24/7. We're here to help
                            </p>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

        <div class="main flex-column">

            <div class="title"> Recommended Packages </div>

            <ul class="full-width feat2 flex">

                <div class="home-tour-slider home-slider full-width flex">

                    <div class="swiper-wrapper full-width">

                        @foreach ($recommend_tours as $tour)
                            <a href="/tour?id={{ $tour->id }}" data-id="{{ $tour->id }}"
                                class="flex-column relative swiper-slide active tour-card">

                                <div class="image full-width flex"> <img src="{{ explode(',', $tour->images)[0] }}"> </div>

                                <p class="full-width flex-start"> <i class="fa fa-globe"></i>
                                    <span>{{ $tour->location }}</span>
                                </p>

                                <h1 class="full-width">{{ $tour->title }}</h1>

                                <div class="replys flex-start full-width">

                                    <div class="stars" id="5"></div>

                                    <span class="flex">{{ $tour->reviews }}</span>

                                </div>

                                <p class="full-width flex-start p"> from <span class="bold">
                                        ${{ round($tour->price, 2) }}</span> </p>
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

        <div class="free-feat full-width flex">

            <main class="flex">

                <div class="main flex-column">

                    <h1>Keep things flexible responsive</h1>

                    <p>Use Reserve Now & Pay Later to secure the activities you don't want to miss without being locked in.
                    </p>

                </div>

            </main>

        </div>

        <div class="main flex-column">

            <div class="title"> Top Destinations </div>

            <div class="feat3 flex-column full-width">

                <ul class="flex-space full-width">

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/1.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Cairo </p>
                            </div>

                        </div>

                    </a>

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/2.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Giza </p>
                            </div>

                        </div>

                    </a>

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/3.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Alxendria </p>
                            </div>

                        </div>

                    </a>

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/4.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Aswan </p>
                            </div>

                        </div>

                    </a>

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/5.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Abu simbel </p>
                            </div>

                        </div>

                    </a>

                </ul>

                <ul class="flex-space full-width">

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/6.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Museum </p>
                            </div>

                        </div>

                    </a>

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/7.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Siwa </p>
                            </div>

                        </div>

                    </a>

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/8.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Catherine </p>
                            </div>

                        </div>

                    </a>

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/9.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Sinai </p>
                            </div>

                        </div>

                    </a>

                    <a href="/destination?loc=cairo" class="flex">

                        <div class="image full-width full-height flex relative">

                            <img src="static/image/tour/2023/01/21/10.png">

                            <div class="info absolute flex full-width full-height">
                                <p> Abydos </p>
                            </div>

                        </div>

                    </a>

                </ul>

            </div>

        </div>

        <div class="main flex-column attractions">

            <div class="title"> Top attractions </div>

            <ul class="flex-wrap full-width feat5">

                <li class="flex">
                    <a href="/attraction?atr=pyramids" class="full-width flex-start relative align-start">

                        <img src="static/image/tour/2023/01/21/1.png">

                        <div class="flex-column full-width full-height">

                            <p> Giza Payramids </p>

                            <span> 4.467 Tours and activities </span>

                        </div>

                    </a>
                </li>
                <li class="flex">
                    <a href="/attraction?atr=pyramids" class="full-width flex-start relative align-start">

                        <img src="static/image/tour/2023/01/21/2.png">

                        <div class="flex-column full-width full-height">

                            <p> Giza Payramids </p>

                            <span> 4.467 Tours and activities </span>

                        </div>

                    </a>
                </li>
                <li class="flex">
                    <a href="/attraction?atr=pyramids" class="full-width flex-start relative align-start">

                        <img src="static/image/tour/2023/01/21/3.png">

                        <div class="flex-column full-width full-height">

                            <p> Giza Payramids </p>

                            <span> 4.467 Tours and activities </span>

                        </div>

                    </a>
                </li>
                <li class="flex">
                    <a href="/attraction?atr=pyramids" class="full-width flex-start relative align-start">

                        <img src="static/image/tour/2023/01/21/4.png">

                        <div class="flex-column full-width full-height">

                            <p> Giza Payramids </p>

                            <span> 4.467 Tours and activities </span>

                        </div>

                    </a>
                </li>
                <li class="flex">
                    <a href="/attraction?atr=pyramids" class="full-width flex-start relative align-start">

                        <img src="static/image/tour/2023/01/21/5.png">

                        <div class="flex-column full-width full-height">

                            <p> Giza Payramids </p>

                            <span> 4.467 Tours and activities </span>

                        </div>

                    </a>
                </li>
                <li class="flex">
                    <a href="/attraction?atr=pyramids" class="full-width flex-start relative align-start">

                        <img src="static/image/tour/2023/01/21/6.png">

                        <div class="flex-column full-width full-height">

                            <p> Giza Payramids </p>

                            <span> 4.467 Tours and activities </span>

                        </div>

                    </a>
                </li>
                <li class="flex">
                    <a href="/attraction?atr=pyramids" class="full-width flex-start relative align-start">

                        <img src="static/image/tour/2023/01/21/7.png">

                        <div class="flex-column full-width full-height">

                            <p> Giza Payramids </p>

                            <span> 4.467 Tours and activities </span>

                        </div>

                    </a>
                </li>
                <li class="flex">
                    <a href="/attraction?atr=pyramids" class="full-width flex-start relative align-start">

                        <img src="static/image/tour/2023/01/21/8.png">

                        <div class="flex-column full-width full-height">

                            <p> Giza Payramids </p>

                            <span> 4.467 Tours and activities </span>

                        </div>

                    </a>
                </li>
                <li class="flex">
                    <a href="/attraction?atr=pyramids" class="full-width flex-start relative align-start">

                        <img src="static/image/tour/2023/01/21/9.png">

                        <div class="flex-column full-width full-height">

                            <p> Giza Payramids </p>

                            <span> 4.467 Tours and activities </span>

                        </div>

                    </a>
                </li>

            </ul>

            <div class="buttons full-width flex">
                <a href="/attraction?atr=pyramids&recet=all">See all attractions</a>
            </div>

        </div>
    </main>

    <div class="free-feat full-width flex">

        <main class="flex">

            <div class="main flex-column">

                <h1>Free <br> cancellatione</h1>

                <p>You'll receive a full refund if you cancel <br> at least 24 hours in advance <br> of most experiences.
                </p>

            </div>
        </main>
    </div>

    <main>

        <div class="main flex-column">

            <div class="title"> Based on your location </div>

            <ul class="full-width feat2 flex">

                <div class="home-tour-slider home-slider full-width flex">

                    <div class="swiper-wrapper full-width">

                        @foreach ($based_tours as $tour)
                            <a href="/tour?id={{ $tour->id }}" data-id="{{ $tour->id }}"
                                class="flex-column relative swiper-slide active tour-card">

                                <div class="image full-width flex"> <img src="{{ explode(',', $tour->images)[0] }}">
                                </div>

                                <p class="full-width flex-start"> <i class="fa fa-globe"></i>
                                    <span>{{ $tour->location }}</span>
                                </p>

                                <h1 class="full-width">{{ $tour->title }}</h1>

                                <div class="replys flex-start full-width">

                                    <div class="stars" id="5"></div>

                                    <span class="flex">{{ $tour->reviews }}</span>

                                </div>

                                <p class="full-width flex-start p"> from <span class="bold">
                                        ${{ round($tour->price, 2) }}</span> </p>
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

        <div class="main flex-column sml-mr">

            <div class="title head1"> Popular Cities </div>

            <ul class="flex-start full-width feat4">

                <li class="flex"> <a href="/">Things to do in Cairo</a> </li>
                <li class="flex"> <a href="/">Things to do in Giza</a> </li>
                <li class="flex"> <a href="/">Things to do in Alxendria</a> </li>
                <li class="flex"> <a href="/">Things to do in Aswan</a> </li>
                <li class="flex"> <a href="/">Things to do in Abu simbel</a> </li>
                <li class="flex"> <a href="/">Things to do in Egyption museum</a> </li>
                <li class="flex"> <a href="/">Things to do in Sant catherine</a> </li>
                <li class="flex"> <a href="/">Things to do in Siwa</a> </li>
                <li class="flex"> <a href="/">Things to do in Sinai</a> </li>
                <li class="flex"> <a href="/">Things to do in Abydos</a> </li>
                <li class="flex"> <a href="/">Things to do in Siwa Oasis</a> </li>

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

                <a class="no-hover">Home</a>

            </ul>

            <ul class="scroll-up flex">

                <span> Scroll to Top </span>

                <i class="fa fa-angle-up circle go-up pointer flex"></i>

            </ul>

        </main>

    </div>

    <script>
        $("nav .search-div").remove();
        $(".nav-side .side .home0").addClass("active");
    </script>

@endsection
