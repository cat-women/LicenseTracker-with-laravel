@extends('front.common.main')
@section('content')
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
    
        <div class="grid grid-cols-1 md:grid-cols-2 m-3">
            <form action="search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="docNumber"
                            placeholder="Search Your Document   "> <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                       <span class="glyphicon glyphicon-search"></span>search
                    </button>
                    </span>
                </div>
            </form>                        
        </div>
    
    <h1>Documents </h1>
    @if(count($data)>0)
        <ol class="list-group list-group-numbered m-3">
            @foreach($data as $item)
            <li class="list-group-item m-3">
                    <div class="well">
                        <h4><a href="./registration/addRecord/{{$item->id}}" >{{$item->name}}</a></h4>
                        <h5 class="text-dark">{{$item->docNum}}</h5>
                        <a href="{{ route('registration.edit', $item->id) }}" class="btn btn-warning" >Edit</a>
                        {{--<a href="/registration/{$item->docNum}" class="btn btn-info" onclick="deleteConfirm()">Delete</a> --}}

                        <form action="./registration/{$item->docNum}" methof="get" onsubmit="return confirm('Do you really want to delete this document?');">
                            <button type="submit" class="btn btn-warning" id="confirmDelete" >Delete</button>
                        </form>
                    </div>

                        <small class="text-dark">Updated  on {{$item->updated_at}}</small>
            </li>
            @endforeach
        </ol>

    @else
        <h2>No document to show  </h2>
    @endif
    </div>


    <button><a href="./registration/create" class="mt-3">add new document</a></button>

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
<script>
    function deleteConfirm(){
        //var id = document.getElementById('confirmDelete');
        var result = confirm('Are you sure ?');
        if(result == 'false'){
            return false;
        }
        else
            return true
    }
</script>