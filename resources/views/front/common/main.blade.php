<html lang="en">                                                                                                                                                                                                                                                                                                                                                                                        
    <head>
    @include('front.common.header')
    </head>
<body  style="background-image: url('{{ asset('images/bg.jpg')}}');" >

    @include('front.common.navbar')
        <div class="container-fluid contentBackImage">
        @include('front.common.messages')
        @if(session('success'))
            <h1>{{session('success')}}</h1>
        @endif

            @yield('content')

        </div>
    @include('front.common.footer')
</body>
</html>

what to do 