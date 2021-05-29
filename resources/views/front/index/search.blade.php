@extends('front.common.main')
<script src="https://unpkg.com/khalti-checkout-web@latest/dist/khalti-checkout.iffe.js"></script>

@section('content')
    <div class="container bg-light">
        @if(isset($details))
            <h4> Document detail for document Number <b> {{ $query }} </b> is :</h4>
            @foreach($details as $user)
            <table class="table table-striped ">
                <tbody >
                    <tr>
                        <td>Name</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>Offence</td>
                        <td>{{$user->offence}}</td>
                    </tr>
                    <tr>
                        <td>Document </td>
                        <td>{{$user->docType}}</td>
                    </tr>
                    <tr>
                        <td>Fine</td>
                        <td>{{$user->fine}}</td>
                    </tr>
                    
                    <tr>
                        <td>Branch</td>
                        <td>{{$user->branch}}</td>
                    </tr>

                </tbody>
            </table>
            
            @auth
                <a href="./registration/addRecord/{{$user->id}}" class="btn btn-warning" >Update</a>  
            @endauth

            @guest

            <span>Pay with</span>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1"> Khalti  </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2"> Bank </label>
            </div>
            <div class="form form-a active"> 
                <button type="button" id="payment-button" class="btn btn-primary mt-3">Pay with Khalti</button>  
            </div>

            <!--confirm payment --> 
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Confirm payment  </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel " >Upload voucher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="./payment"   enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input class="form-control" type="docNum" id="docNum"  name="docNum" hidden value={{ $user->id }}>
                        
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Email </label>
                            <input class="form-control" type="email" id="email"  name="email">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">contact </label>
                            <input class="form-control" type="number" id="contact"  name="contact">
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Upload file </label>
                            <input class="form-control" type="file" id="upload" accept="image/*" name="upload">
                        </div>
                        <button type="submit">submit</button>
                    </form>
                
                </div>
                
            </div>
        @endguest


            @endforeach

        @else
            <h4>document not found</h4>
        @endif
    </div>
    

</div>
<div style="height:150px;"></div>

<!-- khalti api -->



          
<script>
    //to validate form 
    function formSubmit(){
        var fileInput = document.getElementById('voucher');
        var filePath = filInput.value;
        var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png)$/i;
    
    if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } 
    if(filePath == ''){
        alert("file must be upload ");
        return false;
    }
    else{
        document.getElementById('image').submit();
    }
    }
          var config = {
              // replace the publicKey with yours
              "publicKey": "test_public_key_dc74e0fd57cb46cd93832aee0a390234",
              "productIdentity": "1234567890",
              "productName": "Dragon",
              "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
              "paymentPreference": [
                  "MOBILE_BANKING",
                  "KHALTI",
                  "EBANKING",
                  "CONNECT_IPS",
                  "SCT",
                  ],
              "eventHandler": {
                  onSuccess (payload) {
                      // hit merchant api for initiating verfication
                      console.log(payload);
                  },
                  onError (error) {
                      console.log(error);
                  },
                  onClose () {
                      console.log('widget is closing');
                  }
              }
          };
  
          var checkout = new KhaltiCheckout(config);
          var btn = document.getElementById("payment-button");
          btn.onclick = function () {
              // minimum transaction amount must be 10, i.e 1000 in paisa.
              checkout.show({amount: 1000});
          }
      </script>
@endsection

