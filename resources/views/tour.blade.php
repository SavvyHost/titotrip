@extends('base')
@section('title', 'MemnonTravel Packages')
@section('content')

    <div class="sub-nav full-width flex hide">
        <main class="flex-space full-height">
            <a id="overview" class="active">Overview</a>
            <a id="included">What's included</a>
            <a id="expect">What to expect</a>
            <a id="policy">Cancellation Policy</a>
            <a id="traveller">Travellar photots</a>
            <a id="reviews">Reviews</a>
        </main>
    </div>

    <main class="flex-column tour">

        <div class="keys full-width flex-space flex-wrap align-start">

            <div class="keywords">

                <a href="/tour">Home</a>
                <a href="/tour">Things to do in Ethiopia</a>
                <a href="/tour">Things to do in Addis Ababa</a>
                <a href="/tour">Addis Ababa Tours</a>
                <a href="/tour">Tours, Sightseeing & Cruises</a>

            </div>

            <div class="contact flex-column">

                <div class="phone flex-start full-width">
                    <i class="fa fa-phone"></i>
                    <p class="default">Book online or call: <span class="pointer phone-number">+20 999 999 999</span> </p>
                </div>

                <div class="message flex-start full-width">
                    <i class="fa fa-comment"></i>
                    <span class="chat pointer">Chat Now</span>
                </div>

            </div>

        </div>

        <div class="offer-label full-width flex-start no-select hide">
            <p>Reserve & Pay Later</p>
        </div>

        <div class="title full-width flex-start">{{ $tours->title }}</div>

        <div class="actions full-width flex-space">

            <div class="replys flex-start pointer to-reviews">

                <div class="stars" id="5"></div>

                <span>{{ $tours->reviews }} Reviews</span>

            </div>

            <div class="add-wishlist flex-end pointer favor add">

                <i class="fa fa-heart-o"></i>

                <span>Save to Wishlist</span>

            </div>

            <div class="add-wishlist flex-end pointer favor del hide">

                <i class="fa fa-heart"></i>

                <span>Saved</span>

            </div>

        </div>

        <div class="show flex-space full-width">

            <div class="slider">

                <div class="left tour-pagination"></div>

                <div class="right tour-slider-div">

                    <div class="swiper-wrapper" data-count="5">

                        @foreach (explode(',', $tours->images) as $image)
                            <div class="image swiper-slide"><img src="{{ $image }}"></div>
                        @endforeach

                    </div>

                    <div class="swiper-button-next active"></div>
                    <div class="swiper-button-prev active"></div>

                </div>

            </div>

            <div class="check flex-column">

                <div class="price full-width flex-start"> From <span>${{ round($tours->price, 2) }}</span> </div>
                <span class="full-width flex-start">Price varies by group size</span>
                <hr class="full-width flex">
                <h1 class="full-width flex-start">Select Date and Travelers</h1>
                <div class="inputs full-width flex-start">
                    <div class="input pointer full-width flex-start date-input show-calendar">
                        <i class="fa fa-calendar"></i>
                        <p class="full-width flex-start"></p>
                    </div>
                    <div class="input pointer full-width flex-start number-input show-adult">
                        <i class="fa fa-users"></i>
                        <p class="full-width flex-start">2 Adults</p>
                    </div>
                    <div class="button full-width flex">
                        <button class="full-width pointer check-availability">Check Availability</button>
                    </div>
                </div>
                <p class="full-width flex-start tell">- Reserve Now & Pay Later</p>
                <p class="full-width flex-start tell">
                    <span class="full-width flex-start">Secure your spot while staying flexible.</span>
                </p>
                <p class="full-width flex-start tell">- Free cancellation</p>
                <p class="full-width flex-start tell">
                    <span class="full-width flex-start">Up to 24 hours in advance.</span>
                </p>
                <div class="adult absolute flex-column hide">
                    <h6 class="full-width flex-start">You can select up to 14 travelers in total.</h6>
                    <div class="flex-space full-width">
                        <div class="flex-column full-width">
                            <p class="full-width flex-start">Adult(15-80)</p>
                            <p class="full-width flex-start">Minimum: 0, Maximum: 14</p>
                        </div>
                        <div class="input-num flex no-select">
                            <div class="decrease flex pointer">
                                <span class="material-symbols-outlined go-icon">remove</span>
                            </div>
                            <label class="flex">2</label>
                            <div class="increase flex pointer">
                                <span class="material-symbols-outlined go-icon">add</span>
                            </div>
                        </div>
                    </div>
                    <button class="apply">Apply</button>
                </div>

            </div>

        </div>

        <div class="availability full-width flex relative hide">

            <ul class="list flex-column full-width hide">

                <li class="full-width flex-space align-start">

                    <div class="flex-column full-width">
                        <h1 class="full-width flex-start left-text">Addis Ababa Guided City Tour With Airport & Hotel Pick
                            Up</h1>
                        <p class="full-width flex-start left-text">Pickup included</p>
                        <div class="times full-width flex-wrap flex-start">
                            <div class="time-div flex pointer no-select"> <span>12:00 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>12:30 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>3:00 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>7:00 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>7:30 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>8:00 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>8:30 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>9:00 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>9:30 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>10:00 AM</span> </div>
                            <div class="time-div flex pointer no-select active"> <span>10:30 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>11:00 AM</span> </div>
                            <div class="time-div flex pointer no-select"> <span>11:30 AM</span> </div>
                        </div>
                    </div>

                    <div class="flex-column">
                        <div class="full-width flex-end prices">
                            <h1 class="price">$178.00</h1>
                            <p class="adults">2 Adults x $89.00</p>
                        </div>
                        <div class="buttons full-width flex-column">
                            <button class="pay-later flex pointer">Pay Later</button>
                            <button class="book-now flex pointer">Book Now</button>
                        </div>
                    </div>

                </li>

            </ul>

            <div class="loader full-width flex">
                <div class="load"></div>
            </div>

        </div>

        <div class="info-data flex-start align-start full-width">

            <div class="left flex-column">

                <div class="flex-column full-width section">

                    <div class="first full-width flex-space pointer">

                        <h1 class="full-width flex-start">Addis Ababa Tours</h1>

                        <i class="fa fa-angle-down"></i>

                    </div>

                    <ul class="full-width flex-column">

                        <a href="/tour" class="pointer">All Addis Ababa Tours</a>
                        <a href="/tour" class="pointer">Art & Culture</a>
                        <a href="/tour" class="pointer">Audio Guides</a>
                        <a href="/tour" class="pointer">Classes & Workshops</a>
                        <a href="/tour" class="pointer">Food & Drink</a>
                        <a href="/tour" class="pointer">Outdoor Activities</a>

                    </ul>

                </div>

                <div class="flex-column full-width section">

                    <div class="first full-width flex-space pointer">

                        <h1 class="full-width flex-start">Attractions</h1>

                        <i class="fa fa-angle-down"></i>

                    </div>

                    <ul class="full-width flex-column">

                        <a href="/tour" class="pointer">All Addis Ababa Tours</a>
                        <a href="/tour" class="pointer">Art & Culture</a>
                        <a href="/tour" class="pointer">Audio Guides</a>
                    </ul>

                </div>

                <div class="flex-column full-width section">

                    <div class="first full-width flex-space pointer">

                        <h1 class="full-width flex-start">Recommendations</h1>

                        <i class="fa fa-angle-down"></i>

                    </div>

                    <ul class="full-width flex-column">

                        <a href="/tour" class="pointer">All Addis Ababa Tours</a>
                        <a href="/tour" class="pointer">Art & Culture</a>
                        <a href="/tour" class="pointer">Audio Guides</a>
                    </ul>

                </div>

                <div class="flex-column full-width section no-border">

                    <div class="first full-width flex-space pointer no-border">

                        <h1 class="full-width flex-start">Nearby</h1>

                        <i class="fa fa-angle-down"></i>

                    </div>

                    <ul class="full-width flex-column">

                        <a href="/tour" class="pointer">All Addis Ababa Tours</a>
                        <a href="/tour" class="pointer">Art & Culture</a>
                        <a href="/tour" class="pointer">Audio Guides</a>
                    </ul>

                </div>

            </div>

            <div class="right flex-column">

                <div class="offers flex-space full-width">

                    <p class="flex-start"> <i class="fa fa-shield"></i> <span> Safety measures </span> </p>
                    <p class="flex-start"> <i class="fa fa-clock-o"></i> <span> 7 to 8 hours (approx.) </span> </p>
                    <p class="flex-start"> <i class="fa fa-car"></i> <span> Hotel pickup offered </span> </p>
                    <p class="flex-start"> <i class="fa fa-mobile big"></i> <span> Mobile ticket </span> </p>
                    <p class="flex-start"> <i class="fa fa-mobile big"></i> <span> Mobile ticket </span> </p>

                </div>

                <div class="overview full-width flex-column" id="overview">

                    <h1 class="full-width flex-start">Overview</h1>

                    <div class="data full-with flex-column">

                        <p class="full-width flex-start">
                            Between chaotic traffic and a sprawling layout, navigating Addis Ababa can be intimidating, but
                            exploring with a personal driver and guide takes the stress out of experiencing Ethiopia's
                            must-see capital. From a scenic viewpoint atop Mount Entoto to a Second World War site, the
                            Addis
                            Ababa Museum, and the vast Merkato, this full-day private tour is a curated introduction
                            to a fascinating city.
                            Read more about Addis Ababa Guided City Tour With Airport & Hotel Pick Up -
                        </p>

                        <ul class="full-width flex-column">
                            <li class="full-width flex-start">
                                <i class="fa fa-dot-circle-o"></i>
                                Private tour ensures personalized service
                            </li>
                            <li class="full-width flex-start">
                                <i class="fa fa-dot-circle-o"></i>
                                Enjoy the comfort of a private vehicle as you cross Addis Ababa
                            </li>
                            <li class="full-width flex-start">
                                <i class="fa fa-dot-circle-o"></i>
                                Visit a top sight—Addis Ababa Museum
                            </li>
                            <li class="full-width flex-start">
                                <i class="fa fa-dot-circle-o"></i>
                                Convenient pickup and drop-off at your hotel
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="include full-width flex-column" id="included">

                    <h1 class="full-width flex-start">What's Included</h1>

                    <ul class="full-width flex-wrap">

                        <li class="full-width flex-start">
                            <i class="fa fa-check"></i>
                            <span>Private tour</span>
                        </li>
                        <li class="full-width flex-start">
                            <i class="fa fa-check"></i>
                            <span>Blue Badge guide</span>
                        </li>
                        <li class="full-width flex-start">
                            <i class="fa fa-check"></i>
                            <span>Hotel pickup and drop-off</span>
                        </li>
                        <li class="full-width flex-start">
                            <i class="fa fa-check"></i>
                            <span>Dinner</span>
                        </li>
                        <li class="full-width flex-start">
                            <i class="fa fa-check"></i>
                            <span>Lunch</span>
                        </li>

                    </ul>

                </div>

                <div class="expect full-width flex-column" id="expect">

                    <h1 class="full-width flex-start"> What To Expect </h1>

                    <ul class="full-width flex-column">

                        <li class="flex-column full-width">

                            <div class="head flex-start full-width">

                                <div class="count flex circle default no-select">1</div>

                                <h2 class="flex-start left-text default">Addis Ababa Museum</h2>

                            </div>

                            <div class="flex-column full-width content">

                                <p class="flex-start full-width left-text default">
                                    The National Museum of Ethiopia (NME), also referred to as the Ethiopian National
                                    Museum, is a
                                    national museum in Ethiopia. It is located in the capital, Addis Ababa, The museum
                                    houses Ethiopia's
                                    artistic treasures. It contains many precious local archaeological finds such as the
                                    fossilized
                                    remains of early hominids, the most famous of which is
                                    Read more about Addis Ababa Guided City Tour With Airport & Hotel Pick Up -
                                </p>
                                <span class="full-width flex-start left-text default">1 hour</span>

                            </div>

                        </li>

                        <li class="flex-column full-width">

                            <div class="head flex-start full-width">

                                <div class="count flex circle default no-select">2</div>

                                <h2 class="flex-start left-text default">Holy Trinity Cathedral</h2>

                            </div>

                            <div class="flex-column full-width content">

                                <p class="flex-start full-width left-text default">
                                    The National Museum of Ethiopia (NME), also referred to as the Ethiopian National
                                    Museum, is a
                                    national museum in Ethiopia. It is located in the capital, Addis Ababa, The museum
                                    houses Ethiopia's
                                    artistic treasures. It contains many precious local archaeological finds such as the
                                    fossilized
                                    remains of early hominids, the most famous of which is
                                    Read more about Addis Ababa Guided City Tour With Airport & Hotel Pick Up -
                                </p>
                                <span class="full-width flex-start left-text default">1 hour</span>

                            </div>

                        </li>

                        <li class="flex-column full-width">

                            <div class="head flex-start full-width">

                                <div class="count flex circle default no-select">3</div>

                                <h2 class="flex-start left-text default">Addis Ababa Museum</h2>

                            </div>

                            <div class="flex-column full-width content no-border">

                                <p class="flex-start full-width left-text default">
                                    The National Museum of Ethiopia (NME), also referred to as the Ethiopian National
                                    Museum, is a
                                    national museum in Ethiopia. It is located in the capital, Addis Ababa, The museum
                                    houses Ethiopia's
                                    artistic treasures. It contains many precious local archaeological finds such as the
                                    fossilized
                                    remains of early hominids, the most famous of which is
                                    Read more about Addis Ababa Guided City Tour With Airport & Hotel Pick Up -
                                </p>
                                <span class="full-width flex-start left-text default">1 hour</span>

                            </div>

                        </li>

                    </ul>

                </div>

                <div class="policy full-width flex-column no-border" id="policy">

                    <h1 class="full-width flex-start">Cancellation Policy</h1>

                    <div class="data full-with flex-column">

                        <p class="full-width flex-start">
                            You can cancel up to 24 hours in advance of the experience for a full refund.
                        </p>

                        <ul class="full-width flex-column">
                            <li class="full-width flex-start">
                                <i class="fa fa-dot-circle-o"></i>
                                For a full refund, you must cancel at least 24 hours before the experience's start time.
                            </li>
                            <li class="full-width flex-start">
                                <i class="fa fa-dot-circle-o"></i>
                                If you cancel less than 24 hours before the experience's
                                start time, the amount you paid will not be refunded.
                            </li>
                            <li class="full-width flex-start">
                                <i class="fa fa-dot-circle-o"></i>
                                Visit a top sight—Addis Ababa Museum
                            </li>
                            <li class="full-width flex-start">
                                <i class="fa fa-dot-circle-o"></i>
                                Any changes made less than 24 hours before the experience's start time will not be accepted.
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="traveller flex-column full-width" id="traveller">

                    <h1 class="full-width flex-start"> Travellers Photots </h1>

                    <div class="images flex-space align-start full-width">

                        <div class="first flex-start">
                            <div class="image"> <img src="{{ explode(',', $tours->images)[0] }}"> </div>
                        </div>

                        <div class="second flex-start">
                            <div class="image"> <img src="{{ explode(',', $tours->images)[1] }}"> </div>
                            <div class="image"> <img src="{{ explode(',', $tours->images)[2] }}"> </div>
                            <div class="image"> <img src="{{ explode(',', $tours->images)[3] }}"> </div>
                            <div class="image"> <img src="{{ explode(',', $tours->images)[4] }}"> </div>
                        </div>

                    </div>

                </div>

                <div class="reviews flex-column full-width" id="reviews">

                    <h1 class="full-width flex-start"> Reviews </h1>

                    <div class="data-info flex-space align-start full-width">

                        <div class="counts flex-column">

                            <div class="replys flex-start full-width default">

                                <span>5.0</span>

                                <div class="stars" id="5"></div>

                            </div>

                            <span class="flex-start full-width default">{{ $tours->reviews }} reviews</span>

                        </div>

                        <div class="divs flex-column">

                            <ul class="flex full-width">
                                <li class="type">5 stars</li>
                                <li class="div">
                                    <div style="width: 40%"></div>
                                </li>
                                <li class="count">40</li>
                            </ul>
                            <ul class="flex full-width">
                                <li class="type">4 stars</li>
                                <li class="div">
                                    <div style="width: 70%"></div>
                                </li>
                                <li class="count">70</li>
                            </ul>
                            <ul class="flex full-width">
                                <li class="type">3 stars</li>
                                <li class="div">
                                    <div style="width: 80%"></div>
                                </li>
                                <li class="count">80</li>
                            </ul>
                            <ul class="flex full-width">
                                <li class="type">2 stars</li>
                                <li class="div">
                                    <div></div>
                                </li>
                                <li class="count">50</li>
                            </ul>
                            <ul class="flex full-width">
                                <li class="type">1 star</li>
                                <li class="div">
                                    <div style="width: 65%"></div>
                                </li>
                                <li class="count">65</li>
                            </ul>

                        </div>

                    </div>

                    <div class="review full-width flex-column">

                        <div class="flex-column full-width">

                            <div class="first flex-column full-width">

                                <div class="replys flex-start full-width default">

                                    <div class="stars" id="5"></div>

                                    <span>Outstanding tour</span>

                                </div>

                                <span class="flex-start full-width default">Kareem_L, Feb 2022</span>

                            </div>

                            <div class="content full-width flex-start">

                                <p class="full-width flex-start default left-text">
                                    My guide and driver were very fun professional and had a wide knowledge
                                    base on my entire tour. Already have booked my second tour
                                </p>

                            </div>

                            <ul class="response flex-column full-width">

                                <li class="flex-column full-width">

                                    <div class="title full-width flex-start default">
                                        <i class="fa fa-comments"></i>
                                        <span>Response from Host, Mar 2022</span>
                                    </div>

                                    <div class="content full-width flex-start">

                                        <p class="full-width flex-start default left-text">
                                            My guide and driver were very fun professional and had a wide knowledge
                                            base on my entire tour. Already have booked my second tour
                                            My guide and driver were very fun professional and had a wide knowledge
                                            base on my entire tour. Already have booked my second tour
                                        </p>

                                    </div>

                                </li>

                            </ul>

                            <div class="action full-width flex-start">

                                <div class="likes flex-start active"> <i class="fa fa-thumbs-up"></i> <span>Like</span>
                                </div>

                                <div class="dislikes flex-start"> <i class="fa fa-thumbs-down"></i> <span>Disike</span>
                                </div>

                            </div>

                        </div>

                        <div class="flex-column full-width">

                            <div class="first flex-column full-width">

                                <div class="replys flex-start full-width default">

                                    <div class="stars" id="5"></div>

                                    <span>Outstanding tour</span>

                                </div>

                                <span class="flex-start full-width default">Kareem_L, Feb 2022</span>

                            </div>

                            <div class="content full-width flex-start">

                                <p class="full-width flex-start default left-text">
                                    My guide and driver were very fun professional and had a wide knowledge
                                    base on my entire tour. Already have booked my second tour
                                </p>

                            </div>

                            <div class="action full-width flex-start">

                                <div class="likes flex-start"> <i class="fa fa-thumbs-up"></i> <span>Like</span> </div>

                                <div class="dislikes flex-start"> <i class="fa fa-thumbs-down"></i> <span>Disike</span>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="buttons full-width flex-start">

                        <a class="show-more pointer"> Show <span>0</span> more reviews</a>

                    </div>

                </div>

                <div class="main flex-column full-width no-border" id="recommended">

                    <h1 class="title full-width flex-start"> Recommended </h1>

                    <ul class="full-width feat2 flex">

                        <div class="home-tour-slider1 home-slider full-width flex">

                            <div class="swiper-wrapper full-width">

                                @foreach ($recommend_tours as $tour)
                                    <a href="/tour?id={{ $tour->id }}" data-id="{{ $tour->id }}"
                                        class="flex-column relative swiper-slide active tour-card">

                                        <div class="image full-width flex"> <img
                                                src="{{ explode(',', $tour->images)[0] }}"> </div>

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

                                        <div class="favor absolute flex pointer circle add"><i class="fa fa-heart-o"></i>
                                        </div>
                                        <div class="favor absolute flex pointer circle del hide"><i
                                                class="fa fa-heart"></i></div>

                                    </a>
                                @endforeach

                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>

                    </ul>

                </div>

            </div>

        </div>

    </main>

    <div class="media-show fixed flex-column full-width full-height hide">

        <div class="first flex-space full-width">

            <h1 class="flex">
                Addis Ababa Guided City Tour With Airport & Hotel Pick Up
                <button class="pointer flex check-availability">Check Availability</button>
            </h1>

            <div class="close circle flex pointer">
                <span class="material-symbols-outlined go-icon">close</span>
            </div>

        </div>

        <div class="shower full-width flex-column">

            <div class="flex media-slider relative full-width">

                <div class="full-width full-height swiper-wrapper">
                    <div class="swiper-slide"></div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <div class="count flex absolute no-select">
                    <span class="current">1</span> / <span class="all">1</span>
                </div>

            </div>

            <div class="small-image flex full-width"></div>

        </div>

    </div>

    <div class="full-width flex-column scroll-bar">

        <main class="flex-space">

            <ul class="pages flex">

                <a href="/">Home</a>

                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Tour</a>

            </ul>

            <ul class="scroll-up flex">

                <span> Scroll to Top </span>

                <i class="fa fa-angle-up circle go-up pointer flex"></i>

            </ul>

        </main>

    </div>

    <script>
        $("header").remove();
        $("nav").removeClass("fixed");
        $(".space-nav").hide();
    </script>

@endsection
