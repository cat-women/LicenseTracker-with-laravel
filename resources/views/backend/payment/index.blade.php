@extends('front.common.main')
@section('content')
@if($data =='')
  data is blanck
@else
  @foreach($data as $d)
    {{ $d->email}}
  @endforeach
@endif

<table class="table bg-light">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Document number</th>
      <th scope="col">Image</th>
      <th scope="col">Result</th>
      <th scope="col">Status</th>

    </tr>
  </thead>
  <tbody>
  @foreach($data as $d)
    <tr style="height:200px;">
      <th scope="row">1</th>
      <td>{{$d->name}}</td>
      <td>{{$d->docNum}}</td>
      <td>
        <div class="card" style="width: 200px; height: 10px;" onclick="enlarge()" id='enlargeImage'>
          <img class="card-img-top" src="{{asset('storage/'.$d->upload)}}" alt="Card image cap">        
        </div>
      </td>
      <td>
        <button class='btn btn-secondary' onclick="changeClass()" id="confirm">Confirm ?</button>
      </td>
      <td>
        <button class='btn btn-warning' onclick="status()" id="status">Hold</button>
      </td>      
    </tr>
  @endforeach
  </tbody>
</table>


@endsection
<script>
  function changeClass(){
    var id = document.getElementById('confirm');
    //alert(id.classList);
    if(id.classList == 'btn btn-secondary'){
      id.classList = "btn btn-primary";
      id.innerHTML = 'Confirmed';           
    }
    else{
      id.classList = 'btn btn-secondary';
      id.innerHTML = 'Confirm ?';          

    }
  }
  function status(){
    var id = document.getElementById('status');
    if(id.classList == 'btn btn-warning'){
      id.classList = "btn btn-primary";
      id.innerHTML = 'Release';           
    }
    else{
      id.classList = 'btn btn-warning';
      id.innerHTML = 'Hold';          

    }
  }

  function enlarge(){
    var id = document.getElementById('enlargeImage');
    //id.style.height = 300px;
    //id.style.width = 500px;
    $('img').animate({height:'300',width:'500'})
    //alert('enlrge image');

  }

</script>