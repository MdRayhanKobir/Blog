<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title')</title>

    @include('admin.includes.css')
</head>

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    @include('admin.includes.extra_js')

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
        {{-- sidebar --}}
        @include('admin.includes.sidebar')

        <div class="page-wrapper">
            <!-- Header -->
            @include('admin.includes.header')


            <div class="content-wrapper">
                @yield('content')
            </div>

            {{-- footer --}}
            @include('admin.includes.footer')
        </div>
    </div>

    {{-- js part --}}
    @include('admin.includes.js')
    

</body>

</html>
