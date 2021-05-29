@extends('front.common.main')
@section('content')
<div>
    <h1>welcome to</h1>
    <h3>Dashbord</h3>
</div>
<div>
    <a href="./registration">
        <button class="btn btn-secondary" id="register">
            add new registration
        </button>
    </a>
    <a href="./messages/addMessage">
        <button class="btn btn-secondary" id="message">
            add new message
        </button>
    </a>    

</div>
<div style="height:150px;"></div>
@endsection
<script>
    function addMessage(){
        alert('addmesag btn');
    }
    
    function addRegister(){
        alert('Register  btn');
    }
</script>