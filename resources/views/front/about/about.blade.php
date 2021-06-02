@extends('..front/common.main')
@section('content')


<div class="col-md-12 border mt-3 bg-light lead" style="border:1px black;">
    <u>
        <h1>Introduction</h1>
    </u>
    <p>
        It is simple website that store the record of documents that are seized due to traffic rule violation.
        Before this the data was kept in paper only, that's why it was used for government record only but
        with this applicaiton public can use the data that traffic police maintain.
    </p>
    <h4><i> How it works ? </i></h4>
    <ul>
        <li>Keep the record of document and fine </li>
        <li>It keep the record of whether fine is paid or not </li>
        <li>Traffic police can give imporant message to public</li>
        <li>Public can search their document and can pay it though online payement</li>
    </ul>
    <a href='./help'>learn more </a>

</div>

<!-- team -->
<div class="row">
    <div class="card col m-3 " style="width: 9rem;">
        <img class="card-img-top" src="images/cat.png" alt="Card image cap" style="height:250px; width:250px;">
        <div class="card-body">
            <h5 class="card-title" style="color:black;">Deepa khadka</h5>
            <p class="card-text" style="color:black;">
                Student of bachelor in computer application
            </p>
            <a href="https://github.com/deepa972" class="btn btn-primary">For more detail</a>
        </div>
    </div>
    <div class="card col m-3 dark" style="width: 9rem;">
        <img class="card-img-top" src="images/cat.png" alt="Card image cap" style="height:250px; width:250px;">
        <div class="card-body">
            <h5 class="card-title" style="color:black;">Lhakpa Dolma Sherpa</h5>
            <p class="card-text" style="color:black;">
                Student of bachelor in computer application
            </p>
            <a href="https://github.com/cat-women" class="btn btn-primary">For more detail</a>
        </div>
    </div>
</div>



<div style="height:150px;"></div>
@endsection