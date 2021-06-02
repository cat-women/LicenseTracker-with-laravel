<html lang="en">

<head>
    @include('front.common.header')
</head>

<body style="background-image: url('{{ asset('images/bg2.jpg')}}');">

    @include('front.common.navbar')
    <div class="container-fluid contentBackImage">
        @include('front.common.messages')
        @if(session('success'))
        <h1>{{session('success')}}</h1>
        @endif

        @yield('content')

    </div>

    <div class="row">
        <div class="col-10 justify-content-center m-2">
            <hr class="mt-3 mb-3" style="color:red; height:3px;" />
        </div>
    </div>

    @include('front.common.footer')
</body>

</html>