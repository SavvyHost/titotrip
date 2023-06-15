<!DOCTYPE html>
<html>

<head>
    @include('custom.head')
</head>

<body>

    @include('custom.nav')

    @include('custom.header')

    @yield('content')

    @include('custom.footer')

    @include('custom.calendar')

    @include('custom.stars')

    @include('custom.body')

</body>

</html>
