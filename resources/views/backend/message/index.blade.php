@extends('front.common.main')
@section('content')
    <h1>Messages </h1>
    @if(count($data)>0)     search
        <ol class="list-group list-group-numbered m-3">
            @foreach($data as $item)
            <li class="list-group-item m-3">
                    <div class="well">
                        <h4><a href="#" >{{$item->title}}</a></h4>
                        <a href="./message/{{$item->id}}/edit" class="btn btn-warning" >Edit</a>
                        {{--<a href="./message/{{$item->id}}/delete" class="btn btn-info" onclick="deleteConfirm()">Delete</a> --}}

                        <form action="./message/{{$item->id}}" method="DELETE" onsubmit="return confirm('Do you really want to delete this message?');">
                            <button type="submit" class="btn btn-warning" id="confirmDelete" >Delete</button>
                        </form>
                    </div>
                        <small class="text-dark">Written on {{$item->created_at}}</small>
            </li>
            @endforeach
        </ol>

    @else
        <h2>No message for now </h2>
    @endif
    

    <button><a href="./message/create" class="mt-3">add new message</a></button>

    <div>
        <span>Total message {{ count(array($data)) }}</span>
        <h1>solve total number of row</h1>
    </div>

    {{--pagination --}}
    <div class=" justify-content-center">
        {{ $data->links() }}
    </div>

    <div style="height:150px;"></div>

@endsection