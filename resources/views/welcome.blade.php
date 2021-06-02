@extends('front.common.main')
@section('content')
@if($errors->any())
{!! implode('', $errors->all('<div>:message</div>')) !!}

@endif
<div class="mt-3 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg col-10 ">
    <div class="grid grid-cols-1 md:grid-cols-2 m-3">
        <form action="search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="docNumber" placeholder="Search Your Document   "> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>search
                    </button>
                </span>
            </div>
        </form>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2">
        @if(isset($data))
        <div class="text-center">
            <h3>Today Messages</h3>
        </div>
        <div class="list-group">
            @foreach($data as $message)
            <a href="#" class="list-group-item list-group-item-action ">{{$message->title}}</a>
            @endforeach
        </div>
        @else
        <h1>No messages for now </h1>
        @endif
        {{--<a href="./message"><button>see message </button></a>--}}
    </div>
</div>
@endsection