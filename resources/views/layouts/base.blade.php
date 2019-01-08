<!DOCTYPE html>
<html lang="en">
    @include('partials.head')

    @include('partials._flash_message')
    <body class="h-100">

        @yield('body')
    @include('partials.js')
    </body>
</html>