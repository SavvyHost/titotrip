<nav class="flex fixed">

    <main class="flex-space">

        <ul class="flex">

            <div class="show-side flex-start pointer">
                <span class="material-symbols-outlined go-icon">menu</span>
            </div>
            <a href="/" class="logo"> <img src="static/image/public/black-tito.png"> </a>
            {{-- <a href="/" class="logo no-select">MemnonTravel</a> --}}

            <div class="search-div flex">
                <svg class="icon-search" width="22" height="22" aria-hidden="true" role="img"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.5 2.75C14.5041 2.75 17.75 5.99594 17.75 10C17.75 11.7319 17.1427 13.3219 16.1295 14.5688L21.0303
                        19.4697C21.3232 19.7626 21.3232 20.2374 21.0303 20.5303C20.7641 20.7966 20.3474 20.8208 20.0538 20.6029L19.9697
                        20.5303L15.0688 15.6295C13.8219 16.6427 12.2319 17.25 10.5 17.25C6.49594 17.25 3.25 14.0041 3.25 10C3.25 5.99594
                        6.49594 2.75 10.5 2.75ZM10.5 4.25C7.32436 4.25 4.75 6.82436 4.75 10C4.75 13.1756 7.32436 15.75 10.5 15.75C13.6756
                        15.75 16.25 13.1756 16.25 10C16.25 6.82436 13.6756 4.25 10.5 4.25Z"
                        fill="#2A2D32">
                    </path>
                </svg>
                <input type="text" placeholder="Search for activity">
            </div>
        </ul>

        <ul class="flex">

            <li class="flex nav-icon">

                <div class="flex"> <img src="static/image/lang/en.png"> </div>
                <span> EN </span>

                <div class="nav-menu flex absolute hide shadow">

                    <ul class="full-width flex-column">

                        <li class="flex-start full-width en active">
                            <img src="static/image/lang/en.png">
                            <span>English</span>
                        </li>
                        <li class="flex-start full-width it">
                            <img src="static/image/lang/it.png">
                            <span>Italiano</span>
                        </li>
                        <li class="flex-start full-width fr">
                            <img src="static/image/lang/fr.png">
                            <span>Français</span>
                        </li>
                        <li class="flex-start full-width eg">
                            <img src="static/image/lang/eg.png">
                            <span>Egypt</span>
                        </li>
                        <li class="flex-start full-width de">
                            <img src="static/image/lang/de.png">
                            <span>Deutsch</span>
                        </li>

                    </ul>

                </div>

            </li>

            <li href="/help" class="flex nav-icon">

                <div class="flex">
                    <span class="material-symbols-outlined go-icon">help</span>
                </div>

                <span> Help </span>

            </li>

            <li href="/bookings" class="flex nav-icon">

                <div class="flex">
                    <span class="material-symbols-outlined go-icon">credit_card</span>
                </div>

                <span> Bookings </span>

            </li>

            @if (Session::has('user'))
                <li class="flex nav-icon">

                    <div class="flex">
                        <span class="material-symbols-outlined go-icon">account_circle</span>
                    </div>
                    <span> {{ substr(explode(' ', Session::get('user')->username)[0], 0, 15) }} </span>

                    <div class="nav-menu user-menu flex absolute hide shadow">

                        <ul class="full-width flex-column">

                            <a href="/account" class="flex-start full-width">
                                <span class="material-symbols-outlined go-icon">person</span>
                                <span>Profile</span>
                            </a>

                            <li class="flex-start full-width logout">
                                <span class="material-symbols-outlined go-icon">logout</span>
                                <span>Logout</span>
                            </li>

                        </ul>

                    </div>

                </li>
            @else
                <li class="flex nav-icon">

                    <div class="flex">
                        <span class="material-symbols-outlined go-icon">account_circle</span>
                    </div>
                    <span> Account </span>

                    <div class="nav-menu user-menu flex absolute hide shadow">

                        <ul class="full-width flex-column">

                            <a href="/login" class="flex-start full-width">
                                <span class="material-symbols-outlined go-icon">logout</span>
                                <span>Login</span>
                            </a>

                            <a href="/register" class="flex-start full-width">
                                <span class="material-symbols-outlined go-icon">person</span>
                                <span>Register</span>
                            </a>

                        </ul>

                    </div>

                </li>
            @endif

            <a href="/wishlist" class="flex li nav-icon relative">

                <div class="flex">
                    <i class="fa fa-heart-o"></i>
                </div>

                <div class="count flex no-selct absolute hide">
                    <div>0</div>
                </div>

            </a>

        </ul>

    </main>

    <div class="nav-side fixed flex-start full-width full-height hide">

        <div class="side full-height">

            <div class="first full-width flex-space">
                <a href="/" class="flex no-select">MemnonTravel</a>
                <div class="close-side circle pointer flex">
                    <span class="material-symbols-outlined go-icon">close</span>
                </div>
            </div>

            <ul class="full-width flex-column">

                <a href="/" class="flex-start full-width home0">
                    <span class="material-symbols-outlined go-icon">home</span>
                    <span> Home </span>
                </a>

                @if (Session::has('user'))
                    <a href="/account" class="flex-start full-width profile0">
                        <span class="material-symbols-outlined go-icon">account_circle</span>
                        <span> Profile </span>
                    </a>

                    <a href="/bookings" class="flex-start full-width booking0">
                        <span class="material-symbols-outlined go-icon">credit_card</span>
                        <span> Bookings </span>
                    </a>
                @else
                    <a href="/login" class="flex-start full-width login0">
                        <span class="material-symbols-outlined go-icon">account_circle</span>
                        <span> Login </span>
                    </a>
                @endif

                <a href="/wishlist" class="flex-start li wishlist0">

                    <div class="flex">
                        <span class="material-symbols-outlined go-icon">favorite</span>
                    </div>

                    <span> Wishlist </span>

                </a>

                @if (Session::has('user'))
                    <li class="flex-start full-width logout logout0">
                        <span class="material-symbols-outlined go-icon">logout</span>
                        <span> Logout </span>
                    </li>
                @endif

                <li class="flex-start full-width langs langs0">
                    <img src="static/image/lang/en.png">
                    <span> English </span>
                </li>

                <a href="/help" class="flex-start full-width help0">
                    <span class="material-symbols-outlined go-icon">help</span>
                    <span> Help </span>
                </a>

            </ul>

        </div>

        <div class="side-menu fixed full-width full-height flex hide langs-menu">

            <div class="menu flex-column">

                <div class="first full-width flex-space">
                    <p>Languages</p>
                    <div class="close circle pointer flex">
                        <span class="material-symbols-outlined go-icon">close</span>
                    </div>
                </div>

                <ul class="full-width flex-column">

                    <li class="flex-start full-width active en">
                        <img src="static/image/lang/en.png">
                        <span> English </span>
                    </li>

                    <li class="flex-start full-width it">
                        <img src="static/image/lang/it.png">
                        <span> Italiano </span>
                    </li>

                    <li class="flex-start full-width fr">
                        <img src="static/image/lang/fr.png">
                        <span> Français </span>
                    </li>

                    <li class="flex-start full-width eg">
                        <img src="static/image/lang/eg.png">
                        <span> Egypt </span>
                    </li>

                    <li class="flex-start full-width de">
                        <img src="static/image/lang/de.png">
                        <span> Deutsch </span>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>

<div class="space-nav"></div>
