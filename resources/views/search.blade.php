@extends('base')
@section('title', 'Search')
@section('content')

    <main class="flex-column search success-search">

        <div class="keys full-width flex-space align-start">

            <div class="keywords left-text">

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

        <div class="title full-width flex-start default left-text"></div>

        <div class="full-width flex-start small-info hide">
            <div class="flex-start show-search-side pointer">
                <div class="flex pointer circle">
                    <span class="material-symbols-outlined">tune</span>
                </div>
                <p>Filter</p>
            </div>
            <div class="count flex-start"><span>290</span> results</div>
        </div>

        <div class="result flex-space full-width align-start">

            <div class="left flex-start">

                <div class="side flex-column">

                    <div class="first full-width flex-start default">

                        <i class="fa fa-filter"></i> <span class="noselect"> FILTERING </span>

                    </div>

                    <ul class="full-width flex-column no-border">

                        <h2 class="full-width flex-start noselect">Travelling Date</h2>

                        <li class="flex-start full-width cal">
                            <div class="input pointer full-width flex-start date-input show-calendar">
                                <i class="fa fa-calendar"></i>
                                <p class="full-width flex-start noselect">Select Date</p>
                            </div>
                        </li>

                    </ul>

                    <ul class="full-width flex-column">

                        <h2 class="full-width flex-start noselect">Populatity</h2>

                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">Good for avoiding
                                crowds</span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">Taking safety
                                measures</span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">Virtual
                                experiences</span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">Kid
                                friendly</span>
                        </li>

                    </ul>

                    <ul class="full-width flex-column">

                        <h2 class="full-width flex-start noselect">Duration</h2>

                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">Up to 3
                                days</span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">4 to 7
                                days</span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">8 to 15
                                days</span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">15+ days</span>
                        </li>

                    </ul>

                    <ul class="full-width flex-column">

                        <h2 class="full-width flex-start noselect">Rating</h2>

                        <li class="flex-start full-width">
                            <div class="checkbox circle">
                                <div></div>
                            </div>
                            <span>
                                <div class="five-star flex star-div">
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                </div>
                            </span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox circle">
                                <div></div>
                            </div>
                            <span>
                                <div class="five-star flex star-div">
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                </div>
                            </span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox circle">
                                <div></div>
                            </div>
                            <span>
                                <div class="five-star flex star-div">
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                </div>
                            </span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox circle">
                                <div></div>
                            </div>
                            <span>
                                <div class="five-star flex star-div">
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                </div>
                            </span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox circle">
                                <div></div>
                            </div>
                            <span>
                                <div class="five-star flex star-div">
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                </div>
                            </span>
                        </li>

                    </ul>

                    <ul class="full-width flex-column no-border">

                        <h2 class="full-width flex-start noselect">Specials</h2>

                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">Deals &
                                Discounts</span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">Free
                                Cancellation</span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">Likely to Sell
                                Out</span>
                        </li>
                        <li class="flex-start full-width">
                            <div class="checkbox"><i class="fa fa-check"></i></div> <span class="noselect">New on
                                Memnon</span>
                        </li>

                    </ul>

                    <div class="apply fixed flex-space hide">
                        <button class="close-search-side">Cancel</button>
                        <button class="close-search-side confirm">Apply</button>
                    </div>

                </div>

            </div>

            <div class="right flex-column relative">

                <div class="list-actions full-width flex-column">

                    <div class="full-width flex-start no-select">
                        <div class="clear-filters pointer">Cleaer Filters</div>
                    </div>

                    <div class="msg full-width flex">
                        <span>You can reserve your spot today and pay when you're ready.</span>
                        <a href="/help" class="no-select">Learn more</a>
                    </div>

                </div>

                <div class="list-result flex-column full-width">

                    @foreach ($tours as $tour)
                        <a href="/tour?id={{ $tour->id }}" data-id="{{ $tour->id }}"
                            class="flex-start full-width align-start relative tour-card">

                            <div class="image relative">
                                <img src="{{ explode(',', $tour->images)[0] }}">
                                <div class="favor absolute flex pointer circle add"><i class="fa fa-heart-o"></i></div>
                                <div class="favor absolute flex pointer circle del hide"><i class="fa fa-heart"></i></div>
                            </div>

                            <div class="info flex-column">

                                <h1 class="full-width flex-start left-text">{{ $tour->title }}</h1>

                                <div class="review full-width flex-start">

                                    <div class="replys flex-start">

                                        <div class="stars" id="5"></div>

                                        <span>{{ $tour->reviews }}</span>

                                    </div>

                                </div>

                                <p class="flex-start full-width left-text describe">
                                    Discover the splendor of the Egyptian Desert, see the enticing Wadi El Rayan waterfalls,
                                    and marvel at the towering Mudawara Mountains. Then, enjoy action-packed dune bashing,
                                </p>

                                <div class="full-width flex-space flex-wrap">
                                    <div class="flex time"> <i class="fa fa-clock-o"></i> <span>10 to 12 hours</span>
                                    </div>
                                    <div class="price flex"> From <span>${{ round($tour->price, 2) }}</span> </div>
                                </div>

                            </div>

                        </a>
                    @endforeach

                </div>

                <div class="loader absolute full-width flex hide">
                    <div class="load"></div>
                </div>

            </div>

        </div>

    </main>

    <main class="search faild-search hide">
        <div class="empty full-width flex-column">
            <svg width="250" height="150" aria-labelledby="title" role="img" viewBox="0 0 1308 872"
                xmlns="http://www.w3.org/2000/svg">
                <g fill="none" fill-rule="evenodd">
                    <ellipse fill="#F8F8F8" cx="720" cy="845.5" rx="444" ry="26.5"></ellipse>
                    <path
                        d="M855.009 111.372c9.676-43.364 31.82-67.475 66.431-72.335 38.77-5.444 69.72 7.485 92.846 38.788 28.568-12.93 
                        57.136-13.95 85.704-3.062 20.554 7.833 46.933 39.808 46.933 68.389 14.025 1.12 23.888 3.502 29.589 7.145 32.81 
                        20.968 34.69 44.912 25.507 73.493-1.616 5.03-16.325 34.705-44.893 32.664H916.593l-61.584-145.082zM69.856 
                        353.286c9.242-66.408 37.81-102.974 85.703-109.699 47.893-6.724 86.124 9.247 114.692 47.915 35.29-15.972 
                        70.58-17.233 105.869-3.783 25.39 9.676 57.976 49.175 57.976 84.48 17.324 1.384 29.508 4.326 36.55 8.827 
                        40.53 25.9 42.852 55.48 31.509 90.785-1.997 6.213-20.166 42.87-55.456 
                        40.348H76.157c-15.24-3.855-25.742-7.217-31.508-10.087-14.092-7.013-23.246-16.934-27.728-22.696C-3.029 453.73 
                        1.023 429.864.537 417.592c-.54-13.588 12.549-39.333 36.55-55.48 6.31-4.246 17.234-7.188 32.769-8.826z"
                        fill="#E3E3E3">
                    </path>
                    <g transform="translate(349)">
                        <circle stroke="#979797" stroke-width="50" cx="292.27" cy="292.27" r="267.27">
                        </circle>
                        <path fill="#999" d="M475.499 514.694l39.196-39.196 191.487 191.487-39.196 39.196z"></path>
                    </g>
                </g>
            </svg>
            <h2 class="full-width flex">
                Sorry we can't find any results for <div class="query"></div>
            </h2>
            <p>Try searching something else</p>
            <a href="/" class="no-select">Back to home</a>
        </div>
    </main>

    <div class="full-width flex-column scroll-bar">

        <main class="flex-space">

            <ul class="pages flex">

                <a href="/">Home</a>

                <i class="fa fa-angle-right"></i>

                <a class="no-hover">Search</a>

            </ul>

            <ul class="scroll-up flex">

                <span> Scroll to Top </span>

                <i class="fa fa-angle-up circle go-up pointer flex"></i>

            </ul>

        </main>

    </div>

    <script>
        $("header").remove();
        $(window).on("resize load", function() {
            if ($(window).width() < 900) {
                $(".calendar").css({
                    "z-index": "99999"
                });
            }
        });
    </script>
@endsection
