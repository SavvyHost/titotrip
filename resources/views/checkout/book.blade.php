<!DOCTYPE html>
<html>

<head>
    @include('custom.head')
</head>

<body>

    @include('custom.nav')

    <script>
        $("nav .search-div").remove();
    </script>

    <div class="checkout">
        @include('checkout.topside')
    </div>

    <div class="checkout">

        <div class="container__1ksl nomargin__3NWI">

            <div class="row__3-k3 nogutter__1VXx main-div">

                @include('checkout.contact')

                @include('checkout.details')

                @include('checkout.payment')

                @include('checkout.side')

            </div>

        </div>

        <div class="container__1RYq footer">
            <main class="container__1ksl" style="margin: auto; padding: 0 .5rem;">
                <div class="row__3-k3">
                    <div class="col__TB11">
                        <div class="content__2Iyb" style="flex-direction: row; flex-wrap: wrap">
                            <span class="legalNotice__2fw5">© 2023 TitoTrip, Inc.</span>
                            <span class="separator__2mJK">•</span>
                            <a href="/" class="link__hxmD">Terms &amp; Conditions</a>
                            <span class="separator__2mJK">•</span>
                            <a href="/" class="link__hxmD">Cookie Consent</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

    @include('custom.calendar')

    @include('custom.stars')

    @include('custom.body')

    <script src="static/js/custom/checkout.js"></script>

</body>

</html>
