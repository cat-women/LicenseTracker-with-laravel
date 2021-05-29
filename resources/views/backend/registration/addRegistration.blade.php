@extends('front.common.main')
@section('content')


<form action = "../registration" method="POST" accept-charset="UTF-8" class="text-dark"> 
{{  csrf_field() }}
  <div class="mb-3">
    <label for="name" class="form-label" >Name </label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Document holder name">    
  </div>
  <div class="col-auto my-1 ">
      <label class="mr-sm-2" for="docType">Document type</label>
      <select class="custom-select mr-sm-2 bg-secondary text-dark" id="docType" name="docType">
        <option selected value='Null'>Choose...</option>
        <option value="license">license  </option>
        <option value="blue book ">Blue book  </option>

      </select>
    </div>
    <label for="docNum" class="form-label" >Document Number </label>
    <input type="text" id="docNum" name="docNum" class="form-control" placeholder="Document Number ">
    
    <div class="col-auto my-1 ">
      <label class="mr-sm-2" for="branch">Branch</label>
      <select class="custom-select mr-sm-2 bg-secondary text-dark" id="branch" name="branch">
        <option selected value="Null">Choose...</option>
        <option value="new road">New Road </option>
        <option value="baggi khana ">Baggi Khana</option>
        <option value="sorakhutte">Sorakhutte</option>
        <option value="Tripureshwar">Tripureshwar</option>
      </select>
    </div>
    <label for="trafficName" class="form-label" >Traffic name  </label>
    <input type="text" id="trafficName" name="trafficName" class="form-control" placeholder="Traffic name ">
  </div>
  <div class="mb-3">
    <label for="offence" class="form-label">Reason for fine</label>
    <textarea class="form-control" id="offence" name="offence" rows="3" placeholder="Write offence"></textarea>
  </div>
    <label for="fine" class="form-label" >Total Fine  </label>
    <input type="number" id="fine" name="fine" class="form-control" placeholder="Total fine ">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



<div style="height:150px;"></div> 

@endsection